<?php

namespace App\Http\Controllers;


use Stripe\Stripe;

class CheckoutController extends Controller
{

    public function intentPaymentMethod(){
        return auth()->user()->createSetupIntent();
    }

    public function charge(){
        try{
            $paymentMethod = ['payment_method' => 'card'];

            $stripe = new Stripe(env('STRIPE_SECRET'));

            dd(auth()->user()->paymentMethods());

            $charge = $stripe->charge()->create([
                'amount' => 1,
                'currency' => 'USD',
                'source' => request('stripeToken'),
                'description' => 'Order',
                'receipt_email' => auth()->user()->email,
                'metadata' => [

                ]
            ]);


            return $charge;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
