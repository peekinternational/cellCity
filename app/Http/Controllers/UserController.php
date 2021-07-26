<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tech;
use App\Models\User;
use App\Mail\VerifyMail;
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
use App\Models\VerifyUser;
use App\Models\ShippingAddr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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



  public function accountLogin(Request $request)
    {
        if($request->isMethod('post')){


        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'user','verified'=>1]))
        {

        if(Auth::guard('web')->check()){
            // dd(Auth::guard('web')->user()->shippingaddress);
           // $user= User::find(Auth::guard('web')->user()->id);
           //  dd($user->shippingaddress->name);
            return redirect(RouteServiceProvider::HOME);


                        }
            }
            else
            {
                return back()->with('message','MisMatch the email and password');
            }
        }


     return view('frontend.signin')->with('message','Please check email verification');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->isMethod('post')){
            // dd($request->all());
                $this->validate($request,[
                'name' => 'required|min:5|max:50',
                'phoneno' => 'min:2|max:17',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|max:50'

              ],[

                'name.required' =>'Enter Name',
                'email.unique' => 'Email must be unique',
                'email.required' => 'Enter Email',
                'phoneno.required' => 'Enter Mobile Number',
                'password.required' => 'Enter password',
              ]);

                $user = new User;
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'user';
                $user->password = Hash::make($request->password);
                $user->save();

                $verifyUser = VerifyUser::create([
                    'userId' => $user->id,
                    'token' => sha1(time())
                  ]);
                  \Mail::to($user->email)->send(new VerifyMail($user));
                  return back()->with('message','Please check your email for verification');
                //   return $user;


        }

        return view('frontend.signup');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $updated_at = Carbon::now();
        $request->merge(['updated_at'=>$updated_at]);

        $user = User::find($id);
        $user->update($request->only($user->getFillable()));
        return back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyUserByEmail($token)
    {
        // dd($token);
    $verifyUser = VerifyUser::where('token', $token)->first();
    if(isset($verifyUser) ){

        $user = User::where('id',$verifyUser->userId)->first();
        // $user = $verifyUser->user;
        // dd($user->verified);
        if(!$user->verified) {
            // dd($user->verified);
        $user->verified = 1;
        $user->update();
        $status = "Your e-mail is verified. You can now login.";
        } else {
        $status = "Your e-mail is already verified. You can now login.";
        }
    } else {
        return redirect()->route('signin')->with('warning', "Sorry your email cannot be identified.");
    }
    return redirect()->route('signin')->with('status', $status);
    }

     public function viewOrderRepair($id)
     {
        $order= RepairOrder::find($id);
        return view('frontend.orderViewModel',compact('order'));
     }

    public function completeOrder($id)
    {
       $repairOrder = RepairOrder::find($id);
    //    dd($repairOrder);
    $repairOrderType = RepairOrderType::where('order_Id',$repairOrder->id)->get();
    // dd($repairOrderType);
       $customer = User::where('id',$repairOrder->userId)->first();

       return view('frontend.payment',compact('repairOrder','customer','repairOrderType'));

    }

    public function payment(Request $request, $id)
    {
        // dd($request);


       $repairOrder = RepairOrder::find($id);
    //    dd($repairOrder);

    if($request->cash == "cash")
    {
       $repairOrder->pay_status = "paid";
       $repairOrder->pay_method = "cash";
       $repairOrder->order_status= "4";
       $repairOrder->update();
    }
    elseif($request->paypal == "paypal")
    {
        //   dd('asdasd');
          $sume = $request->total;

          $desc = $repairOrder->id;
          $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AXmw8ONlBiU9H3ISoZY7KJgQszN9Mtto7MXfq4Y9PQOeawovyhUSS19Ob8LYlU-xYQo_ERLBOJckp8sq',
                'EPdWVscuS7k-u-45AKc5khipCBlMYqUBfUmbrE3aUV0FJlF8hFcGKn_5p7T9VA2R5HdsR_JmTj1EiUDr'
            )
        );

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        // dd($payer);
        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success'))
            ->setCancelUrl(route('paypal.cancel'));
        // dd($redirectUrls);
        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($sume);


        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription($desc);
        //   dd($transaction);
        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        // dd($payment);
        // Create payment with valid API context
        try {

            $payment->create($apiContext);
            // dd($payment);
            // Get PayPal redirect URL and redirect the customer
            // $approvalUrl =
            return redirect($payment->getApprovalLink());
            // dd($approvalUrl);
            // Redirect the customer to $approvalUrl
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }




    }

  public function success(Request $request)
  {
      $apiContext = new ApiContext(
          new OAuthTokenCredential(
            'AXmw8ONlBiU9H3ISoZY7KJgQszN9Mtto7MXfq4Y9PQOeawovyhUSS19Ob8LYlU-xYQo_ERLBOJckp8sq',
            'EPdWVscuS7k-u-45AKc5khipCBlMYqUBfUmbrE3aUV0FJlF8hFcGKn_5p7T9VA2R5HdsR_JmTj1EiUDr'
          )
      );

      // Get payment object by passing paymentId
      $paymentId = $_GET['paymentId'];
      $payment = Payment::get($paymentId, $apiContext);
      $payerId = $_GET['PayerID'];

      // Execute payment with payer ID
      $execution = new PaymentExecution();
      $execution->setPayerId($payerId);

      try {
          // Execute payment
          $result = $payment->execute($execution, $apiContext);
          // dd($result);
          $str = $result->transactions[0]->description;
          $id = $str;
        // $total_amount =$result->transactions[0]->amount->total;

          $repairOrder = RepairOrder::find($id);
          $repairOrder->pay_status = "paid";
          $repairOrder->pay_method = "paypal";
          $repairOrder->order_status= "4";
          $repairOrder->update();


     //$subject = "Booking Confirmation";
      //dd($message);

    //   $retval = mail ($user->email,$subject,$message);



        return view('frontend.paymentSuccess');

      } catch (PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
      } catch (Exception $ex) {
          die($ex);
      }
  }

    public function cancel()
  {
          dd('payment cancel');
  }

}
