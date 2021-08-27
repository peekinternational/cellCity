<?php

namespace App\Http\Controllers;

use App\Mail\TechMail;
use App\Models\Order;
use App\Models\Pmodel;
use App\Models\ProductColor;
use App\Models\ProductCondition;
use App\Models\ProductStorage;
use App\Models\RepairOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;
use Square\Models\Address;
use Square\Models\Country;
use Square\Models\CreateCustomerCardRequest;
use Square\Models\CreateCustomerRequest;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Twilio\Rest\Client;

class SquareController extends Controller
{

    public function checkoutPayment(Request $request)
    {
    //    dd($request->all());

    // dd($request->input('cko-card-token'));
        $repairOrder = RepairOrder::find($request->id);
        //   dd($repairOrder);

        $customers = User::where('id',$repairOrder->userId)->first();
        //   dd($customers);


        $api_client = new SquareClient([
            'accessToken' => "EAAAEJf3-zpFqQhy1G94pNEY0BjOugP6uJ2Xwf6sIpYDQ4rpvJEHn-4Elwv8ZNFy",
            'environment' => Environment::SANDBOX
          ]);

          $nonce = $request->squaretoken;
            if (is_null($nonce)) {
            echo "Invalid card data";
            http_response_code(422);
            return;
            }

            $customersApi = $api_client->getCustomersApi();

            $body = new CreateCustomerRequest;
            $body->setIdempotencyKey(uniqid());
            $body->setGivenName($customers->name);
            $body->setEmailAddress($customers->email);
            $apiResponse = $customersApi->createCustomer($body);
            if ($apiResponse->isSuccess()) {
                $createCustomerResponse = $apiResponse->getResult();


            //    $customerId = $createCustomerResponse->getCustomer()->getId();
            //     $body_cardNonce =  $request->squaretoken;
            //     $body2 = new CreateCustomerCardRequest(
            //         $body_cardNonce
            //     );

            //     $body2->setBillingAddress(new Address);
            //     $body2->getBillingAddress()->setAddressLine1('500 Electric Ave');
            //     $body2->getBillingAddress()->setAddressLine2('Suite 600');
            //     $body2->getBillingAddress()->setPostalCode('10003');
            //     $body2->getBillingAddress()->setCountry(Country::US);
            //     $body2->setCardholderName('Amelia Earhart');
            //     $body2->setVerificationToken('verification_token0');
            //     // dd($body2);
            //     $apiResponse2 = $customersApi->createCustomerCard($customerId, $body2);
            //     dd($apiResponse2);

            } else {
                $errors = $apiResponse->getErrors();
            }


            $payments_api = $api_client->getPaymentsApi();

            $money = new Money();
            $money->setAmount(3000);
            $money->setCurrency('USD');
            $create_payment_request = new CreatePaymentRequest($nonce, uniqid(), $money);
            try {
            $response = $payments_api->createPayment($create_payment_request);

            $repairOrder = RepairOrder::find($request->id);
            $cust = User::where('id',$repairOrder->userId)->first();
            $user = User::where('id',$repairOrder->techId)->first();
            $user->jobStatus = "available";
            $user->update();
            $repairOrder->pay_status = "paid";
            $repairOrder->pay_method = "Credit Card";
            $repairOrder->order_status= "4";
            $repairOrder->update();

            $totalprice = " Total Amount :". $request->price;
            // return view('frontend.paymentSuccess');
            $details = [
                'title' => 'Mail from PeekInternational.com',
                'subject' => 'Dear Customer ,',
                'message' => "You have Successfully Pay Repair order  through Credit Card",
                'Total'  =>'$'.$request->price
            ];

             \Mail::to($cust->email)->send(new TechMail($details));

             $phone = "+".$cust->phoneno;
            //  dd($phone);
             $message =strip_tags(nl2br(" Dear Customer ,\n You have Successfully Pay  through Credit Card . \n Total Amount : $". $request->price));
             $account_sid = "AC6769d3e36e7a9e9ebbea3839d82a4504";
             $auth_token = "b2229f79769f0b47fa8e7bb685291d0d";

             $twilio_number = +15124027605;
             $client = new Client($account_sid, $auth_token);
             $client->messages->create($phone,
                 ['from' => $twilio_number, 'body' => $message] );

             return response()->json($message);

            if ($response->isError()) {
                echo 'Api response has Errors';
                $errors = $response->getErrors();
                exit();
                return view('frontend.paymentCancel');
            }
            echo '<pre>';
            print_r($response);
            echo '</pre>';
            } catch (ApiException $e) {
            echo 'Caught exception!<br/>';
            exit();
            }

    }


