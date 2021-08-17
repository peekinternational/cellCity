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
use App\Models\ShippingAddr;

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
        $ship= New ShippingAddr;
        $ship->userId=  Auth::guard('web')->user()->id;
        $ship->name= $request->name;
        $ship->mobileNo= $request->mobileNo;
        $ship->shipaddress= $request->shipaddress;
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
        //  dd($request->all());

         if($request->address == 'exist')
         {
             $id = $request->id;
             $address = ShippingAddr::find($id);

             return view('frontend.checkout',compact('address'));
         }
    }

}
