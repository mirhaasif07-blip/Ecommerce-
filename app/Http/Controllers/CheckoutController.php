<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $product = null;
        if ($request->filled('product_id')) {
            $product = Product::find($request->product_id);
        }

        return view('checkout.index', [
            'product' => $product,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($data['product_id']);

        $order = Order::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'total' => $product->price * $data['quantity'],
            'status' => 'pending',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
            'price' => $product->price,
        ]);

        return redirect()->route('checkout.index')->with('success', 'Order received successfully. We will contact you soon.');
    }
}
