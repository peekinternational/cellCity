<?php
namespace App\Classes;
use DB;
use Session;

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
use App\Models\Blog;
use App\Models\OrderTime;
use App\Models\ProductCondition;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class CityClass {

	function brands(){
	 return Brand::orderBy('brand_name','asc')->get();
	}

	function brandName($id){
	 return Brand::whereId($id)->first()->brand_name;
	}

	function allModels(){
	return Pmodel::orderBy('model_name','asc')->paginate(6);
	}

	function modelName($id){
	 return Pmodel::whereId($id)->first()->model_name;
	}

	function allTech(){

		return User::whereRole('tech')->where('jobStatus','available')->get();
	}
    function ZipCode()
    {
      return ZipCode::orderBy('id','desc')->get();
    }
    function allUser()
    {
      return User::whereRole('user')->get();
    }

    function allBlog()
    {
        return Blog::orderBy('id','desc')->get();
    }
	function orderTimes()
    {
        return OrderTime::orderBy('id','asc')->get();
    }
    function shippingAddress()
    {
        return ShippingAddr::where('userId',Auth::user()->id)->get();
    }

    function checkWishlist($id)
    {

        $check=Wishlist::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
        if($check)
        {
            return "1";
        }
        else
        {
            return "0";
        }

    }

}

?>
