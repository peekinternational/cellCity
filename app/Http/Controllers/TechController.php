<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Tech;
use App\Models\User;
use App\Models\Alert;
use App\Models\Pmodel;
use App\Models\RepairType;
use App\Models\RepairOrder;
use Illuminate\Http\Request;
use App\Models\RepairOrderType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TechController extends Controller
{

      public function techLogin(Request $request)
    {
        if($request->isMethod('post')){

           if(Auth::guard('tech')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'tech']))
           {
            //Authentication passed...
            if(Auth::guard('tech')->check()){
                // dd(Auth::guard('tech')->user()->name );
                return redirect(RouteServiceProvider::TECH);

                    }
                }
                return back()->with('loginError','MisMatch the email and password');
            }
            // dd(Auth::guard('tech')->check());
            // dd(Auth::guard('tech'));

     return view('frontend.technician.login-page');
    }

    public function  orderView($id)
    {
        // dd($id);
        $order= RepairOrder::find($id);
        return view('frontend.technician.repair-order-model',compact('order'));
    }


    public function  acceptOrder($id)
    {
        // dd($id);
        $order= RepairOrder::where('id',$id)->update(['order_status'=>'1']);
        $message = "Accept the Order";
        return response()->json($message);
    }

    public function  penddingOrder($id)
    {
        // dd($id);
        $order= RepairOrder::where('id',$id)->update(['order_status'=>'0']);
        $message = "Pendding the Order!";
        return response()->json($message);
    }


    public function rejectOrder($id)
    {
        // dd($id);
        $order= RepairOrder::find($id);
        $order->techId = null;
        $order->order_status= '2';
        $order->update();

        User::where(['id'=>Auth::guard('tech')->user()->id])->update(['jobStatus'=> "available"]);
        $message = "Successfully Reject!";
        return response()->json($message);
    }

    public function orderModify($id)
    {
        // dd($id);
        $repairOrders = RepairOrder::find($id);
        //   dd($repairOrders);

             $model = Pmodel::where('id',$repairOrders->model_Id)->first();

             $checkbox = RepairOrderType::where('order_Id',$repairOrders->id)->get();
            //  dd($checkbox);

            return view('frontend.technician.order-modify',compact('repairOrders','model','checkbox'));
    }

    public function repairOrderUpdate(Request $request,$id)
    {
        $customer = User::whereId($request->userId)->first();
        $model = explode(',',$request->model_Id);
        $model_Id = $model[0];

        // dd($model_Id);
        $RepairOrders =RepairOrder::find($id);
        $RepairOrders->userId = $request->userId;
        $RepairOrders->model_Id = $model_Id;
        $RepairOrders->date = $request->date;
        $RepairOrders->time = $request->time;
        $RepairOrders->name = $customer->name;
        $RepairOrders->address = $customer->address;
        $RepairOrders->phone = $customer->phoneno;
        $RepairOrders->email = $customer->email;
        $RepairOrders->instructions = $request->instruction;
        $RepairOrders->update();

        $q = "DELETE pp FROM `repair_order_types` pp
              join repair_orders pd on pp.order_Id = pd.id
              WHERE pd.id = ?";


        $status = \DB::delete($q, array($id));
        // dd($q);
        // dd($request->repair_type);
        foreach ($request->repair_type as $key => $value) {
            $ordertype = new RepairOrderType;
            $ordertype->order_Id= $RepairOrders->id;
            if($request->check == 'check')
            {
                  $ordertype->repair_type= RepairType::whereId($value)->first()->repair_type;
                  $ordertype->price= RepairType::whereId($value)->first()->price;
          }
          else{

                  $ordertype->repair_type= RepairType::where('repair_type',$value)->first()->repair_type;
                  $ordertype->price= RepairType::where('repair_type',$value)->first()->price;
          }
            $ordertype->save();
       }

      return back()->with('message', Alert::_message('success', 'Repair Order Update Successfully.'));
    }

}
