        <!-- JAVASCRIPT -->
         <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- <script src="{{ URL::asset('admin-assets/libs/jquery/jquery.min.js')}}"></script> -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('admin-assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('admin-assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ URL::asset('admin-assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('admin-assets/libs/node-waves/node-waves.min.js')}}"></script>
       <script src="{{ URL::asset('admin-assets/js/select2.min.js')}}"></script>
       <script src="{{ URL::asset('admin-assets/js/bootstrap-tagsinput.js')}}"></script>
        
   
        <!-- App js -->
        <script src="{{ URL::asset('admin-assets/js/app.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

         <!-- <script src="{{asset('admin-assets/datatable/jquery.dataTables.min.js')}}"></script> -->
         <!-- <script src="{{asset('admin-assets/datatable/dataTables.bootstrap4.min.js')}}"></script> -->
         <script src="{{asset('admin-assets/js/datatable.js')}}"></script>
              <script type="text/javascript">
                $('#submitLink').click(function(e) {
                    // e.preventDefault();
                    $("#testForm").submit();
                });
                $('#updateButton').click(function(e) {
                    // e.preventDefault();
                    $("#updateForm").submit();
                });
            </script>
        @yield('script-bottom')
