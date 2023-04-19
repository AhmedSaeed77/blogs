<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function testtest()
    {
        return view('index'); 
    }

    public function index(Request $request)
    {
        //return "sssssssss";

        if ($request->ajax()) {
            $data = Post::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = route('type.edit', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                
                ->make(true);
        }
        return view('type.index');
    }



    public function payment()
    {
        $data['amount'] =  1;
        $data['currency'] = 'USD';
        $data['customer']['first_name'] = 'Ahmed Saeed';
        $data['customer']['email'] = 'adc@amr.com';
        $data['customer']['phone']['country_code'] = '45';
        $data['customer']['phone']['number'] = '010000045445';
        $data['source']['id'] = 'src_card';
       
                
                
        
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            // CURLOPT_URL => "https://api.tap.company/v2/charges",
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => "",
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 30,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => json_encode($payment),
            // CURLOPT_HTTPHEADER => array(
            //                                 "authorization: Bearer sk_test_pGDAVUkl2wexvPEXfjqbmT7L", // SECRET API KEY
            //                                 "content-type: application/json"
            //                             ),
            // ));

            // $response = curl_exec($curl);

            // $err = curl_error($curl);

            // curl_close($curl);

            // $response = json_decode($response);
            // $book->payment_token = $response->id;

           // $book->save();
        
    }
}
