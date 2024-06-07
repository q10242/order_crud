<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<body>
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}">Create New Order</a>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    <table>
        <tr>
            <th>User ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Item Price</th>
            <th>Order Price</th>
            <th>Status</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Actions</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->orderItem->product_name }}</td>
            <td>{{ $order->orderItem->quantity }}</td>
            <td>{{ $order->orderItem->price }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->payment_status }}</td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}">Show</a>
                <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
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
