<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tech;
use App\Models\ShippingAddr;
use App\Models\Brand;
use App\Models\Pmodel;
use App\Models\RepairType;
use App\Models\ZipCode;
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
use App\Models\Admin;
use App\Models\Alert;

class AdminRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RepairTypes= RepairType::orderBy('id','desc')->get();
        return view('admin.repair-list',compact('RepairTypes'));
    }


    public function repairOrders()
    {
        $RepairOrders= RepairOrder::orderBy('id','desc')->get();
        return view('admin.repair-orders',compact('RepairOrders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.add-repairtype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $repair= New RepairType;
        $repair->model_Id= $request->model_Id;
        $repair->repair_type= $request->repair_type;
        $repair->price= $request->price;
        // $repair->adminId= Auth::guard('admin')->user()->id;
        $repair->save();
        return redirect('/admin/repairTypes')->with('message', Alert::_message('success', 'Repair Type Added Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order= RepairOrder::find($id);
        return view('admin.repair-order-model',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $repair = RepairType::find($id);

        return view('admin.edit-repairtype',compact('repair'));
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
        $repair = RepairType::find($id);
         $repair->model_Id= $request->model_Id;
        $repair->repair_type= $request->repair_type;
        $repair->price= $request->price;
        // $repair->adminId= Auth::guard('admin')->user()->id;
        $repair->save();
        return redirect('/admin/repairTypes')->with('message', Alert::_message('success', 'Repair Type Update Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repair = RepairType::find($id);
        $repair->delete();
        return redirect('/admin/repairTypes')->with('message', Alert::_message('success', 'Repair Type Delete Successfully.'));
    }

    public function assignTech(Request $request){

        $user = User::whereId($request->techid)->update(['jobStatus' => 'busy']);
        $order = RepairOrder::whereId($request->orderId)->update(['techId' => $request->techid]);
        return $user;
    }
}
