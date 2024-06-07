<!DOCTYPE html>
<html>
<head>
    <title>Create Order Item</title>
</head>
<body>
    <h1>Create Order Item</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orderItems.store') }}" method="POST">
        @csrf
        <label>Product Name:</label>
        <input type="text" name="product_name" value="{{ old('product_name') }}"><br>
        <label>Quantity:</label>
        <input type="text" name="quantity" value="{{ old('quantity') }}"><br>
        <label>Price:</label>
        <input type="text" name="price" value="{{ old('price') }}"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
