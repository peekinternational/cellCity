@extends('frontend.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/repair.css')}}">
@section('content')
<!--Page Title-->
<!-- <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
	<div class="auto-container">
    	<ul class="bread-crumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shop</li>
        </ul>
    	<h1>Shop</h1>
    </div>
</section> -->
<!--End Page Title-->

<!--Shop Section-->
<section class="shop-section shop-page">
	<div class="auto-container">
    <section class="jss77 frame-size translate-down translate-up">
      <div class="layout horizontal vertical-mob center center-justified-mob base-bg jss78"><div class="layout vertical flwidth-mob center-mob flex-4 flex-none-mob">
        <h1 class="font45-22 font-medium text-center-mob mar-b20 mar-t20 jss80">Repair your phone at doorstep</h1>
        <div class="web-view">
          <ul class="layout horizontal center initial-mob wrap flex-no-wrap-mob pad0 mar0 jss79">
            <li class="mar-r20 mar-r0-mob layout horizontal  center">
              <i class="mar-r10 jss76"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 10.259 7.151"><path d="M75.14 245.721l-4.983 4.979-2.542-2.542a.8.8 0 0 0-1.133 1.133l3.108 3.108a.8.8 0 0 0 1.133 0l5.549-5.549a.8.8 0 0 0-1.133-1.133zm0 0" fill="#2bc9af" transform="translate(-66.248 -245.486)"></path></svg></i><span class="font16-12">Trained Professionals</span>
            </li>
            <li class="mar-r20 mar-r0-mob layout horizontal  center">
              <i class="mar-r10 jss76"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 10.259 7.151"><path d="M75.14 245.721l-4.983 4.979-2.542-2.542a.8.8 0 0 0-1.133 1.133l3.108 3.108a.8.8 0 0 0 1.133 0l5.549-5.549a.8.8 0 0 0-1.133-1.133zm0 0" fill="#2bc9af" transform="translate(-66.248 -245.486)"></path></svg></i><span class="font16-12">Doorstep Service</span>
            </li>
            <li class="mar-r20 mar-r0-mob layout horizontal  center">
              <i class="mar-r10 jss76"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 10.259 7.151"><path d="M75.14 245.721l-4.983 4.979-2.542-2.542a.8.8 0 0 0-1.133 1.133l3.108 3.108a.8.8 0 0 0 1.133 0l5.549-5.549a.8.8 0 0 0-1.133-1.133zm0 0" fill="#2bc9af" transform="translate(-66.248 -245.486)"></path></svg></i><span class="font16-12">6-months warranty</span>
            </li>
          </ul>
        </div>
        <div class="jsx-4182953111 jsx-3431082034 flwidth layout vertical list-search">
          <a class="jsx-4182953111 jsx-3431082034 flwidth" href="{{url('repair-step')}}">
            <label class="layout horizontal center pad10 flwidth drill-search card-shadow radius-10">
              <input type="text" placeholder="Enter Zip Code" class="form-control zipcode">
              <button type="button" class="search-icon btn submit-btn">
                Submit
              </button>
            </label>
          </a>
          <div id="pd_list_search_container" class="jsx-4182953111 jsx-3431082034 flwidth list-container card radius-6 hide">
            <ul id="pd_list_search_ul" class="jsx-4182953111 jsx-3431082034 layout vertical"></ul>
          </div>
        </div>
      </div>
      <div class="flex-3 flex-none-mob flwidth-mob jss75 jss81"></div>
    </div>
  </section>  
  <div class="pad-b50-30">
    <section class="frame-size mar-b25">
      <div class="jss91">
        <ul class="layout horizontal vertical-mob pad-lr-16-mob pad0 mar0">
          <li class="layout horizontal center-center flex-1 flex-none-mob jss92">
            <div class="layout vertical horizontal-mob center flheight center-justified-mob  flwidth-mob">
              <i class="mar-b20 mar-b10-mob jss90">
                <img class="img-resp" alt="Check Price" src="{{asset('frontend-assets/images/repair/repair-icon1.svg')}}">
              </i>
              <div class="layout vertical center flex-1-mob  flwidth-mob">
                <div class="layout horizontal center flwidth mar-b20 mar-b10-mob jss94">
                  <span class="layout horizontal center-center font20-14 font-medium rounded primary-bg jss93">1</span>
                  <div>
                    <span class="font22-14 font-medium tc-primary text-center">Check Price</span>
                  </div>
                </div>
                <p class="font16-12 tc-secondary jss94">Tell us which phone has to be repaired. Get the best pricing.</p>
              </div>
            </div>
          </li>
          <li class="layout horizontal center-center flex-1 flex-none-mob jss92">
            <div class="layout vertical horizontal-mob center flheight center-justified-mob  flwidth-mob">
              <i class="mar-b20 mar-b10-mob jss90">
                <img class="img-resp" alt="Schedule Service" src="{{asset('frontend-assets/images/repair/repair-icon2.svg')}}">
              </i>
              <div class="layout vertical center flex-1-mob">
                <div class="layout horizontal center flwidth mar-b20 mar-b10-mob jss94">
                  <span class="layout horizontal center-center font20-14 font-medium rounded primary-bg jss93">2</span>
                  <div>
                    <span class="font22-14 font-medium tc-primary text-center">Schedule Service</span>
                  </div>
                </div>
                <p class="font16-12 tc-secondary jss94">Book a free technician visit at your home or work at a time slot that best suits your convenience.</p>
              </div>
            </div>
          </li>
          <li class="layout horizontal center-center flex-1 flex-none-mob jss92">
            <div class="layout vertical horizontal-mob center flheight center-justified-mob  flwidth-mob">
              <i class="mar-b20 mar-b10-mob jss90">
                <img class="img-resp" alt="Get Repaired" src="{{asset('frontend-assets/images/repair/repair-icon3.svg')}}">
              </i>
              <div class="layout vertical center flex-1-mob">
                <div class="layout horizontal center flwidth mar-b20 mar-b10-mob jss94">
                  <span class="layout horizontal center-center font20-14 font-medium rounded primary-bg jss93">3</span>
                  <div>
                    <span class="font22-14 font-medium tc-primary text-center">Get Repaired</span>
                  </div>
                </div>
                <p class="font16-12 tc-secondary jss94">Our super-skilled technician will be there and make it as good as new.</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>
  </div>	  
  </div>
</section>
@endsection
@section('script')

    
@endsection