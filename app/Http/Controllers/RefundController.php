<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alert;
use App\Mail\refundAccept;
use DB;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refundOrder = Refund::with('order')->orderBy('created_at', 'asc')->get();
         // dd($refundOrder);
        return view('admin.refund.list', compact('refundOrder'));
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
        $refund = new Refund;
           if($request->hasFile('file'))
        {
            $image=$request->file('file');
            $image_new = time().$image->getClientOriginalName();
            $image->move('storage/image/blog/',$image_new);

           $refund->file = 'storage/image/blog/'.$image_new;

        }
        $refund->order_id = $request->input('order_id');
        $refund->user_id = Auth::user()->id;
        $refund->reason = $request->input('reason');
        $refund->detail = $request->input('detail');
        $refund->status = '0';
        $refund->save();

         $details = [
                     'title' => 'Mail from CellCity.com',
                     'subject' => 'Dear Customer ,',
                     'message' => 'Your refund request has been submitted successfully, It would take 2 - 3 business days to review your request.'
                 ];
 
               \Mail::to(Auth::user()->email)->send(new refundAccept($details));
        return back()->with('message','Your refund request has been submitted successfully, It would take 2 - 3 business days to review your request');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Refund $refund)
    {
        //
    }
 public function refundReject($id)
    {
        // dd($data->user);
       DB::table('refunds')->where('id',$id)->update(['status'=>'2']);
        $data=Refund::where('id',$id)->first();

         $details = [
                     'title' => 'Mail from CellCity.com',
                     'subject' => 'Dear Customer ,',
                     'message' => 'Your refund request has been rejected.'
                 ];
 
               \Mail::to($data->user->email)->send(new refundAccept($details));

        return redirect('admin/refunds')->with('message', Alert::_message('success','Successfully.'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Refund $refund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refund $refund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refund $refund)
    {
        //
    }
}
