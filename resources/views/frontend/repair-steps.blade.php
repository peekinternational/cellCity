@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/repair.css')}}">
@section('styling')
<style>
  .puls-footer{
    display: none;
  }
</style>
@endsection
@section('content')

<div class="app-container2">
  <div class="content-container container">
    <!-- Brands -->
    <div class="row d-flex justify-content-center" id="brand_model">
      <div class="col-md-5 text-center">
        <div class="chance-box-wrapper">
          <div>
            <p class="medium-font">Select your Brand</p>
          </div>
        </div>
        <div class="select-issue-wrapper">
          <div>
            <div class="single-answer-component-wrapper brand">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>Apple</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper brand">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>Samsung</label></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Phone Model -->
    <div class="row d-flex justify-content-center" id="phone_model" style="display: none;">
      <div class="col-md-5 text-center">
        <div class="chance-box-wrapper">
          <div>
            <p class="medium-font">Select your iPhone device model</p>
          </div>
        </div>
        <div class="select-issue-wrapper">
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>XS Max</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>XR</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>XS</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>X</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>8 Plus</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>8</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>7 Plus</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>7</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>6s Plus</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>6s</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>6 Plus</label></button>
              </div>
            </div>
          </div>
          <div>
            <div class="single-answer-component-wrapper">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content"><label>6</label></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Repair Type -->
    <div class="row d-flex justify-content-center" id="repair_type" style="display: none;">
      <div class="col-md-5 text-center">
        <div class="chance-box-wrapper">
          <div>
            <p class="medium-font">What can we fix for you?</p>
          </div>
        </div>
        <div class="question-comp-wrapper">
          <div>
            <div class="fade-on-mount normal-elemnt-active">
              <button class="multiple-answer-component-wrapper">
                <label class="custom_check">
                  <div class="selection-inidicator">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </div>
                  <div class="answer-content">LCD install<span class="price">+($349.99)</span></div>
                </label>
              </button>
            </div>
          </div>
          <div>
            <div class="fade-on-mount normal-elemnt-active">
              <button class="multiple-answer-component-wrapper">
                <label class="custom_check">
                  <div class="selection-inidicator">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </div>
                  <div class="answer-content">Battery<span class="price">+($109.99)</span></div>
                </label>
              </button>
            </div>
          </div>
          <div class="question-action-button-wrapper fixed-to-bottom-right" id="continue_btn" style="display: none;">
            <button class="new-action-button new-action-button-blocklevel new-action-button-disable-top-on-valid">Continue</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Time Selection -->
    <div class="row d-flex" id="time_select" style="display: none;">
      <div class="col-md-10 text-left">
        <div class="chance-box-wrapper text-left">
          <div>
            <p class="medium-font">What can we fix for you?</p>
          </div>
        </div>
        <div class="select-time-wrapper" id="no-scorll-bar-time-select">
          <div>
            <div class="select-time-day-selector-container-desktop">
              <button class="select-time-day-selector-triangle left" style="display: none;">
                <img class="triangle-reverse" src="{{('frontend-assets/images/repair/arrow-right.png')}}" alt="">
              </button>
              <div class="select-time-day-selector-box">
                <div class="select-time-day-selector-wrapper">
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item day-active" for="">
                        <div class="select-time-weekday"> Today </div>
                        <input type="radio" name="date" id="today" value="today" class="hidden">
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="24" tabindex="-1">
                      <div class="">
                        <div class="select-time-weekday"> Thu </div>
                        <div class="select-time-day-in-number"> 24 </div>
                        <input type="radio" name="date" id="24" value="24" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="25" tabindex="-1">
                      <div class="">
                        <div class="select-time-weekday"> Fri </div>
                        <div class="select-time-day-in-number"> 25 </div>
                        <input type="radio" name="date" id="25" value="25" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="26" tabindex="-1">
                      <div class="">
                        <div class="select-time-weekday"> Sat </div>
                        <div class="select-time-day-in-number"> 26 </div>
                        <input type="radio" name="date" value="26" id="26" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="27" tabindex="-1">
                      <div class="">
                        <div class="select-time-weekday"> Sun </div>
                        <div class="select-time-day-in-number"> 27 </div>
                        <input type="radio" name="date" value="27" id="27" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="28">
                      <div class="">
                        <div class="select-time-weekday"> Mon </div>
                        <div class="select-time-day-in-number"> 28 </div>
                        <input type="radio" name="date" value="28" id="28" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="29">
                      <div class="">
                        <div class="select-time-weekday"> Tue </div>
                        <div class="select-time-day-in-number"> 29 </div>
                        <input type="radio" name="date" value="29" id="29" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="30">
                      <div class="">
                        <div class="select-time-weekday"> Wed </div>
                        <div class="select-time-day-in-number"> 30 </div>
                        <input type="radio" name="date" value="30" id="30" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="01">
                      <div class="">
                        <div class="select-time-weekday"> Thu </div>
                        <div class="select-time-day-in-number"> 01 </div>
                        <input type="radio" name="date" value="01" id="01" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="02">
                      <div class="">
                        <div class="select-time-weekday"> Fri </div>
                        <div class="select-time-day-in-number"> 02 </div>
                        <input type="radio" name="date" value="02" id="02" class="hidden">
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="select-time-day-selector-triangle right">
                <img src="{{('frontend-assets/images/repair/arrow-right.png')}}" alt="">
              </div>
            </div>
            <div class="select-time-day-selector-container-mobile">
              <div class="select-time-day-selector-content-mobile" id="no-scorll-bar-time">
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item" for="today_m">
                      <div class="select-time-weekday"> Today </div>
                      <input type="radio" name="date" id="today_m" value="today" class="hidden">
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="24_m" tabindex="-1">
                    <div class="">
                      <div class="select-time-weekday"> Thu </div>
                      <div class="select-time-day-in-number"> 24 </div>
                      <input type="radio" name="date" id="24_m" value="24" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="25_m" tabindex="-1">
                    <div class="">
                      <div class="select-time-weekday"> Fri </div>
                      <div class="select-time-day-in-number"> 25 </div>
                      <input type="radio" name="date" id="25_m" value="25" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="26_m" tabindex="-1">
                    <div class="">
                      <div class="select-time-weekday"> Sat </div>
                      <div class="select-time-day-in-number"> 26 </div>
                      <input type="radio" name="date" value="26" id="26_m" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="27_m" tabindex="-1">
                    <div class="">
                      <div class="select-time-weekday"> Sun </div>
                      <div class="select-time-day-in-number"> 27 </div>
                      <input type="radio" name="date" value="27" id="27_m" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="28_m">
                    <div class="">
                      <div class="select-time-weekday"> Mon </div>
                      <div class="select-time-day-in-number"> 28 </div>
                      <input type="radio" name="date" value="28" id="28_m" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="29_m">
                    <div class="">
                      <div class="select-time-weekday"> Tue </div>
                      <div class="select-time-day-in-number"> 29 </div>
                      <input type="radio" name="date" value="29" id="29_m" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="30_m">
                    <div class="">
                      <div class="select-time-weekday"> Wed </div>
                      <div class="select-time-day-in-number"> 30 </div>
                      <input type="radio" name="date" value="30" id="30_m" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="01_m">
                    <div class="">
                      <div class="select-time-weekday"> Thu </div>
                      <div class="select-time-day-in-number"> 01 </div>
                      <input type="radio" name="date" value="01" id="01_m" class="hidden">
                    </div>
                  </label>
                </div>
                <div class="select-time-day-item-wrapper">
                  <label class="select-time-day-item " for="02_m">
                    <div class="">
                      <div class="select-time-weekday"> Fri </div>
                      <div class="select-time-day-in-number"> 02 </div>
                      <input type="radio" name="date" value="02" id="02_m" class="hidden">
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="select-time-time-picker-wrapper">
            <label class="time-content-box time-content-box-active" for="9am-10am">
              <p>9am - 11am</p>
              <input type="radio" name="time" value="9am-10am" id="9am-10am" class="hidden">
            </label>
            <label class="time-content-box " for="10am-11am">
              <p>11am - 1pm</p>
              <input type="radio" name="time" value="10am-11am" id="10am-11am" class="hidden">
            </label>
            <label class="time-content-box " for="11am-12pm">
              <p>1pm - 3pm</p>
              <input type="radio" name="time" value="11am-12pm" id="11am-12pm" class="hidden">
            </label>
            <label class="time-content-box " for="12pm-1pm">
              <p>3pm - 5pm</p>
              <input type="radio" name="time" value="12pm-1pm" id="12pm-1pm" class="hidden">
            </label>
            <label class="time-content-box " for="1pm-2pm">
              <p>5pm - 7pm</p>
              <input type="radio" name="time" value="1pm-2pm" id="1pm-2pm" class="hidden">
            </label>
            <label class="time-content-box " for="2pm-3pm">
              <p>7pm - 9pm</p>
              <input type="radio" name="time" value="2pm-3pm" id="2pm-3pm" class="hidden">
            </label>
          </div>
          <div id="time-height-spacer"></div>
          <div class="select-time-button-wrapper fixed-to-bottom-right" id="time_continue">
            <button class="new-action-button">Continue</button>
          </div>
        </div>
      </div>
    </div>
    <!-- User Info -->
    <div class="row d-flex justify-content-center" id="user_info" style="display: none;">
      <div class="col-md-5 text-center">
        <div class="chance-box-wrapper">
          <div>
            <p class="medium-font">Where shall we send your technician?</p>
          </div>
        </div>
        <div class="select-address-wrapper">
          <div class="select-address-content-wrapper">
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Your Name" type="text" id="name" class="form-control" value="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Address" types="address" type="text" id="address" class="form-control" value="">
                </div>
              </div>
            </div>
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Phone Number" type="number" id="phone" class="form-control" value="">
                </div>
              </div>
            </div>
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Email" type="email" id="email" class="form-control" value="">
                </div>
              </div>
            </div>
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <textarea type="text" class="form-control" placeholder="Add address instructions (optional)" id="instructions"></textarea>
              </div>
            </div>
            <div class="select-address-continue-button-wrapper">
              <button class="new-action-button">Continue</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="my-cart-desktop">
      <!-- <div class="my-cart-wrapper-not-fixed "></div> -->
      <div class="my-cart-wrapper ">
        <div class="my-cart-content-wrapper">
          <div class="my-cart-device-section-wrapper">
            <div class="my-cart-device-section-header">
              <div class="my-cart-device-section-header-image-title">
                <div><span>iPhone Repair</span></div>
              </div>
            </div>
            <div class="services-aggregation-details-wrapper">
              <h3><b>XR</b></h3>
              <div class="services-aggregation-details">
                <div class="aggregate-service">
                  <span class="service-name">LCD install </span>
                  <span class="service-price"><b>$279</b></span>
                </div>
              </div>
            </div>
            <div class="subtotal-container">
              <span>Estimated</span>
              <span class="my-cart-small-text-bold"> $279</span>
            </div>
            <div class="disclaimer-container"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script>
  $('.brand').click(function(){
    $('#phone_model').show();
    $('#brand_model').hide();
  });
  $('.model').click(function(){
    $('#repair_type').show();
    $('#phone_model').hide();
  });
  $('.custom_check').click(function(){
    $('#continue_btn').show();
  });
  $('#continue_btn').click(function(){
    $('#time_select').show();
    $('#repair_type').hide();

  });
  $('.left').click(function(){
    $('.select-time-day-selector-wrapper').removeClass('select-time-day-selector-wrapper-left');
    $('.right').show();
    $('.left').hide();
  });
  $('.right').click(function(){
    $('.select-time-day-selector-wrapper').addClass('select-time-day-selector-wrapper-left');
    $('.left').show();
    $('.right').hide();
  });
  $('.select-time-day-item').click(function(){
    $('.select-time-day-item').removeClass('day-active');
    $(this).addClass('day-active');
  });
  $('.time-content-box').click(function(){
    $('.time-content-box').removeClass('time-content-box-active');
    $(this).addClass('time-content-box-active');
  });
  $('#time_continue').click(function(){
    $('#time_select').hide();
    $('#user_info').show();
  });
</script>
    
@endsection