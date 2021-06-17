<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Cell City">
		<meta name="author" content="Cell City">
		<meta name="keywords" content="s">
		<title>Cell City</title>
		
		<link rel='stylesheet' href="{{asset('frontend-assets/css/bootstrap.css')}}" media='' />
		<link rel='stylesheet' href="{{asset('frontend-assets/css/revolution-slider.css')}}" media='' />
		<link rel='stylesheet' href="{{asset('frontend-assets/css/style.css')}}" media='' />
		<link rel='stylesheet' href="{{asset('frontend-assets/css/responsive.css')}}" media='' />
		@yield('styling')
	</head>

	<body>
		<div class="page-wrapper">
		@include('frontend.includes.header')
			<!-- Main Content-->
			@yield('content')
			
		<!-- End Page -->
		@include('frontend.includes.footer')
		</div>	
		<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>

<!--Search Popup-->
<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="flaticon-unchecked"></span></div>
	<div class="popup-inner">
    
    	<div class="search-form">
        	<form method="post" action="">
            	<div class="form-group">
                	<fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                        <input type="submit" value="Search" class="theme-btn">
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>
		<script src="{{asset('frontend-assets/js/jquery.js')}}"></script>
		<script src="{{asset('frontend-assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend-assets/js/revolution.min.js')}}"></script>
		<script src="{{asset('frontend-assets/js/jquery.fancybox.pack.js')}}"></script>
		<script src="{{asset('frontend-assets/js/owl.js')}}"></script>
		<script src="{{asset('frontend-assets/js/slick.js')}}"></script>
		<script src="{{asset('frontend-assets/js/jquery.bootstrap-touchspin.js')}}"></script>
		<script src="{{asset('frontend-assets/js/jquery.easing.min.js')}}"></script>
		<script src="{{asset('frontend-assets/js/wow.js')}}"></script>
		<script src="{{asset('frontend-assets/js/script.js')}}"></script>
		@yield('script')
	</body>
</html>