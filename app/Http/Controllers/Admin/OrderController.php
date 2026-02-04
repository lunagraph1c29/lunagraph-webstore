<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function markPaid($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'paid'
        ]);

        return back()->with('success','Order berhasil ditandai lunas.');
    }
}


