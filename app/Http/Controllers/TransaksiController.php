<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class TransaksiController extends Controller
{

    public function store(Request $request)
    {
       if ($request->input('type') == 'PRODUCT')
        {
            $this->insertProduct($request);
        }
        else
        {
            $this->insertPrepaidBalance($request);
        }

    }

    function insertProduct($request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:7|max:12',
            'price' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails())
        {
            Redirect::to('product')->send()
                ->withErrors($validator)
                ->withInput();
        } else
        {

            $data = [
                'user_id' => Auth::id(),
                'order_number' => $this->generateOrderNumber(),
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'address' => $request->input('address'),
                'type' => $request->input('type'),


            ];

            $response=Products::create($data);

            return redirect()->route('product/success');
                
        }

    }

    function insertPrepaidBalance($request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:7|max:12',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
                Redirect::to('prepaid-balance')->send()
                ->withErrors($validator)
                ->withInput();
        } else {

            $data = [
                'user_id'      => Auth::id(),
                'order_number' => $this->generateOrderNumber(),
                'name'         => $request->input('name'),
                'price'        => $request->input('price'),
                'type'         => $request->input('type'),

            ];

            $response = Products::create($data);

            return redirect()->route('product/success');
  
        }
    }





    function generateOrderNumber()
    {
        $number = mt_rand(1000000000, 9999999999);
        return $number;
    }


    function orderNumberExist($number) //checking order number exsit
    {
        return Products::whereBarcodeNumber($number)->exists();
    }






}
