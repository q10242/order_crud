<!DOCTYPE html>
<html>
<head>
    <title>Show Order Item</title>
</head>
<body>
    <h1>Show Order Item</h1>

    <p>Product Name: {{ $orderItem->product_name }}</p>
    <p>Quantity: {{ $orderItem->quantity }}</p>
    <p>Price: {{ $orderItem->price }}</p>

    <a href="{{ route('orderItems.index') }}">Back to List</a>
</body>
</html>
