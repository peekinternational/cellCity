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
						<div role="tabpanel" class="tab-pane active" id="MyProfile">
							<h3 class="title-section">My Profile</h3><br>
							<form>
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="number" name="phone" class="form-control">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea cols="4" rows="4" class="form-control"></textarea>
								</div>
								<div class="form-group text-right">
									<input type="submit" name="submit" class="btn btn-style-one" value="Edit Profile">
								</div> 
							</form>
						</div>
						<div role="tabpanel" class="tab-pane" id="repairs">
							<h3 class="title-section">Repairs</h3><br>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Sr#</th>
											<th>Model</th>
											<th>Repair Type</th>
											<th>Time & Date</th>
											<th>Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Iphone XS</td>
											<td>LCD Issue</td>
											<td>12-07-21 9am-11am</td>
											<td>$120</td>
											<td><a href=""><i class="fa fa-trash text-danger"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="myOrders">
							<h3 class="title-section">My Orders</h3><br>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
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
								<table class="table table-bordered table-hover">
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
								<h3>My Orders</h3><br>
								<a class="btn btn-primary btn-style-one" data-toggle="modal" href='#modal-addAddress'>Add New Address</a>
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="address-box">
										<h6><strong>Zeeshan Masood</strong></h6>
										<p><i class="fa fa-phone"></i> +92339954545</p>
										<p><i class="fa fa-map-marker"></i> Flat # 304 3rd Floor Noor Mobile Mall 6th Road Rawalpindi</p>
										<p>Rawalpindi, Punjab, Pakistan,46000</p>

										<div class="action-btn text-center">
											<button class="btn" data-toggle="modal" href='#modal-editAddress'><i class="fa fa-edit"></i> Edit</button>
											<button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
										</div>
									</div>
								</div>
							</div>
							<!-- Add New Address Modal -->

							<div class="modal fade" id="modal-addAddress">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header d-flex justify-content-between">
											<h4 class="modal-title"><strong>Add New Address</strong></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
											<form method="post">
												<div class="form-group">
													<label>Full name</label>
													<input type="text" name="full_name" class="form-control" placeholder="Full Name">
												</div>
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="phone_name" class="form-control" placeholder="Phone Number">
												</div>
												<div class="form-group">
													<label>Full address</label>
													<input type="text" name="full_address" class="form-control" placeholder="Full address">
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Country</label>
															<input type="text" name="country" placeholder="Country" class="form-control">
														</div>
														<div class="col-md-6">
															<label>State</label>
															<input type="text" name="state" placeholder="State" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>City</label>
															<input type="text" placeholder="City" name="city" class="form-control">
														</div>
														<div class="col-md-6">
															<label class="control-label">Zip Code</label>
															<input type="text" name="zip_code" placeholder="Zip Code" class="form-control">
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary btn-style-one">Save</button>
										</div>
									</div>
								</div>
							</div>
							<!-- End Add New Address -->
							<!-- Add New Address Modal -->

							<div class="modal fade" id="modal-editAddress">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header d-flex justify-content-between">
											<h4 class="modal-title"><strong>Edit Address</strong></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
											<form method="post">
												<div class="form-group">
													<label>Full name</label>
													<input type="text" name="full_name" class="form-control" placeholder="Full Name">
												</div>
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="phone_name" class="form-control" placeholder="Phone Number">
												</div>
												<div class="form-group">
													<label>Full address</label>
													<input type="text" name="full_address" class="form-control" placeholder="Full address">
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Country</label>
															<input type="text" name="country" placeholder="Country" class="form-control">
														</div>
														<div class="col-md-6">
															<label>State</label>
															<input type="text" name="state" placeholder="State" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>City</label>
															<input type="text" placeholder="City" name="city" class="form-control">
														</div>
														<div class="col-md-6">
															<label class="control-label">Zip Code</label>
															<input type="text" name="zip_code" placeholder="Zip Code" class="form-control">
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary btn-style-one">Save</button>
										</div>
									</div>
								</div>
							</div>
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
<script>
  $('.nav-tabs-dropdown')
    .on("click", "li:not('.active') a", function(event) {  $(this).closest('ul').removeClass("open");
    })
    .on("click", "li.active a", function(event) {        $(this).closest('ul').toggleClass("open");
    });
</script>
    
@endsection