<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\Admin\ZipController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminRepairController;
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
});



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


    Route::get('/logout',function(){
            Auth::guard('web')->logout();
            return redirect()->action([
                UserController::class,
                'accountLogin'
            ]);
        })->name('logout');

    });

   //verify email
   Route::get('/userVerify/{token}', [UserController::class,'verifyUserByEmail'])->name('user.verify');
Route::post('/checkZipcode', [RepairController::class, 'checkZip']);


Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});
Route::get('/buy-phone', function () {
    return view('frontend.buy-phone');
});
Route::get('/buy-accessories', function () {
    return view('frontend.buy-accessories');
});
Route::get('/repair', function () {
    return view('frontend.repair');
});

Route::get('/repair-step/{id}', [RepairController::class, 'getBrands']);
Route::get('/getModels/{id}', [RepairController::class, 'getModels']);
Route::get('/getrepairTypes/{id}', [RepairController::class, 'getrepairTypes']);
Route::post('/saverepairType', [RepairController::class, 'saverepairType']);

Route::get('/repairorder-completed', function () {
    return view('frontend.order-completed');
});

Route::get('/single', function () {
    return view('frontend.single');
});
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

