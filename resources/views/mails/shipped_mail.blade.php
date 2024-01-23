<html>
    <body>
        <h1>Hi, {{ $user->first_name }},</h1>
        <h3>Your order has been shipped and will arrive soon.</h3>
        <p>Stripe confirmation id: {{ $order->payment_intent }}</p>

        @foreach ($items as $item)
            <div style="display: flex; padding: 3px">
                <img src="{{ $item->image }}" alt="" width="100">
                <div style="margin-left: 10px">
                    <a href="http://amazon_laravel_vue.test/products/{{ $item->id }}" style="padding: 5px">{{ $item->title }}</a>
                    <div style="padding: 5px">${{ $item->price }}</div>
                </div>
            </div>
        @endforeach

        <p>Total Price: {{ $order->total_decimal }}</p>

        <p>Thank you - Amazon Clone</p>
    </body>
</html>
