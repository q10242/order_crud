<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItem')->get();
        return view('orders.index', compact('orders'));
    }


    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_item_id' => 'required|exists:order_items,id',
            'status' => 'required|string|max:255',
            'price' => 'required|numeric',
            'payment_method' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('orderItem');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load('orderItem');
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_item_id' => 'required|exists:order_items,id',
            'status' => 'required|string|max:255',
            'price' => 'required|numeric',
            'payment_method' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
