@extends('frontend.layouts.master')
@section('content')
<!--Page Title-->
<!-- <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
	<div class="auto-container">
    	<ul class="bread-crumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shop</li>
        </ul>
    	<h1>Shop</h1>
    </div>
</section> -->
<!--End Page Title-->


<section class="shop-section shop-page profile-page">
	<div class="auto-container">
		 @if(Session::has('message'))
                  <div class="col-12">
                      {!!Session::get('message')!!}
                  </div>
                  @endif
		<div role="tabpanel">
			<div class="row">

				<div class="col-md-3">
					<!-- Nav tabs -->
					<ul class="nav nav-pills nav-stacked profile-tabs nav-tabs-dropdown" role="tablist">
						<li role="presentation" class="active">
							<a href="#MyProfile" aria-controls="MyProfile" role="tab" data-toggle="tab">My Profile</a>
						</li>
						<li role="presentation">
							<a href="#repairs" aria-controls="repairs" role="tab" data-toggle="tab">Repair</a>
						</li>
						<li role="presentation">
							<a href="#myOrders" aria-controls="myOrders" role="tab" data-toggle="tab">My Orders</a>
						</li>
						<li role="presentation">
							<a href="#billStatus" aria-controls="billStatus" role="tab" data-toggle="tab">Bill Status</a>
						</li>
						<li role="presentation">
							<a href="#savedAddress" aria-controls="savedAddress" role="tab" data-toggle="tab">Saved Address</a>
						</li>
						<li role="presentation">
							<a href="{{url('/logout')}}" >Logout</a>
						</li>
					</ul>
				</div>

				<div class="col-md-9">
					<!-- Tab panes -->

					<div class="tab-content">
                        @if(Session::has('success'))
                    <div class="alert alert-success">
                       {!!Session::get('success')!!}
                    </div>
                    @endif
						<div role="tabpanel" class="tab-pane active" id="MyProfile">
							<h3 class="title-section">My Profile</h3><br>
							<form action="{{route('update.profile',Auth::guard('web')->user()->id)}}" method="POST">
                                @csrf
                                @method('PUT')
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" value="{{Auth::guard('web')->user()->name}}">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="number" name="phoneno" class="form-control" value="{{Auth::guard('web')->user()->phoneno}}" >
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="{{Auth::guard('web')->user()->email}}">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea cols="4" rows="4" name="address" class="form-control">{{Auth::guard('web')->user()->address}}</textarea>
								</div>
								<div class="form-group text-right">
									<input type="submit" name="submit" class="btn btn-style-one" value="Edit Profile">
								</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane" id="repairs">
							<h3 class="title-section">Repairs</h3><br>
							<div class="table-responsive">
								<table id="example" class="table table-bordered table-hover" >
									<thead>
										<tr>
											<th>Sr#</th>
											<th>Model</th>
											<th>Repair Type</th>
											<th>Time & Date</th>
											<th>Price</th>
                                            <th>Payment Method</th>
											<th>Status</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach(Auth::guard('web')->user()->repairorders as $index => $order)
										<tr>
											<td>{{$index + 1}}</td>
											<td>{{CityClass::modelName($order->model_Id)}}</td>
											<td>
												@foreach($order->repairorderstypes as $repair)
												   {{$repair->repair_type}}<br>
                                                @endforeach
											</td>
											<td>{{$order->date}} {{$order->time}}</td>
											<td>
												@foreach($order->repairorderstypes as $repair)
												   ${{$repair->price}}<br>
                                                @endforeach
											</td>
                                            <td><span class="badge badge-pill badge-success">{{$order->pay_method}}</span></td>
											<td> @if ($order->order_status == 3 && $order->techId !== null)
                                                <span class="badge badge-pill badge-warning">Assign</span>
                                                @elseif ($order->order_status == 1  && $order->techId !== null)
                                                <span class="badge badge-pill badge-success">Accept</span>

                                                @elseif ($order->order_status == 0  && $order->techId !== null)
                                                <span class="badge badge-pill badge-secondary">Pendding</span>
                                                @elseif ($order->order_status == 4 && $order->techId !== null)
                                                <span class="badge badge-pill badge-success">Complete</span>
                                                @else
                                                <span class="badge badge-pill badge-info">Not Assign</span>
                                                @endif</td>
											<!-- <td><a href=""><i class="fa fa-eye text-danger"></i></a></td> -->
                                            <td>
                                                @if ($order->order_status == 1  && $order->techId !== null)
                                                <a href="{{route('complete.order',$order->id)}}" title="paid the Order"><i class="fa fa-pencil"></i></a>
                                                @endif
                                                <a href="{{route('view.order',$order->id)}}" ><i class="fa fa-eye"></i></a>

                                            </td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="myOrders">
							<h3 class="title-section">My Orders</h3><br>
							<div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Sr#</th>
											<th>Product Name</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Iphone XS</td>
											<td>2</td>
											<td>$120</td>
											<td>Pending</td>
											<td><a href=""><i class="fa fa-trash text-danger"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="billStatus">
							<h3 class="title-section">Bill Status</h3><br>
							<div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover" >
									<thead>
										<tr>
											<th>Sr#</th>
											<th>Paid Through</th>
											<th>Payment</th>
											<th>Paid on</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>VISA/Master</td>
											<td>$100</td>
											<td>12-07-21</td>
											<td>Paid</td>
											<td><a href=""><i class="fa fa-trash text-danger"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="savedAddress">
							<div class="d-flex justify-content-between title-section">
								<h3>My Address</h3><br>
								<a class="btn btn-primary btn-style-one" data-toggle="modal" href='#modal-addAddress'>Add New Address</a>

							</div>
							<div class="row">
								@foreach(Auth::guard('web')->user()->shippingaddress as $shipingAdd)
								<div class="col-md-6">
									<div class="address-box">
										<h6><strong>{{$shipingAdd->name}}</strong></h6>
										<p><i class="fa fa-phone"></i> {{$shipingAdd->mobileNo}}</p>
										<p><i class="fa fa-map-marker"></i> {{$shipingAdd->shipaddress}}</p>
										<p>{{$shipingAdd->city}}, {{$shipingAdd->state}}, {{$shipingAdd->country}},{{$shipingAdd->zipcode}}</p>

										<div class="action-btn text-center">
											<button class="btn" data-toggle="modal" href='#modal-editAddress{{$shipingAdd->id}}'><i class="fa fa-edit"></i> Edit</button>
											<form action="{{url('shipAddress/'.$shipingAdd->id)}}" method="post" style="display: contents;">
                                            {{csrf_field()}}
                                               @method('DELETE')

											<button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
										</form>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<!-- Add New Address Modal -->

							<div class="modal fade" id="modal-addAddress">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header d-flex justify-content-between">
											<h4 class="modal-title"><strong>Add New Address</strong></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="{{url('shipAddress')}}" method="post">
										<div class="modal-body">

												 {{csrf_field()}}
												<div class="form-group">
													<label>Full name</label>
													<input type="text" name="name" class="form-control" placeholder="Full Name" required="">
												</div>
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="mobileNo" class="form-control" placeholder="Phone Number" required>
												</div>
												<div class="form-group">
													<label>Full address</label>
													<input type="text" name="shipaddress" class="form-control" placeholder="Full address" required>
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
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary btn-style-one">Save</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<!-- End Add New Address -->
							<!-- Add New Address Modal -->
                @foreach(Auth::guard('web')->user()->shippingaddress as $shipingAdd)
							<div class="modal fade" id="modal-editAddress{{$shipingAdd->id}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header d-flex justify-content-between">
											<h4 class="modal-title"><strong>Edit Address</strong></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="{{route('shipAddress.update',$shipingAdd->id)}}" method="post">
                                            {{csrf_field()}}
                                            @method('PUT')
										<div class="modal-body">

												<div class="form-group">
													<label>Full name</label>
													<input type="text" name="name" class="form-control" value="{{$shipingAdd->name}}" placeholder="Full Name">
												</div>
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="mobileNo" class="form-control" value="{{$shipingAdd->mobileNo}}" placeholder="Phone Number">
												</div>
												<div class="form-group">
													<label>Full address</label>
													<input type="text" name="shipaddress" class="form-control" value="{{$shipingAdd->shipaddress}}" placeholder="Full address">
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Country</label>
															<input type="text" name="country" placeholder="Country" value="{{$shipingAdd->country}}" class="form-control">
														</div>
														<div class="col-md-6">
															<label>State</label>
															<input type="text" name="state" placeholder="State" value="{{$shipingAdd->state}}" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>City</label>
															<input type="text" placeholder="City" name="city" value="{{$shipingAdd->city}}" class="form-control">
														</div>
														<div class="col-md-6">
															<label class="control-label">Zip Code</label>
															<input type="text" name="zipcode" placeholder="Zip Code" value="{{$shipingAdd->zipcode}}" class="form-control">
														</div>
													</div>
												</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary btn-style-one">Save</button>
										</div>
										</form>
									</div>
								</div>
							</div>

							@endforeach
							<!-- End Add New Address -->
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!--Shop Section-->

@endsection
@section('script')
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
  $('.nav-tabs-dropdown')
    .on("click", "li:not('.active') a", function(event) {  $(this).closest('ul').removeClass("open");
    })
    .on("click", "li.active a", function(event) {        $(this).closest('ul').toggleClass("open");
    });
</script>

@endsection
