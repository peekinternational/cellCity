@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/repair.css')}}">
@section('styling')
<style>
  .puls-footer{
    display: none;
  }
    /* Style the active class, and buttons on mouse-over */
    .active, .btn:hover {
      background-color:#00bfa5;

    }
    .chance-box-wrapper .medium-font.selectPhone
{
    margin-left: 44px !important;
}
/* select phone css end */
    @media(max-width:767px){
      .my-cart-wrapper {
        position: relative;
        top: auto;
        bottom: 0;
        right: 0;
        height: auto;
        margin: 0 auto;
      }
      .content-container {
        order:0;
      }
      .cart-repair{
        order: 1;
      }
    }
   
    </style>
@endsection
@section('content')

<div class="app-container2">
  <div class="content-container container ">
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
                <button class="answer-content" onclick="getModels('{{$brand->id}}','{{$brand->brand_name}}')"><label>{{$brand->brand_name}}</label></button>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
    <!-- Phone Model -->

    <div class="row justify-content-center align-items-center" id="phone_model" style="display: none;">
    <div class="chance-box-wrapper">
       
          <div class="d-flex">
          <a href=""><i class="fa fa-arrow-left" style="margin: 8px;"></i></a>
            <p class="medium-font selectPhone">Select your Phone device model</p>
          </div>
        </div>

      <div class="col-md-12 text-center">
        
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
    <div class="row justify-content-center" id="repair_type" style="display: none;">
    <div class="chance-box-wrapper">
      
      <div class="d-flex">
      <a onclick="backModel()"><i class="fa fa-arrow-left" style="margin: 8px;"></i></a>
       <p class="medium-font selectPhone">What can we fix for you?</p>
     </div>
    
   </div>
      <div class="col-md-12 text-center">
       
        <div class="question-comp-wrapper" >
         <div id="RepairTypes">

         </div>
          <div class="question-action-button-wrapper fixed-to-bottom-right" id="continue_btn" style="display: none;">
            <button class="new-action-button new-action-button-blocklevel new-action-button-disable-top-on-valid" >Continue</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Time Selection -->
    <div class="row d-flex" id="time_select" style="display: none;">
      <div class="col-md-10 text-left">
        <div class="chance-box-wrapper text-left">
          <div class="d-flex">
            <a onclick="backRepairType()"><i class="fa fa-arrow-left" style="margin: 8px;"></i></a>
            <p class="medium-font selectPhone" >What can we fix for you?</p>
          </div>
         
        </div>
        <div class="select-time-wrapper" id="no-scorll-bar-time-select">
          <div>
            <div class="select-time-day-selector-container-desktop">
              <button class="select-time-day-selector-triangle left" style="display: none;">
                <img class="triangle-reverse" src="{{asset('frontend-assets/images/repair/arrow-right.png')}}" alt="">
              </button>
              <div class="select-time-day-selector-box">
                <div class="select-time-day-selector-wrapper">
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item day-active" for="{{date('d') }}">
                        <div class="select-time-weekday"> Today </div>
                        <input type="radio"  form="repairType" name="date" id="{{date('d') }}" value="{{ date('Y-m-d') }}" class="hidden" onchange="checkDat('{{ date('Y-m-d') }}')" checked>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+1 days')))) }}" tabindex="-1">
                      <div class="">
                        <div class="select-time-weekday"> <?php echo date('D', strtotime(date('Y-m-d', strtotime("+1 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+1 days")))) ?> </div>
                        <input type="radio"  form="repairType" name="date" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+1 days')))) }}" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+1 days')))) }}" class="hidden" onchange="checkDat('{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+1 days')))) }}')">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+2 days')))) }}" tabindex="-2">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+2 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+2 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+2 days')))) }}" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+2 days')))) }}" class="hidden"  onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+2 days')))) }})">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+3 days')))) }}" tabindex="-3">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+3 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+3 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+3 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+3 days')))) }}" class="hidden" onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+3 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+3 days')))) }})">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+4 days')))) }}" tabindex="-4">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+4 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+4 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+4 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+4 days')))) }}" class="hidden" onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+4 days')))) }})">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+5 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+5 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+5 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+5 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+5 days')))) }}" class="hidden" onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+5 days')))) }})">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+6 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+6 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+6 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+6 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+6 days')))) }}" class="hidden" onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+6 days')))) }})">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+7 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday">  <?php echo date('D', strtotime(date('Y-m-d', strtotime("+7 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+7 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+7 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+7 days')))) }}" class="hidden" onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+7 days')))) }})">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+8 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday"> <?php echo date('D', strtotime(date('Y-m-d', strtotime("+8 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+8 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+8 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+8 days')))) }}" class="hidden" onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+8 days')))) }})">
                      </div>
                    </label>
                  </div>
                  <div class="select-time-day-item-wrapper">
                    <label class="select-time-day-item " for="{{ date('d', strtotime(date('Y-m-d', strtotime('+9 days')))) }}">
                      <div class="">
                        <div class="select-time-weekday"> <?php echo date('D', strtotime(date('Y-m-d', strtotime("+9 days")))) ;?> </div>
                        <div class="select-time-day-in-number"> <?php echo date('d', strtotime(date('Y-m-d', strtotime("+9 days")))) ?> </div>
                        <input type="radio" form="repairType" name="date" value="{{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+9 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+9 days')))) }}" class="hidden" onchange="checkDat({{ date('Y-m-d', strtotime(date('Y-m-d', strtotime('+9 days')))) }}" id="{{ date('d', strtotime(date('Y-m-d', strtotime('+9 days')))) }} )">
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="select-time-day-selector-triangle right">
                <img src="{{asset('frontend-assets/images/repair/arrow-right.png')}}" alt="">
              </div>
            </div>

          </div>
          <div class="select-time-time-picker-wrapper" id="timeslot">


          </div>
          <div id="time-height-spacer"></div>
          <div class="select-time-button-wrapper fixed-to-bottom-right" id="time_continue" style="display: none;">
            <button class="new-action-button">Continue</button>
          </div>
        </div>
      </div>
    </div>
    <!-- User Info -->
    <div class="row d-flex justify-content-center" id="user_info" style="display: none;">
      <div class="col-md-5 text-center">
        <div class="chance-box-wrapper">
          <div class="d-flex">
          <a onclick="backTimeSlot()"><i class="fa fa-arrow-left" style="margin: 8px;"></i></a>
            <p class="medium-font">Where shall we send your technician?</p>
          </div>
          
        </div>
        <div class="select-address-wrapper">
          <div class="select-address-content-wrapper">
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Your Name" form="repairType" type="text" name="name" id="name" class="form-control" @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->name}}" @else value="" @endif required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Address" form="repairType"   name="address"  type="text" id="address" class="form-control" @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->address}}" @else value="" @endif required>
                </div>
              </div>
            </div>
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Phone Number" form="repairType" type="number" id="phone" class="form-control" name="phone" @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->phoneno}}" @else value="" @endif required>
                </div>
              </div>
            </div>
            <!-- <div style="height: 10px;"></div> -->
            <div class="form-group">
              <div class="new-input-comp">
                <div>
                  <input placeholder="Email" name="email" form="repairType" type="email" id="email" class="form-control" @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->email}}" @else value="" @endif required>
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
            {{-- <div class="form-group">
              <div class="new-input-comp">
                <textarea type="text" form="repairType" class="form-control" placeholder="Add Details " name="instructions" id="instructions"></textarea>
              </div>
            </div> --}}

            <div class="select-address-continue-button-wrapper">
              <button type="submit" form="repairType" class="new-action-button">Continue</button>
            </div>
            @if(!Auth::guard('web')->check())
            <div style="margin: 10px 0 0;">
              <span>Already a customer?</span><a href="{{url('signin')}}"> Sign In here</a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cart-repair">
    <div class="my-cart-desktop" id="priceCart" style="display: none;">
      <!-- <div class="my-cart-wrapper-not-fixed "></div> -->
      <div class="my-cart-wrapper ">
        <div class="my-cart-content-wrapper">
          <div class="my-cart-device-section-wrapper">
            <div class="my-cart-device-section-header">
              <div class="my-cart-device-section-header-image-title">
                <div id="brandName"></div>
              </div>
            </div>
            <div class="services-aggregation-details-wrapper">
             <div id="modelName">  </div>
              <div class="services-aggregation-details" id="priceDetails">

              </div>
            </div>
            <div class="subtotal-container" id="totalCost" style="display: none">

            </div>
            <div class="disclaimer-container"></div>
          </div>
        </div>

        {{--Input area  --}}
        <div class="my-cart-content-wrapper" id="instructions">
            <div class="my-cart-device-section-wrapper">
                <div class="form-group">
                    <textarea name="instructions" class="form-control" form="repairType"  cols="30" placeholder="explain what exactly is the issue" rows="10" required></textarea>
                </div>
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

  function getModels(id,name){
    $('#brandName').html('<span>'+name+' Repair</span>');
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

    function getrepairTypes(id,name){
      $('#priceCart').show();
      $('#modelName').html('<h3><b>'+name+'</b></h3>')
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
    var total=0;
     function custom_check(id,repair_type,price)
     {
          if($('#check'+id).is(":checked")){
                // consol("Checkbox is checked.");
             $('#continue_btn').show();
              var html ='<div class="aggregate-service" id="'+id+'">'
                  +'<span class="service-name">'+repair_type+' </span>'
                  +'<span class="service-price"><b>$'+price+'</b></span>'
                  +'</div>';
                  $('#priceDetails').append(html);
                  total = total + parseInt(price);
                  console.log(total);
                  $('#totalCost').show();
                  $('#totalCost').html('<span>Estimated</span><span class="my-cart-small-text-bold"> $'+total+'</span>');
            }
            else{
                  console.log('uncheck');
                  // $('#continue_btn').hide();
                  console.log($('#check'+id).val());
                   total = total - parseInt(price);
                   $('#totalCost').html('<span>Estimated</span><span class="my-cart-small-text-bold"> $'+total+'</span>');
                  $('#'+id).remove();

            }

      // alert(price);

     }

   $('#continue_btn').click(function(){
       $("#instructions").hide();

    checkDat("{{date('Y-m-d') }}");

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
  $(document).on('click','.time-content-box',function()
  {
    $('.time-content-box').removeClass('time-content-box-active');
    $(this).addClass('time-content-box-active');
  });
//   $('.time-content-box').click(function(){

//   });
  $('#time_continue').click(function(){
    $('#time_select').hide();
    $('#user_info').show();
  });

  function backModel()
  {
           window.location.reload();
          $('#totalCost').hide();
          $('#brandName').hide();
          $('#modelName').hide();
          $('#brand_model').hide();
          $('#time_select').hide();
          $('#repair_type').hide()
          $('#phone_model').show();
  }

  function backRepairType()
  {

          $('#phone_model').hide();
          $('#time_select').hide();
          $('#repair_type').show();
          $("#instructions").show();
  }
  function backTimeSlot()
  {
    $('#time_select').show();
    $('#user_info').hide();
    $('#repair_type').hide();
    $('#phone_model').hide();
  }
</script>
<script>
     function checkDat(date)
    {
      console.log(date);

        //  var date =($(event).val());

        //  var id = $("#user_id").val();
         var _token = $('input[name="_token"]').val();
        $.ajax({
        url: "{{route('check.date')}}",
        type:"post",
        data:{ date:date, _token: _token},
        success:function(response){


        var reponseTimes = response['times'];
          var reponseNoTimes = response['notime'];
          console.log(response);

          //  alert(response);
        $('#timeslot').empty();
        $("#time_continue").hide();
           if(reponseTimes.length > 0)
           {
             for(var i = 0; i <reponseTimes.length; i++)
             {
                 var html ='<label id="timeee" class="time-content-box time-content-box" onchange="check_time('+reponseTimes[i].id+')" for="'+reponseTimes[i].time+'">'+
                            '<p >'+reponseTimes[i].time+'</p>'+
                            '<input type="radio" form="repairType" name="time" value="'+reponseTimes[i].time+'" id="'+reponseTimes[i].time+'" class="hidden">'+
                            '</label>';
                            $('#timeslot').append(html);
             }
             if(reponseNoTimes.length>0)
             {
                for(var i = 0; i <reponseNoTimes.length; i++)
             {
                 var html ='<label id="timeee" class="time-content-box time-content-box" style="background:gray"  for="'+reponseNoTimes[i].time+'">'+
                            '<p >'+reponseNoTimes[i].time+'</p>'+
                            '<input type="radio" form="repairType" name="time" value="'+reponseNoTimes[i].time+'" id="'+reponseNoTimes[i].time+'" class="hidden" readonly>'+
                            '</label>';
                            $('#timeslot').append(html);
             }
             }

           }
           else
           {
            // alert('select the time');
           }
        }

       });
    }

    function check_time(id)
    {
         $("#time_continue").show();
    }
</script>



@endsection
