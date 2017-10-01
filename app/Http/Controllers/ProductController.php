<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        return view('product');
    }

    public function success()
    {
        return view('product');
    }
}
