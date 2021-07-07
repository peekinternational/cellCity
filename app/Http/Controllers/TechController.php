<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tech;
use Hash;

class TechController extends Controller
{

      public function techLogin(Request $request)
    {
        if($request->isMethod('post')){
           if(Auth::guard('tech')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'tech'])){
        //Authentication passed...
        if(Auth::guard('tech')->check()){
            // dd(Auth::guard('tech')->user()->name );
            return redirect(RouteServiceProvider::TECH);

                }
            }
        }
        // dd(Auth::guard('tech')->check());
         // dd(Auth::guard('tech'));

     return view('frontend.technician.login-page');
    }

    public function  showTechnicians(){
    	
    }
}
