<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\Admin\ZipController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogContoller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminRepairController;
use App\Http\Controllers\ProductConditionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingAddress;
use App\Http\Controllers\SquareController;
use App\Http\Controllers\WishlistController;
use App\Models\RepairOrder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//////////////////////////// ADMIN //////////////////////////////////////////

Route::name('admin.')->namespace('Admin')->prefix('admin')->group(function(){

    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
    Route::match(['get','post'],'/login', [AdminController::class, 'adminLogin'])->name('login');

  });

  Route::namespace('Auth')->middleware('auth:admin')->group(function(){

       Route::get('/', function(){
            return view('admin.index');
        });


       /////////////////////////////// CUSTOMER ////////////////////////////

     Route::get('/customers', [AdminController::class, 'showCustomers']);
     Route::match(['get','post'],'/addCustomer', [AdminController::class, 'addCustomer'])->name('create');
     Route::get('/editCustomer/{id}', [AdminController::class, 'editCustomer']);
     Route::get('/deleteCustomer/{id}', [AdminController::class, 'deleteCustomer']);


      //////////////////////////// TECHNICIANS ////////////////////////////

     Route::get('/technicians', [AdminController::class, 'showTechnicians']);
     Route::match(['get','post'],'/addTechnician', [AdminController::class, 'addTechnician'])->name('techcreate');
     Route::get('/editTechnician/{id}', [AdminController::class, 'editTechnician']);
     Route::get('/deleteTechnician/{id}', [AdminController::class, 'deleteTechnician']);


     Route::get('rejectOrder/{id}', [AdminController::class, 'rejectOrder'] );

    //////////////////////////////// ZIP CODE //////////////////////////////////

     Route::resource('/zipCode', '\App\Http\Controllers\Admin\ZipController');
     Route::resource('/brands', '\App\Http\Controllers\Admin\BrandController');
     Route::resource('/models', '\App\Http\Controllers\Admin\ModelController');
     Route::resource('/repairTypes', '\App\Http\Controllers\Admin\AdminRepairController');
     Route::get('/repairOrders',  [AdminRepairController::class, 'repairOrders']);
     Route::post('/assignTech',  [AdminRepairController::class, 'assignTech']);
     Route::get('/completed-orders',[AdminRepairController::class,'orderCompleted']);


      //blog management
      Route::resource('/blog', '\App\Http\Controllers\Admin\BlogContoller');
      //Product Management
      Route::resource('/product', '\App\Http\Controllers\Admin\ProductController');
      //ajax
      Route::get('/product/getModels/{id}',[ProductController::class,'getModels']);
      Route::post('/store-product',[productController::class,'storeProduct'])->name('storeproduct');
    //store more color ,condition ,storage using only product id
      Route::post('/store-more-product',[productController::class,'storeMoreProduct'])->name('store.moreproduct');

    ////  View of Product Condition
    Route::get('/product-condition/{id}',[ProductConditionController::class,'index']);
    Route::post('/product-storeCondition',[ProductConditionController::class, 'storeCondition']);
    Route::get('/productCondtion-delete/{id}/{id2}',[ProductConditionController::class, 'deleteCondition']);

   ////  View of Product storage
    Route::get('/product-storage/{id}',[ProductConditionController::class,'storage']);
    Route::post('/productStorage-store',[ProductConditionController::class, 'storeStorage']);
    Route::get('/productStorage-delete/{id}',[ProductConditionController::class, 'deleteStorage']);
   ////  View of Product image
    Route::get('/product-image/{id}',[ProductConditionController::class,'image']);
   ////  View of Product color
    Route::get('/product-color/{id}',[ProductConditionController::class,'color']);
    Route::post('/productColor-store',[ProductConditionController::class, 'storeColor']);
    Route::get('/productColor-delete/{id}',[ProductConditionController::class, 'deleteColor']);




     //Check The update
     Route::get('/checkUpdateOrders',[AdminRepairController::class,'checkUpdateOrders']);
     Route::get('/checkRepairTypes/{id}',[AdminRepairController::class,'checkRepairTypes']);
     Route::get('/accept-orderUpdate/{id}',[AdminRepairController::class,'acceptOrderUpdate']);
     Route::get('/delete-orderUpdate/{id}',[AdminRepairController::class,'deleteOrderUpdate']);

     Route::post('/logout',function(){
            Auth::guard('admin')->logout();
            return redirect()->action([
                AdminController::class,
                'adminLogin'
            ]);
        })->name('logout');

      /// Admin Create Repair Order
        Route::get('repair-steps',[AdminRepairController::class,'repairStep'])->name('repair.steps');

        //Ajax call Repair Order
        Route::get('/getModels/{id}',[AdminRepairController::class,'getModels']);
        // Dynamically get repair types check boxes using Model id
        Route::get('/getRepair/{id}',[AdminRepairController::class,'getRepair']);
        /// create repair order by admin
        Route::post('/repairModel-store', [AdminRepairController::class,'repairModelStore']);

        //modify repair order
        Route::get('/modify-order/{id}',[AdminRepairController::class,'modifyOrder'])->name('modify.order');
        //Repair Order Update Route
        Route::post('/repairModel-update/{id}',[AdminRepairController::class,'modifyOrderUpdate']);


    });

});


