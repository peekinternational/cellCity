<?php

namespace App\Http\Controllers;

use App\Models\ProductCondition;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Alert;
use App\Models\ProductStorage;
use DB;
class ProductConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $colors = Product::find($id)->color;

        return view('admin.condition.index',compact('colors'));
    }

    public function storeCondition(Request $request)
    {

    //    dd($request->all());


         $condition = $request->condition_id;


        //  dd($condition);
        if(isset($condition))
         {

          foreach ($condition as $key =>$condit){
            // dd($condit);
            foreach ($condit as $key2 => $value) {

                $conditions = ProductCondition::find($value);
                $conditions->condition =$request->condition[$key][$key2];
                $conditions->price = $request->price[$key][$key2];
                $conditions->quantity = $request->quantity[$key][$key2];
                // dd($productCondit);
                $conditions->save();


            }

         }
         return back()->with('message', Alert::_message('success', 'Product Condition updated Successfully.'));
        }

        $storage2  =$request->storage2_id;
        if (isset($storage2)) {
            foreach($storage2 as $key6=>$storg2)
            {
                foreach($storg2 as $key7=>$condit2)
                {
                   foreach($condit2 as $key8=>$storag2)
                   {

                   $productCondit = new ProductCondition;

                   $productCondit->condition =$request->condition2[$key6][$key7][$key8];
                   $productCondit->price = $request->price2[$key6][$key7][$key8];
                   $productCondit->quantity = $request->quantity2[$key6][$key7][$key8];
                   $productCondit->storage_id =$storag2;


                   $productCondit->save();
                //    dd($storage_id);
            }
                }

            }
            return back()->with('message', Alert::_message('success', 'New Product Condition Store Successfully.'));
            }





        // return view('admin.condition.index',compact('colors'));
    }

    public function deleteCondition($ids,$id2)
    {
      ProductCondition::where('id',$id2)->where('storage_id',$ids)->delete();
        // $productConditions->where('storage_id', $ids)->delete();
        return back()->with('message', Alert::_message('success', 'Product Condition Deleted Successfully.'));

        // $productConditions->whereIn('storage_id', $productConditions->storage_id)->each->delete();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storage($id)
    {
        $colors = Product::find($id)->color;

        return view('admin.storage.index',compact('colors'));
    }
    public function storeStorage($request)
    {
        dd($request);
    }
    public function deleteStorage($id)
    {
        $productCondit = ProductCondition::all();
        $productCondit->whereIn('storage_id',$id)->each->delete();
        ProductStorage::where('id',$id)->delete();

        return back()->with('message', Alert::_message('success', 'Product Condition Deleted Successfully.'));
    }


    public function color($id)// Color Update and Delete
    {
        $colors = Product::find($id)->color;

        return view('admin.color.index',compact('colors'));
    }
    public function storeColor(Request $request)// Color Update and Delete
    {
        dd($request->all());
        // $colors = Product::find($id)->color;

        return view('admin.color.index',compact('colors'));
    }
    public function deleteColor($id)// Color Update and Delete
    {
        $colors = Product::find($id)->color;

        return view('admin.color.index',compact('colors'));
    }


    public function image()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCondition $productCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCondition $productCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCondition $productCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCondition $productCondition)
    {
        //
    }
}
