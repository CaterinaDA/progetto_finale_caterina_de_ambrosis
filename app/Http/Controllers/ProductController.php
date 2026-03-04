<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = \App\Models\Category::orderBy('name')->get();

        $productsQuery = Product::active()
            ->with('category');

        // Filtro categoria
        if ($request->filled('category')) {
            $productsQuery->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        // Ricerca testo
        if ($request->filled('search')) {
            $productsQuery->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Ordinamento
        $sort = $request->get('sort', 'newest');

        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;

            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;

            default:
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }

        $products = $productsQuery->paginate(9)->withQueryString();

        return view('products.index', compact('products', 'categories'));
    }


    public function show(string $slug)
    {
        $product = Product::active()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }
}