///////////////////////////////// TECHNICIANS  //////////////////////////////////////

Route::name('tech.')->namespace('Tech')->prefix('tech')->group(function(){

    Route::namespace('Auth')->middleware('guest:tech')->group(function(){

    Route::match(['get','post'],'/login', [TechController::class, 'techLogin']);


});

     Route::namespace('Auth')->middleware('auth:tech')->group(function(){

       Route::get('/', function(){
            return view('frontend.technician.index');
        });

        Route::get('/orders', function(){
            return view('frontend.technician.orders');
        });
        Route::get('/paymeny-order',function()
        {
          return view('frontend.technician.paymentOrders');
        })->name('payment.orders');

        Route::get('/logout',function(){
            Auth::guard('tech')->logout();
            return redirect()->action([
                TechController::class,
                'techLogin'
            ]);
        })->name('logout');

    });

    //Ajax call order view
    Route::get('orderView/{id}',[TechController::class, 'orderView']);
    Route::get('acceptOrder/{id}',[TechController::class, 'acceptOrder']);
    Route::get('penddingOrder/{id}',[TechController::class, 'penddingOrder']);
    Route::get('rejectOrder/{id}',[TechController::class, 'rejectOrder']);

    //Order Modification
    Route::get('order-modify/{id}',[TechController::class,'orderModify']);
    Route::post('/repairOrder-update/{id}',[TechController::class,'repairOrderUpdate']);

    Route::get('/getModels/{id}', [TechController::class, 'getModels']);
 Route::get('/getrepairTypes/{id}', [TechController::class, 'getrepairTypes']);

    //Message sms with twelio
    Route::get('/message/{id}',[TechController::class,'message']);
  });

  //paypal
  Route::get('customer/completeOrder/{id}',[UserController::class,'completeOrder'])->name('complete.order');
  Route::post('customer/payment/{id}',[UserController::class,'payment'])->name('payment.order');
  Route::post('paypal-success',[UserController::class,"success"])->name('paypal.success');
  Route::get('paypal-cancel',[UserController::class,'cancel'])->name('paypal.cancel');

  //checkout

  Route::post('checkout/{id}',[CheckoutController::class,'checkoutPayment'])->name('checkout.payment');
  Route::post('square',[SquareController::class,'checkoutPayment'])->name('square.payment');



/////////////////////////////////// CUSTOMER ////////////////////////////////

Route::namespace('Auth')->middleware('guest:web')->group(function(){

    Route::match(['get','post'],'/signin', [UserController::class, 'accountLogin'])->name('signin');
    Route::match(['get','post'],'/signup', [UserController::class, 'store']);
});

