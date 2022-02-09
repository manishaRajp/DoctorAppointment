<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StoreRequest;
use Illuminate\Http\Request;
use Stripe;
use Session;

class PaymentController extends Controller
{
    public function payment()
    {
       return view('admin.dashboard.payment.index');
    }

    public function addpayment(StoreRequest $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * 150,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Making test payment."
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Payment has been successfully processed.');
    }
}
