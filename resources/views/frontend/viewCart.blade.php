@extends('frontend.layouts.master')
@section('styling')

@endsection
@section('content')
<!--Page Title-->
    <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
      <div class="auto-container">
          <ul class="bread-crumb">
                <li><a href="index-2.html">Home</a></li>
                <li class="active">Cart List</li>
            </ul>
          <h1>Shop Detail</h1>
        </div>
    </section>

  <div class="container">
      <div class="row">
        <div class="col-md-12">
           <div class="card">
            <div class="product-stock bg-dark" style="margin-top: 100px"><i class="fa fa-info-circle"></i> <span id="quantity"></span> Product </div>
            <!-- Warenty Box -->
            <div class="warrenty-box">

                @php
                if (Auth::check()) {
                     $userID = Auth::user()->id;
                     $items=\Cart::session($userID)->getContent();
                }
                else {
                    $collection=\Cart::getContent();
                }


                @endphp
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                           <tr>
                               <th>Product</th>
                               <th>Color</th>
                               <th>Storage</th>
                               <th>Condition</th>
                               <th>Quantity</th>
                               <th>Price</th>
                               <th>Total Price</th>
                               <th>Action</th>

                           </tr>
                         </thead>
                       <tbody>
                    @if (Auth::check())
                    @forelse ($items as $item)

                    @if ($item->attributes->category != "accessory")
                       <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->attributes->color}}</td>
                            <td>{{$item->attributes->storage}}</td>
                            <td>{{$item->attributes->conditition}}</td>
                            <td><input type="number" onfocus="removeval({{ $item->id }})" class="form-control border-dark w-40px"
                            onchange="recal({{ $item->id }})"id="change{{ $item->id }}" value="{{ $item->quantity }}"
                            MIN="1" />
                            </td>
                            <td>{{$item->price}}</td>
                            @php
                                $total = round($item->quantity*$item->price);
                            @endphp
                            <td>{{$total}}</td>

                            <td>
                                <div class="card-toolbar text-right">
                                    <form method="post">
                                        @csrf
                                        <input type="hidden" value="" name="id">
                                        <a class="btn btn-danger" type="button" title="Delete"
                                            onclick="dlt({{ $item->id }})"><i
                                                class="fa fa-trash"></i></a>
                                        {{-- confirm-delete --}}
                                    </form>
                                </div>
                                </td>
                              </tr>
                                  @else

                                  @endif
                                 @empty
                            <td colspan="7" class="text-center"><b>Your Product Cart is empty..</b></td>
                         @endforelse
                       @else

                       @forelse ($collection as $item)

                       @if ($item->attributes->category != "accessory")
                          <tr>
                               <td>{{$item->name}}</td>
                               <td>{{$item->attributes->color}}</td>
                               <td>{{$item->attributes->storage}}</td>
                               <td>{{$item->attributes->conditition}}</td>
                               <td><input type="number" onfocus="removeval({{ $item->id }})" class="form-control border-dark w-40px"
                               onchange="recal({{ $item->id }})"id="change{{ $item->id }}" value="{{ $item->quantity }}"
                               MIN="1" />
                               </td>
                               <td>{{$item->price}}</td>
                               @php
                                   $total = round($item->quantity*$item->price);
                               @endphp
                               <td>{{$total}}</td>

                               <td>
                                   <div class="card-toolbar text-right">
                                       <form method="post">
                                           @csrf
                                           <input type="hidden" value="" name="id">
                                           <a class="btn btn-danger" type="button" title="Delete"
                                               onclick="dlt({{ $item->id }})"><i
                                                   class="fa fa-trash"></i></a>
                                           {{-- confirm-delete --}}
                                       </form>
                                   </div>
                               </td>
                          </tr>
                           @else

                          @endif
                          @empty
                          <td colspan="7" class="text-center"><b>Your Product Cart is empty..</b></td>
                       @endforelse
                       @endif
                  </tbody>
               </table>
                </div>

            </div>


            <div class="product-stock bg-dark" style="margin-top: 100px"><i class="fa fa-info-circle"></i> <span id="quantity"></span> Accessory </div>
            <!-- Warenty Box -->
            <div class="warrenty-box">


                @php
                if (Auth::check()) {
                     $userID = Auth::user()->id;
                     $items=\Cart::session($userID)->getContent();
                }
                else {
                    $collection=\Cart::getContent();
                }


                @endphp
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                           <tr>
                               <th>Brand Name</th>


                               <th>Accessory Name</th>
                               <th>Category</th>
                               <th>Quantity</th>
                               <th>Price</th>
                               <th>Total Price</th>
                               <th>Action</th>

                           </tr>
                         </thead>
                       <tbody>

                        @if (Auth::check())


                       @forelse ($items as $item)

                       @if ($item->attributes->category == "accessory")
                          <tr>
                               <td>{{$item->name}}</td>
                               <td>{{$item->associatedModel->name}}</td>
                               <td>{{$item->associatedModel->category}}</td>
                               {{-- <td>{{$item->associatedModel->conditition}}</td> --}}
                               <td><input type="number" onfocus="removeval({{ $item->id }})" class="form-control border-dark w-40px"
                               onchange="recal({{ $item->id }})"id="change{{ $item->id }}" value="{{ $item->quantity }}"
                               MIN="1" />
                               </td>
                               <td>{{$item->price}}</td>
                               @php
                                   $total = round($item->quantity*$item->price);
                               @endphp
                               <td>{{$total}}</td>

                               <td>
                                   <div class="card-toolbar text-right">
                                       <form method="post">
                                           @csrf
                                           <input type="hidden" value="" name="id">
                                           <a class="btn btn-danger" type="button" title="Delete"
                                               onclick="dlt({{ $item->id }})"><i
                                                   class="fa fa-trash"></i></a>
                                           {{-- confirm-delete --}}
                                       </form>
                                   </div>
                               </td>
                          </tr>
                           @else

                          @endif
                          @empty
                          <td colspan="7" class="text-center"><b>Your Accessory Cart is empty..</b></td>
                       @endforelse
                       @else
                       @forelse ($collection as $item)

                       @if ($item->attributes->category == "accessory")
                          <tr>
                               <td>{{$item->name}}</td>
                               <td>{{$item->associatedModel->name}}</td>
                               <td>{{$item->associatedModel->accessoryCategory->category}}</td>
                               {{-- <td>{{$item->associatedModel->conditition}}</td> --}}
                               <td><input type="number" onfocus="removeval({{ $item->id }})" class="form-control border-dark w-40px"
                               onchange="recal({{ $item->id }})"id="change{{ $item->id }}" value="{{ $item->quantity }}"
                               MIN="1" />
                               </td>
                               <td>${{$item->price}}</td>
                               @php
                                   $total = round($item->quantity*$item->price);
                               @endphp
                               <td>${{$total}}</td>

                               <td>
                                   <div class="card-toolbar text-right">
                                       <form method="post">
                                           @csrf
                                           <input type="hidden" value="" name="id">
                                           <a class="btn btn-danger" type="button" title="Delete"
                                               onclick="dlt({{ $item->id }})"><i
                                                   class="fa fa-trash"></i></a>
                                           {{-- confirm-delete --}}
                                       </form>
                                   </div>
                               </td>
                          </tr>
                           @else

                          @endif
                          @empty
                          <td colspan="7" class="text-center"><b>Your Accessory Cart is empty..</b></td>
                       @endforelse
                       @endif
                  </tbody>
               </table>
                </div>

            </div>

            <div class="warrenty-box">
                <div class="row">
                <div class="col-md-6" style=" margin-left: 16px;">

                    <label>Select Address</label>
                 <select class="form-control" onchange="getAddress(this)">
                   <option value="0"> Select Address</option>
                   @if (Auth::check())
                   @foreach (CityClass::shippingAddress() as $shipAddress)
                   <option value="{{$shipAddress->id}}">{{$shipAddress->shipaddress}}</option>
                   @endforeach

                   @else
                   <option>Fill below Address Info</option>
                   @endif

                </select>

            </div>
             </div>
             <div id="getAddress">
                <form action="{{url('shippadd.create')}}" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">


                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Full Email" required="">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="mobileNo" class="form-control" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="shipaddress" class="form-control" placeholder="Full address" required>
                            </div>
                            <div class="form-group">
                                <label>Street Address</label>
                                <input type="text" name="street_address" class="form-control"  placeholder="Street address" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <input type="text" name="country" placeholder="Country" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input type="text" name="state" placeholder="State" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input type="text" placeholder="City" name="city" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Zip Code</label>
                                        <input type="text" name="zipcode" placeholder="Zip Code" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary btn-style-one">Submit</button>
                    </div>
                    </form>
                  </div>
                </div>
        </div>

      </div>
    </div>
  </div>


        @endsection
        @section('script')
        <script>


        function recal(pid){
            // var _token = $('input[name="_token"]').val();
            // alert(pid);
            var id =pid;
            var value = $('#change'+id).val();
            $.ajax({
            type:"post",
            url: "{{ route('cart.update') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{id: pid, quantity:value},
            success: function(user)
            {
                window.location.reload();
            },error:function(error){
            console.log(error);
            }
            });
            }

            // function removeval(id){
            //     //  alert(id);
            //     $("#change"+id).removeVal('value');

            //     }

            function dlt(item){
            var _token = $('input[name="_token"]').val();
            $.ajax({
            type:"post",
            url: "{{ route('cart.remove') }}",
            data:{id: item, _token: _token},
            success: function(user)
            {
                window.location.reload();
            },error:function(error){
            console.log(error);
            }
            });
            }

        function getAddress(event)
        {
            var id = $(event).val();
            // alert(id);
            console.log(id);
            if(id==0)
            {
                $('#getAddress').reset();
            }

            $.ajax({
            url: "{{url('getAddress')}}/"+id,
            type:"get",
            success:function(response){
             console.log(response);
            $('#getAddress').html(response);
            //   $('#exampleModal'+id).modal('show');
            },

           });


        }
         </script>


        @endsection
