<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        // Calcolo totale
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1;
        } else {

            $cart[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->price,
                'quantity' => 1,
                'slug' => $product->slug,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('message', 'Prodotto aggiunto al carrello!');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('message', 'Prodotto rimosso dal carrello.');
    }

    public function update(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$product->id])) {
            return redirect()->route('cart.index');
        }

        $action = $request->input('action');

        if ($action === 'increase') {
            $cart[$product->id]['quantity'] += 1;
        }

        if ($action === 'decrease') {
            $cart[$product->id]['quantity'] -= 1;

            if ($cart[$product->id]['quantity'] <= 0) {
                unset($cart[$product->id]);
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Il carrello è vuoto.');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('homepage')->with('message', 'Ordine creato con successo!');
    }
}
