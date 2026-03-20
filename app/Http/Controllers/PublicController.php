<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $featuredProducts = Product::active()
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('featuredProducts'));
    }
}
