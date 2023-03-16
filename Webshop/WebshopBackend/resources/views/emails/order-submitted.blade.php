<p>Your order Details</p>

<ul>
    {{-- {{ dd($user['name']) }} --}}
    <li><strong>Name:</strong> {{ $user['name'] }}</li>
    <li><strong>Email:</strong> {{ $user['email'] }}</li>

    @foreach ($order as $order)
    {{ dd($order) }}
        <li><strong>Name:</strong> {{ $order['productName'] }}</li>
        <li><strong>Description:</strong> {{ $order['Description'] }}</li>
        <li><strong>Price:</strong> {{ $order['Price'] }}</li>
        <li><strong>Quantity:</strong> {{ $order['quantity'] }}</li>
        <li><strong>Total:</strong> {{ $order['quantity'] * $order['Price'] }}</li>
    @endforeach

    <li><strong>Name:</strong> {{ $shipping['shippingAddress'] }}</li>
    <li><strong>Email:</strong> {{ $shipping['phone'] }}</li>
    <li><strong>Email:</strong> {{ $shipping['paymentMethod '] }}</li>
</ul>

<p>Thanks, for your order</p>
