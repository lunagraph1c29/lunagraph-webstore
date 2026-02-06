<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /* form order */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('order.create', compact('product'));
    }

    /* simpan order */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'    => 'required|exists:products,id',
            'customer_name' => 'required|string|max:100',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        $order = Order::create([
            'product_id'     => $product->id,
            'customer_name'  => $request->customer_name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'price'          => $product->price,
            'status'         => 'pending',
            'payment_method' => 'qris',
        ]);

        return redirect()
            ->route('order.payment', $order->id)
            ->with('success', 'Order berhasil dibuat. Silakan lakukan pembayaran.');
    }

    /* halaman pembayaran paymnet */
    public function payment($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('order.payment', compact('order'));
    }
}


