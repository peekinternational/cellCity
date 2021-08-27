<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShippingAddr;
use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    //
    public function productOrder()
    {
      $productOrder = Order::orderBy('created_at','asc')->get();

      return view('admin.productOrder.list',compact('productOrder'));
    }

    public function productShipping($id)
    {
        $productOrder = Order::find($id);
        $shippingAddress = ShippingAddr::where('id',$productOrder->shipAddress_id)->first();

        return view('admin.productOrder.shippingAdr',compact('shippingAddress'));
    }
}
