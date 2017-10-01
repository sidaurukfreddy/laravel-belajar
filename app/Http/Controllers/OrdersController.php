<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //

    public function index()
    {
        $order = Products::where('user_id', Auth::id())
                            ->paginate('20');
        return view('order', ['orders' => $order ]);
    }
}
