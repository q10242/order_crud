<!DOCTYPE html>
<html>
<head>
    <title>Show Order</title>
</head>
<body>
    <h1>Show Order</h1>

    <p>User ID: {{ $order->user_id }}</p>
    <p>Product Name: {{ $order->orderItem->product_name }}</p>
    <p>Quantity: {{ $order->orderItem->quantity }}</p>
    <p>Item Price: {{ $order->orderItem->price }}</p>
    <p>Order Price: {{ $order->price }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Payment Method: {{ $order->payment_method }}</p>
    <p>Payment Status: {{ $order->payment_status }}</p>

    <a href="{{ route('orders.index') }}">Back to List</a>
</body>
</html>
