<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tech;
use App\Models\ShippingAddr;
use App\Models\Brand;
use App\Models\Pmodel;
use App\Models\RepairType;
use App\Models\ZipCode;
use Hash;

class RepairController extends Controller
{
    public function checkZip(Request $request){

    	$code = ZipCode::whereZipcode($request->zipcode)->first();
	    	if($code){

	    	 return response()->json(['status' => 1]);
	    	}else{
	    		return response()->json(['status' => 0]);
	    	}
    	}
  
  public function getBrands(){

  	$brands = Brand::get();
  	return view('frontend.repair-steps',compact('brands'));
  }


    }

