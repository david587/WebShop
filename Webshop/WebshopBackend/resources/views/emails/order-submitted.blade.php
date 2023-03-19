<style>
    body {
        background-color: #F4F4F4;
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #555;
        font-size: 36px;
        margin-bottom: 20px;
    }

    h2 {
        color: #555;
        font-size: 28px;
        margin-bottom: 10px;
    }

    p {
        color: #777;
        font-size: 16px;
        line-height: 1.5;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 30px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .total-price {
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
    }

    .thank-you {
        color: #555;
        font-size: 24px;
        margin-top: 30px;
    }
</style>

<body>
    <div class="container">
        <h1>Your Order Details</h1>

        <h2>Shipping Details</h2>
        @foreach ($order as $order)
            <p><strong>Address:</strong> {{ $order['shippingAddress'] }}</p>
            <p><strong>Phone:</strong> {{ $order['phone'] }}</p>
            <p><strong>Payment:</strong> {{ $order['paymentMethod'] }}</p>
        @endforeach

        <h2>Products Ordered:</h2>
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
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($shipping as $order)
                    <tr>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->product->details }}</td>
                        <td>{{ $order->product->price }} ft</td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                    @php
                        $totalPrice += $order->product->price * $order->quantity;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <p class="total-price">Total Price: {{ $totalPrice }} ft</p>

        <p class="thank-you">Thanks for your order!</p>
    </div>
</body>
