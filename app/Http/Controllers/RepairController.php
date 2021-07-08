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
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
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

  public function getModels($id){

  	$models = Pmodel::whereBrandId($id)->get();
  	// dd($models);
  	return view('frontend.models',compact('models'));
  }

  public function getrepairTypes($id){

  	$RepairTypes = RepairType::whereModelId($id)->get();
  	// dd($models);
  	return view('frontend.repair-type',compact('RepairTypes'));
  } 

  public function saverepairType(Request $request){
// dd(Auth::guard('web')->check());
	if(Auth::guard('web')->user()){

		

	}else{
	    $this->validate($request,[
	        'name' => 'required|min:5|max:50',
	        'phoneno' => 'min:2|max:17',
	        'email' => 'required|email|unique:users,email',
	        'password' => 'required|min:5|max:50'

	      ],[

	        'name.required' =>'Enter Name',
	        'email.unique' => 'Email must be unique',
	        'email.required' => 'Enter Email',
	        'phoneno.required' => 'Enter Mobile Number',
	        'password.required' => 'Enter password',
	      ]);
		$user = new User;
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->address =  $request->address;
        $user->phoneno =  $request->phone;
        $user->role = 'user';
        $user->password = Hash::make($request->password);
        $user->save();
	}

     $userId=0;
     if(Auth::guard('web')->check()){

     	$userId= Auth::guard('web')->user()->id;
     }else{
        $userId=$user->id;
     }

     $order = New RepairOrder;


     $order->userId = $userId;
     $order->model_Id = $request->model_Id;
     $order->date = $request->date;
     $order->time = $request->time;
     $order->name = $request->name;
     $order->address = $request->address;
     $order->phone = $request->phone;
     $order->email = $request->email;
     $order->instructions = $request->instructions;
     $order->save();

     foreach ($request->repair_type as $key => $value) {
     	 $ordertype = New RepairOrderType;
     	 $ordertype->order_Id= $order->id;
     	 $ordertype->repair_type= RepairType::whereId($value)->first()->repair_type;
     	 $ordertype->price= RepairType::whereId($value)->first()->price;
     	 $ordertype->save();
     }
     return redirect('repairorder-completed');
  	
  }



    }

