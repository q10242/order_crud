<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('orderItems.index', compact('orderItems'));
    }

    public function create()
    {
        return view('orderItems.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        OrderItem::create($request->all());

        return redirect()->route('orderItems.index')->with('success', 'OrderItem created successfully.');
    }

    public function show(OrderItem $orderItem)
    {
        return view('orderItems.show', compact('orderItem'));
    }

    public function edit(OrderItem $orderItem)
    {
        return view('orderItems.edit', compact('orderItem'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderItem->update($request->all());

        return redirect()->route('orderItems.index')->with('success', 'OrderItem updated successfully.');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->route('orderItems.index')->with('success', 'OrderItem deleted successfully.');
    }
}
