<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Solidaria extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $merchantId = env('PAYU_MERCHANTID');
        $ApiKey = env('PAYU_APIKEY');

        $numero_aleatorio = random_int(1, 10000);
        $referenceCode = $numero_aleatorio;
        $amount = 15;
        $currency = "USD";
       

        $firma= $ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~".$currency;
        $signature= md5($firma);




        return view('office.solidaria', compact('user','signature', 'referenceCode','merchantId' ));
    }
}
