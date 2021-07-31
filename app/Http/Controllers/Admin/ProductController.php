<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Pmodel;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    public function getModels($id)
    {
        
         $brand= Brand::find($id);
        //  dd($brand);
         $pmodels = Pmodel::where('brand_Id',$brand->id)->get();

         return view('admin.products.getModel',compact('pmodels','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         $product = new Product;
        //  $product->insert($request->only($product->getFillable()));
         
         $product->storage = $request->storage;
         $product->colors = $request->colors;
         $product->ram = $request->ram;
         $product->locked = $request->locked;
         $product->warranty = $request->warranty;
         $product->sell_price = $request->sell_price;
         $product->original_price = $request->original_price;
         $product->desc = $request->desc;
         $product->display = $request->display;
         $product->cameraMp = $request->cameraMp;
         $product->OS = $request->OS;
         $product->resolution = $request->resolution;
         $product->quantity = $request->quantity;
       
         $product->category = $request->category;
         $product->model_id = $request->model_id;
        
        $product->save();
        //  dd($product);
       
        foreach($request->file('image') as $image)
        {  
            $imageName= time().$image->getClientOriginalName();
            $image->move('storage/images/products/', $imageName);  

            $imagefile = new ProductImage;
            $imagefile->image =  'storage/images/products/'. $imageName;
            $imagefile->product_id = $product->id;
            $imagefile->save();
            
        }
        
        return back()->with('message', Alert::_message('success', 'Product Created Successfully.'));
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
         $images = ProductImage::where('product_id',$product->id)->get();
        //  dd($product);
        return view('admin.products.edit',compact('product','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request);
        $product = Product::find($id);
        //  $product->insert($request->only($product->getFillable()));
         
         $product->storage = $request->storage;
         $product->colors = $request->colors;
         $product->ram = $request->ram;
         $product->locked = $request->locked;
         $product->warranty = $request->warranty;
         $product->sell_price = $request->sell_price;
         $product->original_price = $request->original_price;
         $product->desc = $request->desc;
         $product->display = $request->display;
         $product->cameraMp = $request->cameraMp;
         $product->OS = $request->OS;
         $product->resolution = $request->resolution;
         $product->quantity = $request->quantity;
       
         $product->category = $request->category;
         $product->model_id = $request->model_Id;
         $product->update();
        //  dd($product);

        
                $q = "DELETE pp FROM `product_images` pp
                    join products pd on pp.product_id = pd.id
                    WHERE pd.id = ?";


                $status = \DB::delete($q, array($id));
      
       
        foreach($request->file('image') as $image)
        {  
            $imageName= time().$image->getClientOriginalName();
            $image->move('storage/images/products/', $imageName);  

            $imagefile = new ProductImage;
            $imagefile->image =  'storage/images/products/'. $imageName;
            $imagefile->product_id = $product->id;
            $imagefile->save();
            
        }
        
        return back()->with('message', Alert::_message('success', 'Product Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $product = Product::find($id);
        // dd($product);
        ProductImage::where('product_id',$product->id)->delete();

        $product->delete();
        return back()->with('message', Alert::_message('success', 'Product Deleted Successfully.'));

         
    }



    /// Frontend buy phones

    public function getPhones()
    {
        $products = Product::all();
        return view('frontend.buy-phone',compact('products'));
    }
}
