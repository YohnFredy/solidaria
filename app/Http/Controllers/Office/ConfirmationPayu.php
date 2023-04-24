<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Proof;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ConfirmationPayu extends Controller
{
    public function index(Request $request)
    {
        $response_code_pol = $request->response_code_pol; //5
        $phone = $request->phone; //
        $additional_value = $request->additional_value; //0.00
        $test = $request->test; //1
        $transaction_date = $request->transaction_date; //2015-05-27 13:07:35
        $cc_number = $request->cc_number; //************0004
        $cc_holder = $request->cc_holder; //test_buyer
        $error_code_bank = $request->error_code_bank; //
        $billing_country = $request->billing_country; //CO
        $bank_referenced_name = $request->bank_referenced_name; //
        $description = $request->description; //test_payu_01
        $administrative_fee_tax = $request->administrative_fee_tax; //0.00
        $value = $request->value; //100.00
        $administrative_fee = $request->administrative_fee; //0.00
        $payment_method_type = $request->payment_method_type; //2
        $office_phone = $request->office_phone; //
        $email_buyer = $request->email_buyer; //test@payulatam.com
        $response_message_pol = $request->response_message_pol; //ENTITY_DECLINED
        $error_message_bank = $request->error_message_bank; //
        $shipping_city = $request->shipping_city; //
        $transaction_id = $request->transaction_id; //f5e668f1-7ecc-4b83-a4d1-0aaa68260862
        $sign = $request->sign; //e1b0939bbdc99ea84387bee9b90e4f5c
        $tax = $request->tax; //0.00
        $payment_method = $request->payment_method; //10
        $billing_address = $request->billing_address; //cll 93
        $payment_method_name = $request->payment_method_name; //VISA
        $pse_bank = $request->pse_bank; //
        $state_pol = $request->state_pol; //6 guardar
        $date = $request->date; //2015.05.27 01:07:35
        $nickname_buyer = $request->nickname_buyer; //
        $reference_pol = $request->reference_pol; //7069375
        $currency = $request->currency; //USD
        $risk = $request->risk; //1.0
        $shipping_address = $request->shipping_address; //
        $bank_id = $request->bank_id; //10
        $payment_request_state = $request->payment_request_state; //R
        $customer_number = $request->customer_number; //
        $administrative_fee_base = $request->administrative_fee_base; //0.00
        $attempts = $request->attempts; //1
        $merchant_id = env('PAYU_MERCHANTID'); //508029
        $exchange_rate = $request->exchange_rate; //2541.15
        $shipping_country = $request->shipping_country; //
        $installments_number = $request->installments_number; //1
        $franchise = $request->franchise; //VISA
        $payment_method_id = $request->payment_method_id; //2
        $extra1 = $request->extra1; //
        $extra2 = $request->extra2; //
        $antifraudMerchantId = $request->antifraudMerchantId; //
        $extra3 = $request->extra3; //
        $nickname_seller = $request->nickname_seller; //
        $ip = $request->ip; //190.242.116.98
        $airline_code = $request->airline_code; //
        $billing_city = $request->billing_city; //Bogota
        $pse_reference1 = $request->pse_reference1; //
        $reference_sale = $request->reference_sale; //
        $pse_reference3 = $request->pse_reference3; //
        $pse_reference2 = $request->pse_reference2; //


        $integer_part = floor($value); // parte entera.
        $first_decimal = intval(($value - $integer_part) * 10); // primer decimal.
        $second_decimal = intval(($value * 100) % 10); // segundo decimal.

        if ($second_decimal == 0) {
            $value = number_format($value, 1, '.', '');
        } else {
            $value = number_format($value, 2, '.', '');
        }

        $firma_cadena = "$merchant_id~$reference_sale~$value~$currency~$state_pol";
        $firmacreada = md5($firma_cadena);

        /*  http://solidaria.test/confirmation-payu?&value=10&merchant_id=508029&reference_sale=20&currency=USD&state_pol=6
         https://octopus-app-zutpq.ondigitalocean.app/confirmation-payu?&value=10&merchant_id=508029&reference_sale=20&currency=USD&state_pol=6
 */

        /* Proof::create([
            'shipping_cost' => 111,
            'merchant_id' => 111,
            'reference_sale' => 11,
            'currency' => 11,
            '$state_pol' => 11,
        ]);
 */
        if (strtoupper($sign) == strtoupper($firmacreada)) {

            Proof::create([
                'shipping_cost' => $value,
                'merchant_id' => $merchant_id,
                'reference_sale' => $reference_sale,
                'currency' => $currency,
                '$state_pol' => $state_pol,
            ]);
        } else {
            Proof::create([
                'shipping_cost' => 111,
                'merchant_id' => 111,
                'reference_sale' => 11,
                'currency' => 11,
                '$state_pol' => 11,
            ]);
        }
    }
}