Route::namespace('Auth')->middleware('auth:web')->group(function(){

    Route::get('/profile', function () {
    return view('frontend.profile');

    });
    Route::resource('/shipAddress', '\App\Http\Controllers\ShippingAddress');
    //user profile update route
    Route::put('update/{id}',[UserController::class,'update'])->name('update.profile');

    //Complete order By Customer side

    // Route::get('customer/completeOrder/{id}',[UserController::class,'completeOrder'])->name('complete.order');
    // Route::post('customer/payment/{id}',[UserController::class,'payment'])->name('payment.order');
    //View the Order Details
    Route::get('customer/orderRepairView/{id}',[UserController::class,'viewOrderRepair'])->name('view.order');


    Route::get('/logout',function(){
            Auth::guard('web')->logout();
            return redirect()->action([
                UserController::class,
                'accountLogin'
            ]);
        })->name('logout');

        // //paypal
        // Route::get('paypal-success',[UserController::class,"success"])->name('paypal.success');
        //  Route::get('paypal-cancel',[UserController::class,'cancel'])->name('paypal.cancel');





});


  /////////////////    Ajax Filter  Buy Page

    Route::get('/getBrandFilter',[ProductController::class,'getBrandFilter']);
    ///Ajax Jquery Product Single Page
    Route::get('/getStorage/{id}',[ProductController::class,'getStorage']);
    Route::get('/getCondition/{id}',[ProductController::class,'getCondition'])->name('get.condition');



  // Add To Cart
   Route::post('add-cart',[ProductController::class, 'addToCart'])->name('add.cart');
   Route::get('/view-cart',[ProductController::class, 'viewToCart'])->name('view.cart');
   Route::post('/cartUpdate', [ProductController::class, 'cartUpdate'])->name('cart.update');
   Route::post('/remove', [ProductController::class, 'remove'])->name('cart.remove');

   //// Select Address
     Route::post('/shippadd.create',[ShippingAddress::class,'createAddress'])->name('create.shipAddress');
    Route::get('/getAddress/{id}',[ShippingAddress::class,'shipAddress']);
    Route::post('/checkAddress',[ShippingAddress::class,'checkAddress'])->name('check.Address');

    //Payment
    Route::post('/product-payment',[ProductController::class,'payment'])->name('product.payment');
    Route::get('/paypal-success-product',[ProductController::class,"success"])->name('paypal.successProduct');
    Route::get('/paypal-cancel-product',[ProductController::class,'cancel'])->name('paypal.cancelProduct');
    //wishlist Ajax
    Route::get('/add-wishlist/{id}',[WishlistController::class,'wishlist'])->name('create.wishlist');
    Route::get('/undo-wishlist/{id}',[WishlistController::class,'undoWishlist']);
    /// wishlist user side
    Route::get('/delete-wishlist/{id}',[WishlistController::class,'delete'])->name('wishlist.delete');

   //verify email
   Route::get('/userVerify/{token}', [UserController::class,'verifyUserByEmail'])->name('user.verify');
   Route::post('/checkZipcode', [RepairController::class, 'checkZip']);


    Route::get('/', function () {
        return view('frontend.index');
    });
    Route::get('/contact-us', function () {
        return view('frontend.contact-us');
    });
    Route::get('/buy-phone', [ProductController::class,'getPhones']);

    Route::get('/buy-accessories', function () {
        return view('frontend.buy-accessories');
    });
    Route::get('/repair', function () {
        return view('frontend.repair');
    })->name('repair.index');

    Route::get('/blog', function () {
        return view('frontend.blog');
    })->name('blog.index');

    Route::get('/repair-step/{id}', [RepairController::class, 'getBrands']);
    Route::get('/getModels/{id}', [RepairController::class, 'getModels']);
    Route::get('/getrepairTypes/{id}', [RepairController::class, 'getrepairTypes']);
    Route::post('/saverepairType', [RepairController::class, 'saverepairType']);

    Route::post('/checkDate',[RepairController::class,'checkDate'])->name('check.date');

    Route::get('/repairorder-completed', function () {
        return view('frontend.order-completed');
    });

    Route::get('/payment-completed', function () {
        return view('frontend.paymentSuccess');
    })->name('payment.completed');


    Route::get('/product-single/{id}',[ProductController::class,'productDetail'])->name('product.details');

    // Route::get('/single', function () {
    //     return view('frontend.single');
    // });
    Route::get('/pay-bills', function () {
        return view('frontend.pay-bills');
    });

    // Route::get('/signup', function () {
    //     return view('frontend.signup');
    // });
    // Route::get('/signin', function () {
    //     return view('frontend.signin');
    // });


    Route::group(['prefix' => 'technician'], function () {

    });

    Route::get('/checkout',function()
    {
    return view('frontend.checkout');
    });




