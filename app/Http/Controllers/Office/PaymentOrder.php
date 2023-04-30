<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentOrder extends Controller
{

    public function show(){

    $user = Auth::user();
       $order = Order::where('user_id', $user->id)->latest()->first();

        $merchantId = env('PAYU_MERCHANTID');
        $ApiKey = env('PAYU_APIKEY');

        $referenceCode = 'guart'. $order->id;
        $amount = $order->costo_total;
        $currency = "USD";
       

        $firma= $ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~".$currency;
        $signature= md5($firma);

        return view('office.payment-order', compact('user','signature', 'referenceCode','merchantId'));

    }

}
