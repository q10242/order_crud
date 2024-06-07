<!DOCTYPE html>
<html>
<head>
    <title>Order Items</title>
</head>
<body>
    <h1>Order Items</h1>
    <a href="{{ route('orderItems.create') }}">Create New Order Item</a>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        @foreach ($orderItems as $orderItem)
        <tr>
            <td>{{ $orderItem->product_name }}</td>
            <td>{{ $orderItem->quantity }}</td>
            <td>{{ $orderItem->price }}</td>
            <td>
                <a href="{{ route('orderItems.show', $orderItem->id) }}">Show</a>
                <a href="{{ route('orderItems.edit', $orderItem->id) }}">Edit</a>
                <form action="{{ route('orderItems.destroy', $orderItem->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
