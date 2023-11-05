<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\DonationFormRequest;
use App\Models\Donation;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Payment;

class DonationController extends Controller
{
    public function showDonationForm()
    {
        return view('frontend.payment.donate');
    }
    public function makeDonation(Request $request)
    {
        $data = $request->all();
        $api = new Api('rzp_test_VxWhacSnOSH2wD', 'heSgzLq9IDFfMD0b3UeH2Gzc');
        $order = $api->order->create([
            'amount' => $request->get('amount') * 100,
            'currency' => 'INR',
            'payment_capture' => 1,
        ]);
        $orderId = $order['id'];
        $amountPaise = $order['amount'];
        $name = 'John Doe';
        $email = 'johndoe@gmail.com';
        $phone_no = '9851000000';
        $donation = new Donation;
        $donation->name = $name;
        $donation->email = $email;
        $donation->phone_no = $phone_no;
        $donation->amount = 500;
        return view('frontend.payment.razorpay', compact('orderId', 'amountPaise', 'name', 'email', 'phone_no'));
    }
    public function paymentSuccess()
    {
        return view('frontend.payment.payment-success');
    }
    public function paymentFailure()
    {
        return view('frontend.payment.payment-failure');
    }
}
