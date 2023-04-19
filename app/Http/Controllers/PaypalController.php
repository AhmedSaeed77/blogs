<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Srmklive\PayPal\Services\PayPal as PayPalClient;
//use Srmklive\PayPal\Services\ExpressCheckout;

use Omnipay\Omnipay;


class PaypalController extends Controller
{
    // public function payment()
    // {
    //     $data = [];
    //     $data['items'] = [
    //                         [
    //                             'name'=> 'Apple',
    //                             'price' => 100,
    //                             'description' => 'description of product',
    //                             'quantity' => 1 ,
    //                         ]
    //                     ];
    //     $data['invoice_id'] = 1;
    //     $data['invoice_description'] = "order invoice";               
    //     $data['return_url'] = route('success');
    //     $data['cancel_url'] = route('cancel');
    //     $data['total'] = 100;

    //     //$provider = new ExpressCheckout();
    //     // $provider = PayPal::setProvider(); // use Srmklive\PayPal\Services\PayPal as PayPalClient; get the same error
    //     // $provider->setCurrency('EUR')->setExpressCheckout($data);
    // }

    // private $getway ;
    // public function __construct()
    // {
    //     $this->getway = Omnipay::create('PayPal_Rest');
    //     $this->getway->setClientId('');
    // }

    
    
}
