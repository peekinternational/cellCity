<?php

namespace App\Http\Controllers;

use App\Mail\ShipppingCode;

use App\Models\Order;
use App\Models\OrderSale;
use App\Models\ShippingAddr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;

class ProductOrderController extends Controller
{
    //
    public function productOrder()
    {

        $productOrder = OrderSale::orderBy('created_at', 'desc')->get();

        OrderSale::where('notification', '=', 0)
            ->update(['notification' => 1]);

        return view('admin.productOrder.list', compact('productOrder'));
    }

    public function productShipping($id)
    {

        $productOrder = Order::find($id);
        $shippingAddress = ShippingAddr::where('id', $productOrder->shipAddress_id)->first();

        return view('admin.productOrder.shippingAdr', compact('shippingAddress'));
    }

    public function orderViewDetails($id)
    {
        // dd($id);

        $productOrder = Order::where('orderSales_id', $id)->where('type', 'phone')->get();
        $accessoryOrder = Order::where('orderSales_id', $id)->where('type', 'accessory')->get();
        // dd($orders);
        // $accessoryOrder = AccessoryOrder::where('orderSales_id',$id)->get();
        // dd($accessoryOrder);
        return view('admin.productOrder.order_modal', compact('productOrder', 'accessoryOrder'));
    }

    public function sendCode(Request $request)
    {
        // dd($request->all());
        $productOrder = OrderSale::find($request->id);
        $user = User::where('id', $productOrder->user_id)->first();
        // dd($user->phoneno);
        $productOrder->status = 1;
        $productOrder->tracking_code = $request->code;
        $productOrder->update();

        $phone = '+'.$user->phoneno;
        $email =      $user->email;
        $shippingCode = $request->code;

        $details = [
            'title' => 'Mail from PeekInternational.com',
            'subject' => 'Dear Customer,',
            'message' => 'Your Shipping Address Code',
            'ShippingCode'  => $shippingCode,
            'OrderID'     =>  $productOrder->id
                ];

        \Mail::to('shan57409@gmail.com')->send(new ShipppingCode($details));

        $message = strip_tags(nl2br("Dear Customer, \n Your Shipping Address Code is :. \n Shipping Code :" .$shippingCode.'Order ID'.$productOrder->id));

        $account_sid = "AC6769d3e36e7a9e9ebbea3839d82a4504";
        $auth_token = "b2229f79769f0b47fa8e7bb685291d0d";
        $twilio_number = +15124027605;
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $phone,
            ['from' => $twilio_number, 'body' => $message]
        );
        return response()->json();
    }
}
