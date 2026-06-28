<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalProducts = Product::count();
        $lowStockProducts = Product::whereColumn('quantity', '<=', 'min_quantity')->count();
        $totalMovements = StockMovement::count();
        $recentMovements = StockMovement::with(['product', 'user'])
            ->latest()
            ->limit(10)
            ->get();
        
        $lowStockList = Product::whereColumn('quantity', '<=', 'min_quantity')
            ->with('category')
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'lowStockProducts',
            'totalMovements',
            'recentMovements',
            'lowStockList'
        ));
    }
}