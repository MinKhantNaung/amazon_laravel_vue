<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index()
    {
        // sk_test mean 'secret key'
        $stripe = new \Stripe\StripeClient('sk_test_51Ob1GdBAGdJ82UGCfgBANsNwZVwNoYzbDtFn1Jgyb8bBt5Ew2OGKwMNiUIws7aeTLnA6jKYOSPnJX3o9eijsAuYV008uh7fNzw');

        $order = Order::where('user_id', auth()->user()->id)
            ->whereNull('payment_intent')
            ->first();

        // if(is_null($order)) {
        //     return to_route('checkout_success.index');
        // }

        $intent = $stripe->paymentIntents->create([
            'amount' => $order->total,
            'currency' => 'usd',
            'payment_method_types' => ['card']
        ]);

        return Inertia::render('Checkout', [
            'intent' => $intent,
            'order' => $order
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::where('user_id', auth()->user()->id)
            ->whereNull('payment_intent')
            ->first();

        if (!is_null($order)) {
            $order->update([
                'total' => $request->total,
                'total_decimal' => $request->total_decimal,
                'items' => json_encode($request->items),
            ]);
        } else {
            Order::create([
                'user_id' => auth()->user()->id,
                'total' => $request->total,
                'total_decimal' => $request->total_decimal,
                'items' => json_encode($request->items)
            ]);
        }

        return to_route('checkout.index');
    }

    public function update(Request $request)
    {
        $order = Order::where('user_id', auth()->user()->id)
            ->whereNull('payment_intent')
            ->first();

        $order->update([
            'payment_intent' => $request->payment_intent
        ]);

        return to_route('checkout_success.index');
    }
}
