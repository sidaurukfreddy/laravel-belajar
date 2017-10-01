<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    public $timestamps = true;
    protected $fillable = array('name', 'address', 'price','user_id','order_number','type','status');
}





