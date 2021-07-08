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
          @foreach($brands as $brand)
          <div>
            <div class="single-answer-component-wrapper brand">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content" onclick="getModels('{{$brand->id}}')"><label>{{$brand->brand_name}}</label></button>
              </div>
            </div>
          </div>
          @endforeach
        
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
        <form id="repair_form">
            
           </form>
        <div class="select-issue-wrapper" id="showModels">
          
        </div>
      </div>
    </div>
    <!-- Repair Type -->
    <form action="{{url('saverepairType')}}" method="post" id="repairType">
      {{csrf_field()}}
    </form>
    <div class="row d-flex justify-content-center" id="repair_type" style="display: none;">
      <div class="col-md-5 text-center">
        <div class="chance-box-wrapper">
          <div>
            <p class="medium-font">What can we fix for you?</p>
          </div>
        </div>
        <div class="question-comp-wrapper" >
         <div id="RepairTypes"> 

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
                        <input type="radio"  form="repairType" name="date" id="{{date('d') }}" value="{{ date('Y-m-d') }}" class="hidden">
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+1 days')))) }}" tabindex="-1">
                      <div class="">
                        <div class="select-time-weekday"> <?php echo date('D', strtotime(date('Y-m-d', strtotime("+1 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+1 days")))) ?> </div>
                        <input type="radio"  form="repairType" name="date" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+1 days')))) }}" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+1 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+2 days')))) }}" tabindex="-2">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+2 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+2 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+2 days')))) }}" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+2 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+3 days')))) }}" tabindex="-3">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+3 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+3 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+3 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+3 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+4 days')))) }}" tabindex="-4">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+4 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+4 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+4 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+4 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+5 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+5 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+5 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+5 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+5 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+6 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+6 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+6 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+6 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+6 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+7 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+7 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+7 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+7 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+7 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+8 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday"> <?php echo date('D', strtotime(date('Y-m-d', strtotime("+8 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+8 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+8 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+8 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+9 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday"> <?php echo date('D', strtotime(date('Y-m-d', strtotime("+9 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+9 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+9 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+9 days')))) }}" class="hidden">
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="select-time-day-selector-triangle right">
                <img src="{{('frontend-assets/images/repair/arrow-right.png')}}" alt="">
              </div>
            </div>
          
          </div>
          <div class="select-time-time-picker-wrapper">
            <label class="time-content-box time-content-box-active" for="9am-10am">
              <p>9am - 11am</p>
              <input type="radio" form="repairType" name="time" value="9am-10am" id="9am-10am" class="hidden">
            </label>
            <label class="time-content-box " for="10am-11am">
              <p>11am - 1pm</p>
              <input type="radio" form="repairType" name="time" value="10am-11am" id="10am-11am" class="hidden">
            </label>
            <label class="time-content-box " for="11am-12pm">
              <p>1pm - 3pm</p>
              <input type="radio" form="repairType" name="time" value="11am-12pm" id="11am-12pm" class="hidden">
            </label>
            <label class="time-content-box " for="12pm-1pm">
              <p>3pm - 5pm</p>
              <input type="radio" form="repairType" name="time" value="12pm-1pm" id="12pm-1pm" class="hidden">
            </label>
            <label class="time-content-box " for="1pm-2pm">
              <p>5pm - 7pm</p>
              <input type="radio" form="repairType" name="time" value="1pm-2pm" id="1pm-2pm" class="hidden">
            </label>
            <label class="time-content-box " for="2pm-3pm">
              <p>7pm - 9pm</p>
              <input type="radio" form="repairType" name="time" value="2pm-3pm" id="2pm-3pm" class="hidden">
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
                  <input placeholder="Your Name" form="repairType" type="text" name="name" id="name" class="form-control" value="" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Address" form="repairType"  name="address"  type="text" id="address" class="form-control" value="" required>
                </div>
              </div>
            </div>
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Phone Number" form="repairType" type="number" id="phone" class="form-control" name="phone" value="" required>
                </div>
              </div>
            </div>
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Email" name="email" form="repairType" type="email" id="email" class="form-control" value="" required>
                </div>
              </div>
            </div>

            @if(!Auth::guard('web')->check())
             <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Password" name="password" form="repairType" type="password" id="password" class="form-control" value="">
                </div>
              </div>
            </div>
            @endif
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <textarea type="text" form="repairType" class="form-control" placeholder="Add address instructions (optional)" name="instructions" id="instructions"></textarea>
              </div>
            </div>
            <div class="select-address-continue-button-wrapper">
              <button type="submit" form="repairType" class="new-action-button">Continue</button>
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
  // $('.brand').click(function(){
    
  // });

  function getModels(id){
    
      $.ajax({
        url: "{{url('/getModels')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#phone_model').show();
          $('#brand_model').hide();

        },

       });
  

  }

    function getrepairTypes(id){
    
      $.ajax({
        url: "{{url('/getrepairTypes')}}/"+id,
        type:"get",
        success:function(response){
          // console.log(response);
          $('#RepairTypes').html(response);
          $('#repair_type').show();
          $('#phone_model').hide();

        },

       });
  

  }
  

  // $('.model').click(function(){
    
  // });
     function custom_check()
     {

        $('#continue_btn').show();
     }

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