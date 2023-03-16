

Your order Details<br><br>
Name: {{ $user['name'] }}<br>
Email: {{ $user['email'] }}<br><br>
Shipping Details<br><br>

@foreach ($order as $order)
Address: {{ $order['shippingAddress'] }}<br>
Phone: {{ $order['phone'] }}<br>
Payment: {{ $order['paymentMethod'] }}<br><br>
@endforeach

Products Ordered:<br><br>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shipping as $order)
            <tr>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->product->details }}</td>
                <td>{{ $order->product->price }}</td>
                <td>{{ $order->quantity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br><br>
Thanks for your order<br>