    //Product Square Payment
    public function paymentProduct(Request $request)
    {

        // dd($request->all());
        $userID =Auth::user()->id;
        $customers = User::where('id',$userID)->first();
        $total = \Cart::session($userID)->getTotal();

        $api_client = new SquareClient([
            'accessToken' => "EAAAEJf3-zpFqQhy1G94pNEY0BjOugP6uJ2Xwf6sIpYDQ4rpvJEHn-4Elwv8ZNFy",
            'environment' => Environment::SANDBOX
          ]);

          $nonce = $request->squaretoken;
            if (is_null($nonce)) {
            echo "Invalid card data";
            http_response_code(422);
            return;
            }

            $customersApi = $api_client->getCustomersApi();

            $body = new CreateCustomerRequest;
            $body->setIdempotencyKey(uniqid());
            $body->setGivenName($customers->name);
            $body->setEmailAddress($customers->email);
            $apiResponse = $customersApi->createCustomer($body);
            if ($apiResponse->isSuccess()) {
                $createCustomerResponse = $apiResponse->getResult();


            //    $customerId = $createCustomerResponse->getCustomer()->getId();
            //     $body_cardNonce =  $request->squaretoken;
            //     $body2 = new CreateCustomerCardRequest(
            //         $body_cardNonce
            //     );

            //     $body2->setBillingAddress(new Address);
            //     $body2->getBillingAddress()->setAddressLine1('500 Electric Ave');
            //     $body2->getBillingAddress()->setAddressLine2('Suite 600');
            //     $body2->getBillingAddress()->setPostalCode('10003');
            //     $body2->getBillingAddress()->setCountry(Country::US);
            //     $body2->setCardholderName('Amelia Earhart');
            //     $body2->setVerificationToken('verification_token0');
            //     // dd($body2);
            //     $apiResponse2 = $customersApi->createCustomerCard($customerId, $body2);
            //     dd($apiResponse2);

            } else {
                $errors = $apiResponse->getErrors();
            }


            $payments_api = $api_client->getPaymentsApi();

            $money = new Money();
            $money->setAmount($total);
            $money->setCurrency('USD');
            $create_payment_request = new CreatePaymentRequest($nonce, uniqid(), $money);
            try {
            $response = $payments_api->createPayment($create_payment_request);

            $cartCollection=\Cart::session($userID)->getContent();
        foreach ($cartCollection as $cart) {

            $model = Pmodel::where('id',$cart->associatedModel->model_id)->first();
            $color = ProductColor::where('product_id',$cart->associatedModel->id)->first();
            $storage = ProductStorage::where('color_id',$color->id)->first();
            $total = round($cart->quantity*$cart->price);
            $condition = ProductCondition::where('storage_id',$storage->id)->first();
            if($cart->quantity <= $condition->quantity)
            {
               $condition->increment('quantity',$cart->quantity);
            }
            else
            {
                return redirect()->route('view.cart')->with('status' ,'Enough Quantity of:' . $condition->name);
            }
            // dd($cart->attributes->color);
            $order = new Order();
            $order->user_id = $userID;
            $order->product_id = $cart->associatedModel->id;
            $order->shipAddress_id = $request->address_id;
            $order->brand_name = $model->brand->brand_name;
            $order->model_name  = $model->model_name;
            $order->color       =  $cart->attributes->color;
            $order->condition   = $cart->attributes->conditition;
            $order->storage     = $cart->attributes->storage;
            $order->quantity     = $cart->quantity;
            $order->price     = $cart->price;
            $order->grand_price  =$total;
            $order->payment_method = "Square Card";
            $order->status = 0;

            $order->save();
            // dd($order);



        }
        $total = \Cart::session($userID)->getTotal();
            $details = [
                'title' => 'Mail from PeekInternational.com',
                'subject' => 'Dear Customer ,',
                'message' => 'Payment completed Successfully through PayPal',
                'Total'  => $total
            ];
             $messgae = "Succesfully Transferred";
             \Mail::to(Auth::user()->email)->send(new TechMail($details));
            //  return response()->json($messgae);


            $phone = "+".Auth::user()->phoneno;
            //  dd($phone);
             $message =strip_tags(nl2br("Dear Customer, \n You have Successfully Pay  through PayPal . \n Total Amount : $". $total));

             $account_sid = "AC6769d3e36e7a9e9ebbea3839d82a4504";
             $auth_token = "b2229f79769f0b47fa8e7bb685291d0d";
             $twilio_number = +15124027605;
             $client = new Client($account_sid, $auth_token);
             $client->messages->create($phone,
                 ['from' => $twilio_number, 'body' => $message] );

                 \Cart::clear();
                //  return redirect()->route('view.cart');
             return response()->json($message);

            if ($response->isError()) {
                echo 'Api response has Errors';
                $errors = $response->getErrors();
                exit();
                return view('frontend.paymentCancel');
            }
            echo '<pre>';
            print_r($response);
            echo '</pre>';
            } catch (ApiException $e) {
            echo 'Caught exception!<br/>';
            exit();
            }
    }

}
