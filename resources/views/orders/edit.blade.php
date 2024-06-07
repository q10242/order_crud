<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>User ID:</label>
        <input type="text" name="user_id" value="{{ $order->user_id }}"><br>
        <label>Product Name:</label>
        <input type="text" name="product_name" value="{{ $order->orderItem->product_name }}"><br>
        <label>Quantity:</label>
        <input type="text" name="quantity" value="{{ $order->orderItem->quantity }}"><br>
        <label>Item Price:</label>
        <input type="text" name="item_price" value="{{ $order->orderItem->price }}"><br>
        <label>Status:</label>
        <input type="text" name="status" value="{{ $order->status }}"><br>
        <label>Price:</label>
        <input type="text" name="price" value="{{ $order->price }}"><br>
        <label>Payment Method:</label>
        <input type="text" name="payment_method" value="{{ $order->payment_method }}"><br>
        <label>Payment Status:</label>
        <input type="text" name="payment_status" value="{{ $order->payment_status }}"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
