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
use App\Models\OrderTime;
use App\Models\Pmodel;
use App\Models\RepairType;
use App\Models\ZipCode;
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
use Illuminate\Support\Facades\Hash;
use PayPal\Api\Order;
use App\Mail\orderPlace;
use Twilio\Rest\Client;

// use Hash;

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

  public function checkDate(Request $request)
  {
      // dd($request->date);
    //   $user = User::find($request->id);
    // dd(Auth::user());
    $repairOrder = RepairOrder::where('order_status','<>', '4')
                                ->whereDate('date','=',$request->date)
                                ->select('time')
                                ->get()->toArray();
    // dd($repairOrder);

    $times =OrderTime::whereNotIn('time', $repairOrder)->get();
   
    return response()->json($times);

  }

public function saverepairType(Request $request){
// dd(Auth::guard('web')->check());

// dd($request->all());
	if(Auth::guard('web')->user()){

	}
    else{
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

     $details = [
      'title' => 'Mail from PeekInternational.com',
      'subject' => 'Dear Customer ,',
      'message' => 'Order placed successfully a technician reached out to you as soon as possible.'
  ];
     
   \Mail::to($request->email)->send(new orderPlace($details));
    
   $phone = '+'.$request->phone;
  
     $message =strip_tags(nl2br("Dear customer,\n You have Placed Order Successfully"));
     
     $account_sid = "AC78a39fa2728f3123ede28816f3b1eeb5";
     $auth_token = "3fdb2a7c51cf2c8c13c389181b071152";
     $twilio_number = +17633108816;
       $client = new Client($account_sid, $auth_token);
       $client->messages->create($phone,
           ['from' => $twilio_number, 'body' => $message] );

     return redirect('repairorder-completed');

  }



    }

