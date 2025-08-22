<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Native\Laravel\Facades\Notification;

class CheckLowStock extends Command
{
    protected $signature = 'inventory:check-stock';
    protected $description = 'Check products with low stock and send desktop notifications';

    public function handle()
    {
        $lowStockProducts = Product::where('quantity', '<', 5)->get();

        foreach ($lowStockProducts as $product) {
            Notification::title('⚠️ Low Stock Alert')
                ->message($product->name . ' has only ' . $product->quantity . ' left.')
                ->show();

            $this->info("Notified: {$product->name} is low on stock.");
        }

        return Command::SUCCESS;
    }
}
