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
         @slot('title') Orders @endslot
         @slot('li_1') Repair @endslot
         @slot('li_2') Orders @endslot
     @endcomponent


                        <div class="row">
                            <div class="col-12">
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
                                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Order</button>
                                                </div>
                                            </div><!-- end col--> --}}
                                            <div id="loader" class="loader justify-content-center" style="display: none; margin: auto;
                                            padding: 10px;">

                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="example3" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Created At</th>
                                                        <th>Shipping Address</th>
                                                        <th>Grand Price</th>
                                                        <th>Status</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($productOrder as $orderSale)
                                                    <tr>
                                                        {{-- @php
                                                            $order= App\Models\Order::where('orderSales_id',$orderSale->id)->first();
                                                            // dd($order);
                                                        @endphp --}}
                                                        <td>{{$orderSale->id}}</td>
                                                        @if (isset($orderSale->user_id))
                                                        <td>{{$orderSale->user->name ?? ''}}</td>
                                                        @else
                                                        <td>{{$orderSale->shipAddress->name }}</td>
                                                        @endif

                                                        <td>{{$orderSale->created_at->format('D-m-Y h:s')}}</td>

                                                        <td>{{$orderSale->shipAddress->shipaddress}}</td>
                                                        <td>
                                                            ${{$orderSale->grand_total}}
                                                        </td>

                                                        <td>
                                                            @if ($orderSale->status == 2)
                                                            <span class="badge badge-success">complete</span>
                                                            @elseif ($orderSale->status == 1)
                                                            <span class="badge badge-warning">shipping</span>
                                                            @else
                                                            <span class="badge badge-secondary">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td style="display: flex">
                                                            <a href="#" onclick="orderViewDetails('{{$orderSale->id}}')" class="mr-3 text-success" title="view order"><i class="fa fa-eye font-size-18"></i></a>
                                                            @if ($orderSale->status == 0)
                                                            <a href="#" onclick="sendCode('{{$orderSale->id}}')" class="mr-3 text-warning" title="send Tracking Code" > <i class="fa fa-edit font-size-18"></i></a>
                                                            @endif
                                                            <a href="{{route('admin.delete.productorder',$orderSale->id)}}" class="mr-3 text-danger" title="delete order"><i class="fa fa-trash font-size-18"></i></a>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">
                                                              Soory No Order Yet...
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


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Shipping Address </h4>
        </div>
        <div class="modal-body">
            <div id="showModels">

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>

{{-- /////////////order sale modaL --}}

<div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sale Order </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body" id="saleOrder">

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  {{-- Send Code  --}}
<div class="modal fade bd-example-modal-lg" id="codeModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Shipping tracking code </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <div class="modal-body" >
            <form id="sendcode" method="POST">
                @csrf
                <div class="code">
                   <input type="text" id="code" name="code" class="form-control" placeholder="Enter Code Here">
                   <input type="hidden" name="id" id="id" >
                   {{-- <input type="hidden" name="phoneno" id="id" >
                   <input type="hidden" name="email" id="id" > --}}
                </div>
                <div class="text-center">
                   <button id="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
  </div>
@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function() {
   $('#example3').DataTable({
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
        let name = $('#code').val();
        let id= $('#id').val();
        let _token = "{{ csrf_token() }}";
        // alert(name);
        $.ajax({
          url: "{{url('admin/send-code')}}",
          type:"POST",
          data:{
            _token:_token,
            code:name,
            id:id,
          },
          success:function(response){
            console.log(response);
            alert('Successfully Send The Shipping Code from Desired User');
            window.location.reload();
          },
         });
        });

</script>

@endsection
