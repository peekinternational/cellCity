<!-- Main Header-->
<header class="main-header header-style-three">

  <!--Header-Upper-->
  <div class="header-upper">
    <div class="auto-container">
      <div class="clearfix">

        <div class="pull-left logo-outer">
          <div class="logo"><a href="{{url('/')}}"><img src="{{asset('frontend-assets/images/logo1.png')}}" alt="" title="Cell City"></a></div>
        </div>

        <div class="pull-right menu-outer clearfix">

          <div class="nav-outer clearfix">
            <!-- Main Menu -->
            <nav class="main-menu">
              <div class="navbar-header">
                <!-- Toggle Button -->      
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="navbar-collapse collapse clearfix">
                <ul class="navigation clearfix">
                  <li class="dropdown"><a href="{{url('repair')}}">Phone Repair</a>
                    <ul>
                      <li><a href="">Screen</a></li>
                      <li><a href="">Battery</a></li>
                      <li><a href="">MIC</a></li>
                      <li><a href="">Receiver</a></li>
                      <li><a href="">Charging Jack</a></li>
                      <li><a href="">Speaker</a></li>
                      <li><a href="">Proximity Sensor</a></li>
                      <li><a href="">Aux Jack</a></li>
                    </ul>
                  </li>
                  <li class=""><a href="{{url('buy-phone')}}">Buy Phones</a>
                  </li>
                  <li><a href="{{url('buy-accessories')}}">Buy Accessories</a></li>
                  <li><a href="{{url('pay-bills')}}">Pay Bills</a></li>
                  <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                  
                  @if(Auth::guard('tech')->check())
                  <li class="dropdown"><a href="#">Tech Profile</a>
                    <ul>
                      <li><a href="">Profile</a></li>
                      <li><a href="">Repairs</a></li>
                      <li><a href="">My Orders</a></li>
                      <li><a href="">Bill Status</a></li>
                      <li><a href="">Saved Address</a></li>
                    </ul>
                  </li>
                  @elseif(Auth::guard('web')->check())
                   <li class="dropdown"><a href="#">My Profile</a>
                    <ul>
                      <li><a href="">Profile</a></li>
                      <li><a href="">Repairs</a></li>
                      <li><a href="">My Orders</a></li>
                      <li><a href="">Bill Status</a></li>
                      <li><a href="">Saved Address</a></li>
                    </ul>
                  </li>
                  @else
                  <li><a href="{{url('signup')}}">Sign Up</a></li>
                  @endif
                
                </ul>
              </div>
            </nav><!-- Main Menu End-->

            <div class="btn-outer"><a href="#" class="search-btn search-box-btn"><span class="icon fa fa-search"></span></a></div>

          </div>

        </div>

      </div>
    </div>
  </div>


  <!--Sticky Header-->
  <div class="sticky-header">
    <div class="auto-container clearfix">
      <!--Logo-->
      <div class="logo pull-left">
        <a href="{{url('/')}}" class="img-responsive"><img src="{{asset('frontend-assets/images/logo1.png')}}" alt="Cell City"></a>
      </div>

      <!--Right Col-->
      <div class="right-col pull-right">
        <!-- Main Menu -->
        <nav class="main-menu">
          <div class="navbar-header">
            <!-- Toggle Button -->      
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="navbar-collapse collapse clearfix">
            <ul class="navigation clearfix">
              <li class="dropdown"><a href="{{url('repair')}}">Phone Repair</a>
                <ul>
                  <li><a href="">Screen</a></li>
                  <li><a href="">Battery</a></li>
                  <li><a href="">MIC</a></li>
                  <li><a href="">Receiver</a></li>
                  <li><a href="">Charging Jack</a></li>
                  <li><a href="">Speaker</a></li>
                  <li><a href="">Proximity Sensor</a></li>
                  <li><a href="">Aux Jack</a></li>
                </ul>
              </li>
              <li class=""><a href="#">Buy Phones</a>
              </li>
              <li><a href="{{url('buy-accessories')}}">Buy Accessories</a></li>
              <li><a href="{{url('pay-bills')}}">Pay Bills</a></li>
              <li><a href="{{url('contact-us')}}">Contact Us</a></li>
              <li><a href="{{url('signup')}}">Sign Up</a></li>
              <li class="dropdown"><a href="#">My Profile</a>
                <ul>
                  <li><a href="">Profile</a></li>
                  <li><a href="">Repairs</a></li>
                  <li><a href="">My Orders</a></li>
                  <li><a href="">Bill Status</a></li>
                  <li><a href="">Saved Address</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav><!-- Main Menu End-->
      </div>
    </div>
  </div>
  <!--End Bounce In Header-->
</header>
<!--End Main Header -->
<!-- <div class="popup-menu">
  <nav class="main-menu">
    <div class="navbar-collapse clearfix">
      <ul class="navigation clearfix">
        <li class="dropdown"><a href="">Phone Repair</a>
          <ul>
            <li><a href="">Screen</a></li>
            <li><a href="">Battery</a></li>
            <li><a href="">MIC</a></li>
            <li><a href="">Receiver</a></li>
            <li><a href="">Charging Jack</a></li>
            <li><a href="">Speaker</a></li>
            <li><a href="">Proximity Sensor</a></li>
            <li><a href="">Aux Jack</a></li>
          </ul>
        </li>
        <li class=""><a href="#">Buy Phones</a>
        </li>
        <li><a href="">Buy Accessories</a></li>
        <li><a href="{{url('pay-bills')}}">Pay Bills</a></li>
        <li><a href="{{url('contact-us')}}">Contact Us</a></li>
        <li><a href="{{url('signup')}}">Sign Up</a></li>
        <li class="dropdown"><a href="#">My Profile</a>
          <ul>
            <li><a href="">Profile</a></li>
            <li><a href="">Repairs</a></li>
            <li><a href="">My Orders</a></li>
            <li><a href="">Bill Status</a></li>
            <li><a href="">Saved Address</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</div> -->