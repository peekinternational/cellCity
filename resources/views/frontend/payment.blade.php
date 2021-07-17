@extends('frontend.layouts.master')

<style>
  .checkout-area h3.shoping-checkboxt-title {
    border-bottom: 1px solid #e7e4dd;
    font-size: 24px;
    font-weight: 500;
    margin: 0 0 20px;
    padding-bottom: 10px;
    text-transform: none;
    width: 100%;
  }
  .single-form-row > input, .single-form-row textarea {
    border: 1px solid #e5e5e5;
    height: 42px;
    padding: 0 0 0 10px;
    width: 100%;
  }
  .checkout-review-order {
    background: #f6f6f6 none repeat scroll 0 0;
    padding: 50px;
  }
  table.checkout-review-order-table {
    width: 100%;
  }
  .checkout-review-order-table thead th, .checkout-review-order-table tbody td, .checkout-review-order-table tfoot tr th, .checkout-review-order-table tfoot tr td {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border-bottom: 1px solid #dcd8ce;
    border-right: medium none;
    border-top: medium none;
    font-size: 14px;
    padding: 15px 0;
    text-align: left;
  }
  .buy-checkbox-btn {
    margin-top: 20px;
  }
  .buy-checkbox-btn input {
    display: none;
  }
  .buy-checkbox-btn .cbx {
    margin: auto;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: pointer;
  }
  .buy-checkbox-btn .inp-cbx:checked + .cbx span:first-child {
    background: #00bfa5;
    border-color: #00bfa5;
    animation: wave 0.4s ease;
  }
  .buy-checkbox-btn .inp-cbx:checked + .cbx span:first-child:before {
      transform: scale(3.5);
      opacity: 0;
      transition: all 0.6s ease;
  }
  .buy-checkbox-btn .cbx span:first-child:before {
      content: "";
      width: 100%;
      height: 100%;
      background: #00bfa5;
      display: block;
      transform: scale(0);
      opacity: 1;
      border-radius: 50%;
      transition: 0.5s;
  }
  .buy-checkbox-btn .cbx span:first-child {
    position: relative;
    width: 18px;
    height: 18px;
    border-radius: 3px;
    transform: scale(1);
    vertical-align: middle;
    border: 1px solid #ebebeb;
    transition: all 0.2s ease;
    transition: 0.5s;
  }
  .buy-checkbox-btn .cbx span {
    display: inline-block;
    vertical-align: middle;
    transform: translateZ(0);
  }
  .buy-checkbox-btn .cbx span:first-child svg {
      position: absolute;
      top: 3px;
      left: 2px;
      fill: none;
      stroke: #fff;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
      stroke-dasharray: 16px;
      stroke-dashoffset: 16px;
      transition: all 0.3s ease;
      transition-delay: 0.1s;
      transform: translateZ(0);
      transition: 0.5s;
  }
  .buy-checkbox-btn .inp-cbx:checked + .cbx span:first-child svg {
      stroke-dashoffset: 0;
  }
  .payment-methd{
    border: 1px solid #00bfa5;
    padding: 10px 20px;
    border-radius: 8px;
    margin-right: 15px;
  }
  .btn-checkout{
    background-color: #00bfa5;
    color: #fff;
    border-radius: 15px;
    padding: 10px 40px;
  }
  @media(max-width: 767px){
    .checkout-review-order {
      padding: 10px;
      margin-top: 20px;
    }
    .payment-methd {
      border: 1px solid #00bfa5;
      padding: 10px 10px;
      border-radius: 8px;
      margin-right: 15px;
    }
    .checkout-area h3.shoping-checkboxt-title{
      padding-left: 10px;
    }
  }
