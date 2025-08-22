<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->get('from', now()->startOfMonth()->toDateString());
        $to = $request->get('to', now()->endOfMonth()->toDateString());

        $sales = Sale::with('product')
            ->whereBetween('sale_date', [$from, $to])
            ->get();

        $totalRevenue = $sales->sum('total_price');
        $totalItems = $sales->sum('quantity');

        return view('reports.index', compact('sales', 'from', 'to', 'totalRevenue', 'totalItems'));
    }

    public function exportPdf(Request $request)
    {
        $sales = Sale::with('product')
            ->whereBetween('sale_date', [$request->from, $request->to])
            ->get();

        $pdf = Pdf::loadView('reports.pdf', ['sales' => $sales]);
        return $pdf->download('sales-report.pdf');
    }

    public function exportCsv(Request $request)
    {
        $sales = Sale::with('product')
            ->whereBetween('sale_date', [$request->from, $request->to])
            ->get();

        $csvData = "Product,Quantity,Total Price,Date\n";
        foreach ($sales as $sale) {
            $csvData .= "{$sale->product->name},{$sale->quantity},{$sale->total_price},{$sale->sale_date}\n";
        }

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="sales-report.csv"',
        ]);
    }
}
