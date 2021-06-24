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
  <div class="frame-size jss174"><div class="layout vertical"><section class="jsx-146361224 jsx-2802770802 slider-list"><div class="jsx-146361224 jsx-2802770802 layout horizontal justified center"><div class="jss96 jss180 pad-lr-16-mob layout vertical"><h2 class="jss95 jss179 font27-18 center mar0 font-medium left-align">Services Available</h2></div><div class="jsx-146361224 jsx-2802770802 slider-view-more"></div></div><div class="jsx-146361224 jsx-2802770802 layout horizontal center-center  slider-list-slider"><i class="jsx-146361224 jsx-2802770802 cursor slide-next web-view "></i><div id="Services AvailableContainer" class="jsx-146361224 jsx-2802770802 layout horizontal center scroll-horizon slider-wrap post-slider-wrap"><ul id="Services Availablelist" class="jsx-146361224 jsx-2802770802 layout horizontal center-justified list-none pad0 box-pad"><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/screen-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight" alt="SCREEN" src="https://cshprod.s3.amazonaws.com/imageLibrary/Mask_Group_135_f84f5361531b.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">SCREEN</span></a></li><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/battery-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight" alt="BATTERY" src="https://cshprod.s3.amazonaws.com/imageLibrary/Mask_Group_137_5d508ad10928.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">BATTERY</span></a></li><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/mic-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight" alt="MIC" src="https://cshprod.s3.amazonaws.com/imageLibrary/Mask_Group_136_7ea925bb0d28.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">MIC</span></a></li><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/receiver-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight" alt="RECEIVER" src="https://cshprod.s3.amazonaws.com/imageLibrary/Mask_Group_141_aef400ec33c8.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">RECEIVER</span></a></li><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/charging-jack-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight" alt="CHARGING JACK" src="https://cshprod.s3.amazonaws.com/imageLibrary/Mask_Group_138_4604c5485357.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">CHARGING JACK</span></a></li><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/speaker-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight" alt="SPEAKER" src="https://cshprod.s3.amazonaws.com/imageLibrary/Mask_Group_139_f431a49aefba.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">SPEAKER</span></a></li><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/proximity-sensor-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight" alt="PROXIMITY SENSOR" src="https://cshprod.s3.amazonaws.com/imageLibrary/Group_1522x_b3591892023a.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">PROXIMITY SENSOR</span></a></li><li class="mar-r20  pad-tb16 layout horizontal jss175"><a class="layout vertical card-shadow radius-10 pad16 flwidth flheight around-justified jss176" href="/aux-jack-repair"><span class="layout horizontal start center-justified  flex-1 jss177"><img class="flheight jss58 flwidth flheight" alt="AUX JACK" srcset="/static/b.png" src="/static/b.png"></span><span class="layout horizontal center-center font12-10 text-center tc-primary line-clamp-3 jss178">AUX JACK</span></a></li></ul></div><i class="jsx-146361224 jsx-2802770802 cursor slide-next web-view"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" class="jsx-1367467106"><defs class="jsx-1367467106"><filter id="rightShadow-11" width="100" height="100" x="0" y="0" filterUnits="userSpaceOnUse" class="jsx-1367467106"><feOffset class="jsx-1367467106"></feOffset><feGaussianBlur result="blur" stdDeviation="10" class="jsx-1367467106"></feGaussianBlur><feFlood flood-opacity=".161" class="jsx-1367467106"></feFlood><feComposite in2="blur" operator="in" class="jsx-1367467106"></feComposite><feComposite in="SourceGraphic" class="jsx-1367467106"></feComposite></filter></defs><g transform="translate(30 30)" class="jsx-1367467106"><g transform="translate(-30 -30)" class="jsx-1367467106 arrowFilter"><circle cx="20" cy="20" r="20" transform="translate(30 30)" class="jsx-1367467106 cls-1"></circle></g><path d="M-6478.5-19485.066l9.667 9.668-9.667 9.664" transform="translate(6495.392 19495.066)" class="jsx-1367467106 arrow primary-stroke"></path></g></svg></i></div></section></div></div>
  <div class="mar-b40 mar-t20"><section class="jss181"><div class="frame-size"><div class="pad-t16"><div class="jss96 jss187 pad-lr-16-mob layout vertical"><h2 class="jss95 jss186 font27-18 center mar0 font-medium left-align">Why Us</h2></div></div><div class="layout vertical center card-header pad-t20 pad-lr-16-mob jss182"><ul class="layout horizontal wrap justified pad0 mar-b20 flwidth"><li class="layout horizontal vertical-mob jss183"><div class="layout horizontal center-center flwidth jss184"><img class="img-resp" alt="Premium Repair" src="/static/repair/whyus/whyus-1.svg"></div><div class="layout vertical flwidth jss185"><span class="font-medium font22-14">Premium Repair</span><span class="font-medium font14-12 mar-t4 tc-secondary">Top quality certified parts</span></div></li><li class="layout horizontal vertical-mob jss183"><div class="layout horizontal center-center flwidth jss184"><img class="img-resp" alt="Instant Mobile Repair" src="/static/repair/whyus/whyus-2.svg"></div><div class="layout vertical flwidth jss185"><span class="font-medium font22-14">Instant Mobile Repair</span><span class="font-medium font14-12 mar-t4 tc-secondary">Mobile Repair on the Spot in Cashify Store or at Home/Office</span></div></li><li class="layout horizontal vertical-mob jss183"><div class="layout horizontal center-center flwidth jss184"><img class="img-resp" alt="Physical Protection Warranty" src="/static/repair/whyus/whyus-3.svg"></div><div class="layout vertical flwidth jss185"><span class="font-medium font22-14">Physical Protection Warranty</span><span class="font-medium font14-12 mar-t4 tc-secondary">Free 1 Month Screen Replacement even if it breaks for all Screen Repair</span></div></li><li class="layout horizontal vertical-mob jss183"><div class="layout horizontal center-center flwidth jss184"><img class="img-resp" alt="6 Months Warranty" src="/static/repair/whyus/whyus-4.svg"></div><div class="layout vertical flwidth jss185"><span class="font-medium font22-14">6 Months Warranty</span><span class="font-medium font14-12 mar-t4 tc-secondary">Hassle free 6 month warranty on parts replaced</span></div></li><li class="layout horizontal vertical-mob jss183"><div class="layout horizontal center-center flwidth jss184"><img class="img-resp" alt="Skilled Technicians" src="/static/repair/whyus/whyus-5.svg"></div><div class="layout vertical flwidth jss185"><span class="font-medium font22-14">Skilled Technicians</span><span class="font-medium font14-12 mar-t4 tc-secondary">Trained &amp; Qualified Professionals</span></div></li><li class="layout horizontal vertical-mob jss183"><div class="layout horizontal center-center flwidth jss184"><img class="img-resp" alt="Guaranteed Safety" src="/static/repair/whyus/whyus-6.svg"></div><div class="layout vertical flwidth jss185"><span class="font-medium font22-14">Guaranteed Safety</span><span class="font-medium font14-12 mar-t4 tc-secondary">Total Device &amp; Data Security</span></div></li></ul></div></div></section></div>	  
  </div>
</section>
@endsection
@section('script')

    
@endsection