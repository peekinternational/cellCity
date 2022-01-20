@extends('admin.layouts.master')

@section('title') Orders @endsection
@section('css')
<style>
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 100px;
      height: 100px;
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .code
    {
        margin-bottom:10px;
    }
    </style>

@endsection
@section('content')

   @component('admin.common-components.breadcrumb')
         @slot('title') Refund @endslot
         @slot('li_1') Refund @endslot
         @slot('li_2') Orders @endslot
     @endcomponent

                        <div class="row">

                            <div class="col-12">
                                @if(Session::has('message'))
                                <div class="col-12">
                                    {!!Session::get('message')!!}
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            {{-- <div class="col-sm-4">
                                                <div class="search-box mr-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-sm-8">
                                                <div class="text-sm-right">
                                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Refund List</button>
                                                </div>
                                            </div><!-- end col--> --}}
                                            <div id="loader" class="loader justify-content-center" style="display: none; margin: auto;
                                            padding: 10px;">

                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="example4" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Order Id</th>
                                                        <th>User Name</th>
                                                        <th>Refund Amount</th>
                                                        <th>Reason</th>
                                                        <th>Detail</th>
                                                        <th>Attachment</th>
                                                        <th>Payment Method</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($refundOrder as $orderSale)
                                                    <tr>
                                                        
                                                        <td>{{$orderSale->id}}</td>
                                                        <td>{{$orderSale->order_id}}</td>
                                                        <td>{{$orderSale->user->first_name ?? ''}} {{$orderSale->user->last_name ?? ''}} </td>
                                                        <td>{{$orderSale->order->grand_total}}</td>
                                                         <td>{{$orderSale->detail}}</td>
                                                       
                                                        <td>{{$orderSale->detail}}</td>
                                                        <td><a href="{{url($orderSale->file)}}">Attachment</a></td>
                                                        <td>{{$orderSale->order->payment_method}}</td>
                                                        <td>
                                                            @if ($orderSale->status == 1)
                                                            <span class="badge badge-success">Complete</span>
                                                            @elseif ($orderSale->status == 2)
                                                            <span class="badge badge-warning">Reject</span>
                                                            @else
                                                            <span class="badge badge-secondary">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td style="display: flex">
                                                           
                                                            @if ($orderSale->status == 0)
                                                             @if($orderSale->order->payment_method == 'Credit Card')
                                                               <h4> <a href="{{url('refundAccept/'.$orderSale->id)}}"class="mr-3 badge badge-success" title="Refund" >Refund Accept</a></h4>

                                                            @else
                                                              <h4> <a href="{{url('refundRequest/'.$orderSale->id)}}"class="mr-3 badge badge-success" title="Refund" >Refund Accept</a></h4>

                                                             @endif
                                                             <h4> <a href="{{url('admin/refundReject/'.$orderSale->id)}}"class="mr-3 badge badge-warning" title="Refund" >Refund Reject</a></h4>
                                                            @endif
                                                           
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">
                                                              Sorry No Order Yet...
                                                            </td>
                                                        </tr>
                                                    @endforelse


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->




</div>



@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function() {
   $('#example4').DataTable({
        "order": [[ 0, "desc" ]]
    });

    });
    function viewDetail(id){
   $.ajax({
        url: "{{url('admin/shippingAddress')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#myModal').modal('show');
        },

       });
    }

    function selectTech(event,id){

        $("#loader").show();
    var value=$(event).val()
     let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url: "{{url('admin/assignTech')}}",
        type:"post",
        data:{
            orderId:id,
            techid:value,
            _token:_token
        },
        success:function(response){
        //   console.log(response);
        $("#loader").hide();
          window.location.reload();
        //   alert(response);
        //   $('#or'+id).empty();
        },

       });

    }


    function orderViewDetails(id)
    {
        $.ajax({
        url: "{{url('admin/orderViewDetails')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#saleOrder').html(response);
          $('#empModal').modal('show');
        },

       });
    }

   function sendCode(id)
   {
       $('#codeModel').modal('show');
       $('#id').val(id);
   }
    $('#sendcode').on('submit',function(e){
        e.preventDefault();
       $('#submit').hide();
       $('#buttonload').show();
        let _token = "{{ csrf_token() }}";
        // alert(name);
        $.ajax({
          url: "{{url('admin/send-code')}}",
          type:"POST",
          data:$("#sendcode").serialize(),
          success:function(response){
            console.log(response);
            alert('Successfully Send The Shipping Tracking from Desired User');
            window.location.reload();
          },
          error: function (xhr) {
            $('#buttonload').hide();
            $('#submit').show();
            if(JSON.parse(xhr.responseJSON.message).rate){
              alert(JSON.parse(xhr.responseJSON.message).rate[0]);
            }
            if(JSON.parse(xhr.responseJSON.message).address_from){
             alert(JSON.parse(xhr.responseJSON.message).address_from[0].__all__[0]);
            }else{
              console.log(JSON.parse(xhr.responseJSON.message));
            }
          },
         });
        });

</script>

@endsection
