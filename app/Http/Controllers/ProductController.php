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
            ->with('category')
            ->orderBy('created_at', 'desc');


        if ($request->filled('category')) {
            $productsQuery->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
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
