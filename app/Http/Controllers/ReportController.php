<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function inventory(): View
    {
        $products = Product::with('category')
            ->select('id', 'code', 'name', 'category_id', 'quantity', 'min_quantity', 'price')
            ->get();

        $totalValue = $products->sum(fn($p) => $p->quantity * $p->price);
        $lowStockCount = $products->filter(fn($p) => $p->isLowStock())->count();

        return view('reports.inventory', compact('products', 'totalValue', 'lowStockCount'));
    }

    public function movements(Request $request): View
    {
        $query = StockMovement::with(['product', 'user']);

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $movements = $query->latest()->paginate(20);

        return view('reports.movements', compact('movements'));
    }

    public function statistics(): View
    {
        $stats = [
            'total_products' => Product::count(),
            'low_stock_products' => Product::whereColumn('quantity', '<=', 'min_quantity')->count(),
            'total_movements' => StockMovement::count(),
            'in_movements' => StockMovement::where('type', 'in')->count(),
            'out_movements' => StockMovement::where('type', 'out')->count(),
        ];

        return view('reports.statistics', compact('stats'));
    }
}