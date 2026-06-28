<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class StockMovementController extends Controller
{
    public function index(): View
    {
        $movements = StockMovement::with(['product', 'user'])
            ->latest()
            ->paginate(20);
        return view('movements.index', compact('movements'));
    }

    public function create(): View
    {
        $products = Product::all();
        $types = ['in' => 'Entrée', 'out' => 'Sortie', 'adjustment' => 'Ajustement'];
        return view('movements.create', compact('products', 'types'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out,adjustment',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        
        DB::transaction(function () use ($validated, $product, $request) {
            // Créer le mouvement
            $movement = new StockMovement($validated);
            $movement->user_id = auth()->id();
            $movement->save();

            // Mettre à jour la quantité du produit
            if ($validated['type'] === 'in') {
                $product->increment('quantity', $validated['quantity']);
            } else {
                $product->decrement('quantity', $validated['quantity']);
            }
        });

        return redirect()->route('movements.index')->with('success', 'Mouvement de stock enregistré');
    }

    public function show(StockMovement $movement): View
    {
        $movement->load(['product', 'user']);
        return view('movements.show', compact('movement'));
    }
}