</style>
@section('content')
<section class="shop-section shop-page">
  <div class="container">

    <!-- checkout-area start -->
    <div class="checkout-area">
      <div class="row">
        <div class="col-lg-12 mb-30">
          <div class="row">
            <div class="col-lg-6 col-xl-6 col-sm-12">
              <form action="" id="payment-form" method="post">

                <div class="row ml-1 shipping_address_slot">
                  <h3 class="shoping-checkboxt-title">Billing Information</h3>
                  <div class="col-lg-6">
                    <p class="single-form-row">
                      <label>First name <span class="required">*</span></label>
                      <input type="text" class="form-control" name="first_name" value="John" required="">
                    </p>
                  </div>
                  <div class="col-lg-6">
                    <p class="single-form-row">
                      <label>Last Name <span class="required"></span></label>
                      <input type="text" class="form-control" name="last_name" value="Dadnudas">
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <p class="single-form-row">
                      <label>Email <span class="required">*</span></label>
                      <input type="email" class="form-control" name="email" value="mwaqas.arid@gmail.com" required="">
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <p class="single-form-row">
                      <label>Street address <span class="required">*</span></label>
                      <input type="text" class="form-control" name="shipping_address" id="address" placeholder="House number and street name" value="" required="">
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <p class="single-form-row">
                      <input type="text" class="form-control" name="shipping_address2" placeholder="Apartment, suite, unit etc. (optional)">
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <p class="single-form-row">
                      <label>Town / City <span class="required">*</span></label>
                      <input type="text" class="form-control" name="shipping_city" value="Trenton" placeholder="City" required="">
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <p class="single-form-row">
                      <label>State / County</label>
                      <input type="text" class="form-control" name="shipping_state" placeholder="State" value="New Jersey" required="">
                    </p>
                  </div>
                  <div class="col-lg-12">
                    <p class="single-form-row">
                      <label>Postcode / ZIP <span class="required">*</span></label>
                      <input type="text" class="form-control" name="shipping_zip" placeholder="Zip" value="12207" required="">
                    </p>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="single-form-row buy-checkbox-btn">
                    <input type="checkbox" name="same_billing" class="inp-cbx d-none same_billing" id="cbx2" value="1" checked="">
                    <label class="cbx" for="cbx2">
                      <span>
                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                          <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                      </span>
                      <span>Use same for Billing address </span>
                    </label>
                  </div>
                </div>
                <div class="row ml-1 mt-20 billing_address_slot" style="display:none;">
                  <div class="checkbox-form">
                    <h3 class="shoping-checkboxt-title">Billing Address</h3>
                    <div class="row">

                      <!-- <div class="col-lg-12">
                <div class="single-form-row">
                <label>Country <span class="required">*</span></label>
                <div class="nice-select wide">
                <select>
                <option>Select Country...</option>
                <option>Albania</option>
                <option>Angola</option>
                <option>Argentina</option>
                <option>Austria</option>
                <option>Azerbaijan</option>
                <option>Bangladesh</option>
              </select>
            </div>
          </div>
        </div> -->
                      <div class="col-lg-12">
                        <p class="single-form-row">
                          <label>Street address <span class="required">*</span></label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="House number and street name" value="">
                        </p>
                      </div>
                      <div class="col-lg-12">
                        <p class="single-form-row">
                          <input type="text"  class="form-control"name="address2" placeholder="Apartment, suite, unit etc. (optional)">
                        </p>
                      </div>
                      <div class="col-lg-12">
                        <p class="single-form-row">
                          <label>Town / City <span class="required">*</span></label>
                          <input type="text" name="city" value="Trenton" placeholder="City">
                        </p>
                      </div>
                      <div class="col-lg-12">
                        <p class="single-form-row">
                          <label>State / County</label>
                          <input type="text" class="form-control" name="state" placeholder="State" value="New Jersey">
                        </p>
                      </div>
                      <div class="col-lg-12">
                        <p class="single-form-row">
                          <label>Postcode / ZIP <span class="required">*</span></label>
                          <input type="text" class="form-control" name="zip" placeholder="Zip" value="12207">
                        </p>
                      </div>
                    </div>



                    <div class="col-lg-12">
                      <p class="single-form-row m-0">
                        <label>Order notes</label>
                        <textarea cols="5" rows="2" class="checkout-mess" name="delivery_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                      </p>
                    </div>

                  </div>
                </div>
                <!-- </form> -->
            </form></div>

            <div class="col-lg-6  col-xl-6 col-sm-12">
              <div class="checkout-review-order">
                <!-- <form action="#"> -->
                <h3 class="shoping-checkboxt-title">Your order</h3>
                <table class="checkout-review-order-table">
                  <thead>
                    <tr>
                      <th class="t-product-name">Product</th>
                      <th class="product-total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($repairOrderType as $ordertype)
                    <tr class="cart_item cart-545678">

                        <td class="t-product-name">{{$ordertype->repair_type}}</td>
                        <td class="t-product-price"><span>${{$ordertype->price}}</span></td>


                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>

                    <!-- <input type="hidden" name="processing" value="9.599">
                    <input type="hidden" name="shipping" value="13.95">
                    <input type="hidden" name="total" value="354.549">
                    <tr class="cart-subtotal">
                      <th>Processing</th>
                      <td><span class="total-amount">$9.60</span></td>
                    </tr>
                    <tr class="shipping">
                      <th>Shipping</th>
                      <td>$13.95</td>
                    </tr> -->
                    <tr class="order-total">
                      <th>Total</th>
                      <td><strong><span class="total-amount">${{$repairOrderType->sum('price')}}</span></strong></td>
                      <input type="hidden" name="total" value="{{$repairOrderType->sum('price')}}">
                    </tr>
                  </tfoot>
                </table>



                <div class="checkout-payment">
                  <!-- <div class="payment_methods">
                    <p><label>PayPal Express Checkout <a href="#"><img src="https://sneakerxwars.com/frontend-assets/img/icon/pp-acceptance-small.png" alt=""></a></label></p>
                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                  </div> -->
                  <div class="row">
                    <div class="col-lg-12 pl-0 pr-0">
                      <p class="text-dark text-uppercase font-weight-bold"><strong>Payment Method</strong></p>
                    </div>
                  </div>
                  <form action="{{route('payment.order',$repairOrder->id)}}" method="post" id="payment-form">
                    {{csrf_field()}}
                  <div class="row">
                    <input type="hidden" name="total" value="{{$repairOrderType->sum('price')}}">
                    <div class="col-lg-12 pl-0 pr-0 pb-3">
                    <div class="form-group">
                      <label for="cash" class="payment-methd">
                        <input type="radio" id="cash" name="cash" value="{{$repairOrderType->sum('price')}}"> Cash
                      </label>
                      <label for="paypal" class="payment-methd">
                        <input type="radio" id="paypal" name="paypal" value="" onchange="valueChanged()"> Paypal
                      </label>
                      <label for="apple-pay" class="payment-methd">
                        <input type="radio" id="apple-pay" name="payment" value="" onchange="valueChanged()"> Apple Pay
                      </label>
                      <label for="credit-card" class="payment-methd">
                        <input type="radio" id="credit-card" name="payment" value="" onchange="valueChanged()"> Credit Card
                      </label>
                    </div>

                  </div>
                  </div>
                  {{-- <button class="btn btn-checkout" id="card-button" type="submit">Checkout</button> --}}
                  <button type="submit" class="btn btn-primary btn-style-one">Save</button>
                </form>
                </div>


              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- checkout-area end -->
  </div>
</section>
@endsection
@section('script')

