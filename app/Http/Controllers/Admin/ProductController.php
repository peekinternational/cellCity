<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductCondition;
use App\Models\Pmodel;
use App\Models\ProductColor;
use App\Models\ProductStorage;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alert;
use DB;

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
        // dd($request->file('image'));
//         DB::beginTransaction();

// try {
        $product = new Product;
        //  $product->insert($request->only($product->getFillable()));

         $product->category = $request->category;
         $product->memory = $request->memory;
         $product->locked = $request->locked;
         $product->warranty = $request->warranty;
         $product->desc = $request->desc;
         $product->screen_size = $request->screen_size;
         $product->megapixel = $request->megapixel;
         $product->OS = $request->OS;
         $product->resolution = $request->resolution;
         $product->screen_type = $request->screen_type;
         $product->network = $request->network;
         $product->sim_card_format = $request->sim_card_format;
         $product->double_sim = $request->double_sim;
         $product->release_year = $request->release_year;
         $product->model_id = $request->model_id;
        //  dd($product);
        $product->save();



        foreach($request->color_name as $key=> $colors)
        {

            $color = new ProductColor;
            $color->color_name = $colors;
            $color->product_id = $product->id;
            $color->save();

            foreach($request->storage[$key] as $key2=>$storages)
            {

                $storage = new ProductStorage;
                $storage->storage = $storages;
                $storage->color_id = $color->id;
                $storage->save();


            foreach($request->condition[$key2] as $key3=>$conditions)
            {
                //  dd($condition);
                $condition = new ProductCondition;
                $condition->condition =$conditions;
                $condition->price = $request->price[$key2][$key3];
                $condition->quantity = $request->quantity[$key2][$key3];
                $condition->storage_id = $storage->id;
                $condition->save();
            }
        }

         foreach($request->file('image')[$key] as $image)
            {

                $imageName= time().$image->getClientOriginalName();
                $destination ='storage/products/images/';
                $image->move(public_path($destination), $imageName);

                // dd($imageName);
                $imagefile = new ProductImage;
                $imagefile->image = $imageName;
                $imagefile->product_id = $product->id;
                $imagefile->color_id = $color->id;
                $imagefile->save();
                // dd($request->condition);

                // dd($storage);


    }

    }
    //     DB::commit();

    // } catch (\Exception $e) {
    //     DB::rollback();
    //     return back()->with('message', Alert::_message('success', 'somthing wrong.'));
    // }

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
//Store Product Ajax
  public function storeProduct(Request $request)
    {      
            
          ;
        //         DB::beginTransaction();
        // dd($request->all());
   
         

        // try {
            $product = new Product;
            //  $product->insert($request->only($product->getFillable()));

            $product->category = $request->category;
            $product->memory = $request->memory;
            $product->locked = $request->locked;
            $product->warranty = $request->warranty;
            $product->desc = $request->desc;
            $product->screen_size = $request->screen_size;
            $product->megapixel = $request->megapixel;
            $product->OS = $request->OS;
            $product->resolution = $request->resolution;
            $product->screen_type = $request->screen_type;
            $product->network = $request->network;
            $product->sim_card_format = $request->sim_card_format;
            $product->double_sim = $request->double_sim;
            $product->release_year = $request->release_year;
            $product->model_id = $request->model_id;
            //  dd($product);
            $product->save();



            foreach($request->color_name as $key=> $colors)
            {

                $color = new ProductColor;
                $color->color_name = $colors;
                $color->product_id = $product->id;
                $color->save();

                foreach($request->storage[$key] as $key2=>$storages)
                {

                    $storage = new ProductStorage;
                    $storage->storage = $storages;
                    $storage->color_id = $color->id;
                    $storage->save();


                foreach($request->condition[$key2] as $key3=>$condit)
                {
                    //  dd($condition);
                    $condition = new ProductCondition;
                    $condition->condition =$condit;
                    $condition->price = $request->price[$key2][$key3];
                    $condition->quantity = $request->quantity[$key2][$key3];
                    $condition->storage_id = $storage->id;
                    $condition->save();
                }
            }
         
            
        
            foreach($request->file('image')[$key] as $image)
                {
                    
                    $imageName= time().$image->getClientOriginalName();
                    $destination ='storage/products/images/';
                    $image->move(public_path($destination), $imageName);

                    // dd($imageName);
                    $imagefile = new ProductImage;
                    $imagefile->image = $imageName;
                    $imagefile->product_id = $product->id;
                    $imagefile->color_id = $color->id;
                    $imagefile->save();
                    // dd($request->condition);

                    
                

        }


        }

       
        //     DB::commit();

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return back()->with('message', Alert::_message('success', 'somthing wrong.'));
        // }

    return response()->json($product);
  }

    public function storeMoreProduct(Request $request)
    {
        //    dd($request->all());

           $product_id = $request->product_id;

           foreach($request->color_name as $key=> $colors)
           {

               $color = new ProductColor;
               $color->color_name = $colors;
               $color->product_id = $product_id;
               $color->save();

               foreach($request->storage[$key] as $key2=>$storages)
               {

                   $storage = new ProductStorage;
                   $storage->storage = $storages;
                   $storage->color_id = $color->id;
                   $storage->save();


               foreach($request->condition[$key2] as $key3=>$condit)
               {
                   //  dd($condition);
                   $condition = new ProductCondition;
                   $condition->condition =$condit;
                   $condition->price = $request->price[$key2][$key3];
                   $condition->quantity = $request->quantity[$key2][$key3];
                   $condition->storage_id = $storage->id;
                   $condition->save();
               }
           }
        
           
       
           foreach($request->file('image')[$key] as $image)
               {
                   
                   $imageName= time().$image->getClientOriginalName();
                   $destination ='storage/products/images/';
                   $image->move(public_path($destination), $imageName);

                   // dd($imageName);
                   $imagefile = new ProductImage;
                   $imagefile->image = $imageName;
                   $imagefile->product_id = $product_id;
                   $imagefile->color_id = $color->id;
                   $imagefile->save();
                   // dd($request->condition);

                   
               

        }
    
        }
             
    return response()->json($product_id);
   }
    /// Frontend buy phones

    public function getPhones()
    {
        $products = Product::all();
        $colors  = ProductColor::all();
      
        return view('frontend.buy-phone',compact('products','colors'));
    }

   public function productDetail($id)
   {
       $colors = Product::find($id)->color;
       $product = Product::find($id);
    //    dd($product);
       $color = ProductColor::where('product_id',$id)->first();
       
       $storage = ProductStorage::where('color_id',$color->id)->first();
       $model = Pmodel::where('id',$product->model_id)->first();
       $images = ProductImage::where('color_id',$color->id)->get();
    //    dd($images);
       $condition = ProductCondition::where('storage_id',$storage->id)->first();
       return view('frontend.single',compact('product','color','model','condition','images','storage',
       'colors'));
   }


   public function getStorage($id)
   {
    //    dd($id);
       $color = ProductColor::find($id);
       $storages = ProductStorage::where('color_id',$color->id)->get();
       $images = ProductImage::where('color_id',$color->id)->get();
    
       $temp= null;

       foreach($storages as $storage)
       {

            $temp .='
                    <div class="select-color">
                        <input type="radio" name="storage" class="hidden" id="'.$storage->id.'">
                        <label class="color" for="'.$storage->id.'" onclick="geCondition('.$storage->id.')">
                            '.$storage->storage.'
                        </label>
                    </div>';
        }
       
      
       $img = null;
        foreach ($images as $image )
        {
 
             $img .='<li>
                         <a href="'.asset('storage/products/images/'.$image->image).'" class="lightbox-image" title="Image Caption Here">
                         <img src="'.asset('storage/products/images/'.$image->image).'" alt=""></a>
                         </li>';
         }

        return response()->json(['temp'=>$temp ,'img'=> $img,'color'=>$color->color_name]);
        //return view(['frontend.productmanagment.get-storage'=>$storages,'teams'=>teamInfo,'points'=>pointslist]);
    //return view('frontend.productmanagment.get-storage',compact('storages'));
    
   }

   public function getCondition($id)
   {
     $storage = ProductStorage::find($id);
    //  dd($storage->storage)
     $conditions = ProductCondition::where('storage_id',$storage->id)->get();

     $condit = null;

      foreach($conditions as $condition)
      {
        $condit .=' <div class="select-color">
                    <input type="radio" name="condition" class="hidden" id="'.$condition->condition.'">
                    <label class="color" for="'.$condition->condition.'"  onclick="getPrice('.$condition->price.','.$condition->quantity.')">
                    '.$condition->condition.' <br> $'.$condition->price.'
                    </label>
                    </div>';
      }

      return response()->json(['condit'=>$condit,'storage'=>$storage->storage]);
   }


}
