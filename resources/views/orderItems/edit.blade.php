<!DOCTYPE html>
<html>
<head>
    <title>Edit Order Item</title>
</head>
<body>
    <h1>Edit Order Item</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orderItems.update', $orderItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Product Name:</label>
        <input type="text" name="product_name" value="{{ $orderItem->product_name }}"><br>
        <label>Quantity:</label>
        <input type="text" name="quantity" value="{{ $orderItem->quantity }}"><br>
        <label>Price:</label>
        <input type="text" name="price" value="{{ $orderItem->price }}"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
