<?php

namespace App\Http\Controllers;


use Stripe\Stripe;

class CheckoutController extends Controller
{

    public function intentPaymentMethod(){
        return auth()->user()->createSetupIntent();
    }

    public function generateInvoice()
    {
        try {
            $user = auth()->user();

            if (!$user) return "User not logged in";

            $paymentMethods = $user->paymentMethods();

            if ($user->hasPaymentMethod()) {
                $paymentMethod = $user->defaultPaymentMethod();
            }


            dd(auth()->user()->charge('ler', 'card'));
            $response = auth()->user->charge('ler', 100);

            return response()->json( ['success' => true, 'data' => $response ] ,200);

        } catch (Exception $e) {
            return response()->json( ['success' => false, 'data' => $e->getMessage() ] ,500);
        }
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
