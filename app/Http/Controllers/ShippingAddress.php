<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tech;
use App\Models\Admin;
use App\Models\ZipCode;
use App\Models\Alert;
use App\Models\OrderSale;
use App\Models\ShippingAddr;
use Carbon\Carbon;

class ShippingAddress extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $ship= New ShippingAddr;
        $ship->userId=  Auth::guard('web')->user()->id;
        $ship->name= $request->name;
        $ship->mobileNo= $request->mobileNo;
        $ship->shipaddress= $request->shipaddress;
        $ship->street_address= $request->street_address;
        $ship->country= $request->country;
        $ship->state= $request->state;
        $ship->city= $request->city;
        $ship->zipcode= $request->zipcode;
        $ship->save();
        return redirect('/profile')->with('message', Alert::_message('success', 'Address Added Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $ship= ShippingAddr::find($id);
        $ship->name= $request->name;
        $ship->mobileNo= $request->mobileNo;
        $ship->shipaddress= $request->shipaddress;
        $ship->street_address= $request->street_address;
        $ship->country= $request->country;
        $ship->state= $request->state;
        $ship->city= $request->city;
        $ship->zipcode= $request->zipcode;
        $ship->save();
        return redirect('/profile')->with('message', Alert::_message('success', 'Address Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ship= ShippingAddr::find($id);
        $ship->delete();
      return redirect('/profile')->with('message', Alert::_message('success', 'Address Delete Successfully.'));
    }

// Front end get Address
    public function shipAddress($id)
    {
    //    dd($id);
       $address = ShippingAddr::find($id);

       return view('frontend.shippingAddress.getAddress',compact('address'));
    }

    public function checkAddress(Request $request)
    {


         if($request->address == 'exist')
         {
             $id = $request->id;
             $address = ShippingAddr::find($id);

             return view('frontend.checkout',compact('address'));
         }

    }

    public function createAddress(Request $request)
    {
        // dd($request);
        $address= New ShippingAddr;
        $address->userId=  Auth::guard('web')->user()->id;
        $address->name= $request->name;
        $address->mobileNo= $request->mobileNo;
        $address->shipaddress= $request->shipaddress;
        $address->street_address= $request->street_address;
        $address->country= $request->country;
        $address->state= $request->state;
        $address->city= $request->city;
        $address->zipcode= $request->zipcode;
        $address->save();
        return view('frontend.checkout',compact('address'));
    }



    public function trackingCode(Request $request)
    {
        // dd($request->all());
       $track = $request->trackingNo;
       $date = Carbon::now();
       $order = OrderSale::where('tracking_code',$track)->first();
    //    dd($order);
        if(isset($order))
         {
            if($order->status == 1 || $order->status == 0)
            {
                    $orderID = $order->id;
        $host_v = "http://production.shippingapis.com/ShippingAPI.dll?API=TrackV2%20&XML=%3CTrackRequest%20USERID=%209CELLC3721%22%3E%20%3CTrackID%20ID=%22".$track."%22%3E%3C/TrackID%3E%3C/TrackRequest%3E";
       $ch = curl_init();
       $timeout = 10;
       curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
       curl_setopt($ch, CURLOPT_URL,$host_v);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
       $result = curl_exec($ch);
   		curl_close ($ch);
      $xml = simplexml_load_string($result);
      $json = json_encode($xml);
      $array = json_decode($json,TRUE);
    //   dd($array);
      $check = count($array['TrackInfo']);
      dd($check);
      if ($check == 3) {
        $description = $array['TrackInfo']['TrackSummary'];
        $details = $array['TrackInfo']['TrackDetail'];
      }else {
        $description = $array['TrackInfo']['Error']['Description'];
        $details = null;
      }
      dd($description);
    //if check== 2 then it means there are no any tracking yet ....

      return view('frontend.track-result',compact('track','description','check','details','date','orderID'));
            }
            else
            {
                $orderID = $order->id;
                return view('frontend.track-message',compact('orderID','track','date'));
            }


          }
          else
          {




    }
    }

    public function confirmTracking(Request $request)
    {
        $track = $request->orderID;
        $order = OrderSale::find($track);
        $order->status = 2;
        $order->update();

        return response()->json();


    }

}
