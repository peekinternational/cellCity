@extends('frontend.layouts.master')
@section('styling')

@endsection
@section('content')
<section class="signup-area ptb-60">
  <div class="container">
    <div class="row justify-content-center d-flex">
      <div class="col-md-6">
        <div class="login-signup-header">
          <h2 class="text-center"><span class="dotsignup"></span> Complete the below form to get registered</h2>
        </div>
        <!-- <span class="social-error" style="display:none; color:red;">Please check I agree with terms and conditions</span> -->
        <div class="login-with-credentials">
          <div class="section-title">
                                  </div>
          <form class="signup-form" method="post" action="{{url('signup')}}" id="register-form">
            {{csrf_field()}}
            <div class="form-group">
              <label>NAME  <span class="steric">*</span></label>
              <input type="text" class="form-control" placeholder="Enter your first name" id="register-first-name" name="name" value="" required="">
            </div>
            <div class="form-group">
              <label>EMAIL <span class="steric">*</span></label>
              <input type="email" class="form-control" placeholder="Enter your email" id="register-email" name="email" value="" required="">
            </div>
             
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" placeholder="Enter your Address" id="register-address" name="address" value="">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="number" class="form-control" placeholder="Enter your Phone" id="register-phone" name="phoneno" value="">
            </div>
            <div class="form-group">
              <label>PASSWORD <span class="steric">*</span></label>
              <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" value="" required="">
            </div>
            <div class="form-group">
              <label>RE-TYPE PASSWORD <span class="steric">*</span></label>
              <input type="password" class="form-control" placeholder="Re-type your password" id="confirm_password" onkeyup="check();" name="password_confirmation" value="" required="">
              <div id="message"></div>
            </div>
            <button type="submit" class="btn btn-block bg-black">CREATE ACCOUNT</button>
          </form>
          <p class="already-account">Already have an account?<a href="{{url('signin')}}"> Login</a></p>
          
    </div>
  </div>
  </div>
  </div>

</section>
@endsection
@section('script')
@endsection