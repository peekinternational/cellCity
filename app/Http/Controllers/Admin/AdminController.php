<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tech;
use App\Models\Admin;
use App\Models\Alert;
use App\Models\RepairOrder;
use Hash;

class AdminController extends Controller
{
   public function adminLogin(Request $request)
    {
    	 if($request->isMethod('post')){
           if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])){
        //Authentication passed...
        if(Auth::guard('admin')->check()){
            // dd(Auth::guard('tech')->user()->name );
            return redirect(RouteServiceProvider::ADMIN);

                }
            }
        }
        return view('admin.auth.login');
    }


    public function editCustomer(Request $request,$id){
      $customer= User::find($id);
      // dd($customer);

      return view('admin.edit-customer',compact('customer'));
    }


	public function addCustomer(Request $request){


         if($request->isMethod('post')){
            // dd($request->all());

	           if($request->input('c_id')){

                $id=$request->input('c_id');
                $user = User::find($id);
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'user';
                $user->password = Hash::make($request->password);
                $user->save();
                 // dd($user);
                return redirect('/admin/customers')->with('message', Alert::_message('success', 'Customer Updated Successfully.'));

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
                $user->phoneno =  $request->phoneno;
                $user->role = 'user';
                $user->password = Hash::make($request->password);
                $user->save();

             return redirect('/admin/customers')->with('message', Alert::_message('success', 'Customer Added Successfully.'));

           }


        }

      return view('admin.add-customer');
	}

    public function showCustomers(){

    	$customers = User::whereRole('user')->orderBy('id','desc')->get();
    	// dd($customers);
    	return view('admin.contacts-list',compact('customers'));
    }

    public function deleteCustomer($id){
        User::whereId($id)->delete();
    	return redirect()->back()->with('message',  Alert::_message('success', 'Customer Deleted Successfully.'));
    }




     public function editTechnician(Request $request,$id){
      $customer= User::find($id);
      // dd($customer);

      return view('admin.edit-technician',compact('customer'));
    }

	public function addTechnician(Request $request){


         if($request->isMethod('post')){
            // dd($request->all());

	           if($request->input('c_id')){

                $id=$request->input('c_id');
                $user = User::find($id);
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'tech';
                $user->jobStatus = 'available';
                $user->password = Hash::make($request->password);
                $user->save();
                 // dd($user);
                return redirect('/admin/technicians')->with('message', Alert::_message('success', 'Technician Updated Successfully.'));

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

           	    $user = new Tech;
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'tech';
                $user->jobStatus = 'available';
                $user->password = Hash::make($request->password);
                $user->save();

             return redirect('/admin/technicians')->with('message', Alert::_message('success', 'Technician Added Successfully.'));

           }

        }

      return view('admin.add-technician');
	}

    public function showTechnicians(){

    	$customers = User::whereRole('tech')->orderBy('id','desc')->get();
    	// dd($customers);
    	return view('admin.technicians-list',compact('customers'));
    }

    public function deleteTechnician($id){
        User::whereId($id)->delete();
    	return redirect()->back()->with('message',  Alert::_message('success', 'Technician Deleted Successfully.'));
    }

    public function rejectOrder($orderId)
    {
        $order= RepairOrder::find($orderId);

        if($user=User::where('id',$order->techId)->first())
        {
          $user->jobStatus = 'available';
          $user->update(['jobStatus'=> "available"]);
     
          $order->techId = null;
          $order->order_status= '3';
          $order->update();
           }
        else
        {
          $order->techId = null;
          $order->order_status= '3';
          $order->update();
        }

        $message = "Successfully Reject!";
        return response()->json($message);
    }

}
