<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrepaidBalanceController extends Controller
{
    //
    public function index()
    {
        return view('prepaid-balance');
    }

    public function success()
    {
        return view('success');
    }
}
