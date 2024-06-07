<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
</head>
<body>
    <h1>Create Order</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <label>User ID:</label>
        <input type="text" name="user_id" value="{{ old('user_id') }}"><br>
        <label>Product Name:</label>
        <input type="text" name="product_name" value="{{ old('product_name') }}"><br>
        <label>Quantity:</label>
        <input type="text" name="quantity" value="{{ old('quantity') }}"><br>
        <label>Item Price:</label>
        <input type="text" name="item_price" value="{{ old('item_price', '0.00') }}"><br>
        <label>Status:</label>
        <input type="text" name="status" value="{{ old('status', 'pending') }}"><br>
        <label>Price:</label>
        <input type="text" name="price" value="{{ old('price', '0.00') }}"><br>
        <label>Payment Method:</label>
        <input type="text" name="payment_method" value="{{ old('payment_method') }}"><br>
        <label>Payment Status:</label>
        <input type="text" name="payment_status" value="{{ old('payment_status') }}"><br>

        <label>Item ID</label>
        <input type="text" name="order_item_id" value="{{ old('order_item_id') }}"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
