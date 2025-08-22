<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Native\Laravel\Facades\Notification;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if ($validated['quantity'] > $product->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $totalPrice = $product->selling_price * $validated['quantity'];

        $sale = Sale::create([
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'sale_date' => now(),
        ]);

        // Reduce stock
        $product->decrement('quantity', $validated['quantity']);
        if ($product->quantity < 5) {
            Notification::title('⚠️ Low Stock Alert')
                ->message($product->name . ' has only ' . $product->quantity . ' left.')
                ->show();
        }

        return redirect()->route('sales.index')->with('success', 'Sale recorded successfully.');
    }

    public function destroy(Sale $sale)
    {
        // Restore stock if sale is deleted
        $sale->product->increment('quantity', $sale->quantity);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted and stock restored.');
    }
}
