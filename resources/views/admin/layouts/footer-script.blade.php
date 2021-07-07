        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('admin-assets/libs/jquery/jquery.min.js')}}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('admin-assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('admin-assets/libs/metismenu/metismenu.min.js')}}"></script>
        <script src="{{ URL::asset('admin-assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('admin-assets/libs/node-waves/node-waves.min.js')}}"></script>
       

        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('admin-assets/js/app.js')}}"></script>
        
        @yield('script-bottom')