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
                                            <table class="table table-centered table-nowrap" id="example3">
                                                <thead class="thead-light">
                                                    <tr>

                                                        <th>Order ID</th>
                                                        <th>Order Created</th>
                                                        <th>Billing Name</th>

                                                        <th>Brand Name</th>
                                                        <th>color</th>
                                                        <th>condition</th>
                                                         <th>Storage</th>
                                                        <th>Price</th>
                                                        <th>Pay Status</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($productOrder as $order)
                                                    {{-- @php
                                                        $product = App\Models\Product::where('id',$order->product_id)->first();
                                                        $model = App\Models\Pmodel::where('id',$product->model_id)->first();
                                                    @endphp --}}
                                                    <tr>
                                                        <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$order->id}}</a> </td>
                                                        <td>{{$order->created_at->toDayDateTimeString()}}</td>
                                                        <td>{{$order->user->name}}</td>
                                                        <td>
                                                            {{ $order->brand_name ?? ''}} {{ $order->model_name ?? ''}}

                                                        </td>
                                                        <td>{{  $order->color }}</td>
                                                        <td> {{ $order->condition }} </td>
                                                        <td> {{ $order->storage }} </td>

                                                        <td>
                                                           ${{ $order->grand_price }}
                                                        </td>
                                                        <td>
                                                         {{-- <span class="badge badge-pill badge-warning">{{$order->payment_method}}</span> --}}
                                                        @if ($order->status == 1)
                                                        <span class="badge badge-pill badge-warning">Shipping</span>
                                                        @elseif ($order->status==2)
                                                        <span class="badge badge-pill badge-info">Complete</span>
                                                        @else
                                                        <span class="badge badge-pill badge-info">Pending</span>
                                                        @endif
                                                       </td>

                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewDetail('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="mdi mdi-eye font-size-18"></i></a>
                                                            <a href="{{url('admin/modify-order',$order->id)}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach

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


@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function() {
   $('#example3').DataTable({
        "order": [[ 0, "desc" ]]
    });

} );
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

    function rejectOrder(id)
    {
        $.ajax({
        url: "{{url('admin/rejectOrder')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);

         location.reload();
        //   alert(response);
        },

       });
    }
</script>

@endsection
