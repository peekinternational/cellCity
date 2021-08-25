<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    //
    public function productOrder()
    {
      $productOrder = Order::orderBy('created_at','asc')->get();

      return view('admin.productOrder.list',compact('productOrder'));
    }
}
