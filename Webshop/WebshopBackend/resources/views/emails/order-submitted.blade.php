<p>Your order Details</p>

<ul>
    <li><strong>Name:</strong> {{ $UserData['name'] }}</li>
    <li><strong>Email:</strong> {{ $UserData['email'] }}</li>

    @foreach ($userOrder as $order)
        <li><strong>Name:</strong> {{ $order['productName'] }}</li>
        <li><strong>Description:</strong> {{ $order['Description'] }}</li>
        <li><strong>Price:</strong> {{ $order['Price'] }}</li>
        <li><strong>Quantity:</strong> {{ $order['quantity'] }}</li>
        <li><strong>Total:</strong> {{ $order['quantity'] * $order['Price'] }}</li>
    @endforeach

    <li><strong>Name:</strong> {{ $shippingData['shippingAddress'] }}</li>
    <li><strong>Email:</strong> {{ $shippingData['phone'] }}</li>
    <li><strong>Email:</strong> {{ $shippingData['paymentMethod '] }}</li>
</ul>

<p>Thanks, for your order</p>
