@extends('admin.layouts.master')

@section('title') Orders @endsection
@section('css') 
        
    
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
                                            <div class="col-sm-4">
                                                <div class="search-box mr-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-right">
                                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Order</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>
                
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap">
                                                <thead class="thead-light">
                                                    <tr>
                                                      
                                                        <th>Order ID</th>
                                                        <th>Billing Name</th>
                                                        <th>Date & Time</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Payment Method</th>
                                                        <th>Technician</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($RepairOrders as $order)
                                                    <tr>
                                                        <td><a href="javascript: void(0);" class="text-body font-weight-bold">#{{$order->id}}</a> </td>
                                                        <td>{{$order->name}}</td>
                                                        <td>
                                                            {{$order->date}}, {{$order->time}}
                                                        </td>
                                                       
                                                        <td>
                                                           ${{$order->repairorderstypes->sum('price')}}
                                                        </td>
                                                         <td>
                                                            @if($order->pay_status == 'paid')
                                                            <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                                            @else
                                                             <span class="badge badge-pill badge-soft-warning font-size-12">Unpaid</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                           <span class="badge badge-pill badge-soft-success font-size-12"> {{$order->pay_method}}</span>
                                                        </td>
                                                        <td id="or{{$order->id}}">
                                                          <select onchange="selectTech(this,'{{$order->id}}')" class="form-control select2">
                                                            <option selected="">Select Technician</option>

                                                            @foreach(CityClass::allTech() as $tech)
                                                                <option value="{{$tech->id}}">{{$tech->name}}</option>
                                                            @endforeach
                                                          
                                                        </select>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewDetail('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="mdi mdi-eye font-size-18"></i></a><a href="javascript:void(0);" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                            <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                    <i class="mdi mdi-chevron-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
                <div id="showModels"></div>
              

@endsection

@section('script')
    
<script type="text/javascript">

    function viewDetail(id){
   $.ajax({
        url: "{{url('admin/repairTypes')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#exampleModal'+id).modal('show');
        },

       });
    }

    function selectTech(event,id){

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
          console.log(response);
          $('#or'+id).empty();
        },

       });

    }

</script>

@endsection