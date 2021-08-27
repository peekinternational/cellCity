

  <form action="{{route('check.Address')}}" method="post">
    {{csrf_field()}}
    <div class="modal-body">

        <input type="hidden" name="address" value="exist">
        <input type="hidden" name="id" value="{{$address->id}}">

            <div class="form-group">
                <label>Full name</label>
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{$address->name}}" required="">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="mobileNo" class="form-control" placeholder="Phone Number" value="{{$address->mobileNo}}" required>
            </div>
            <div class="form-group">
                <label>Full address</label>
                <input type="text" name="shipaddress" class="form-control" placeholder="Full address" value="{{$address->shipaddress}}" required>
            </div>
            <div class="form-group">
                <label>Street Address</label>
                <input type="text" name="street_address" class="form-control" value="{{$address->street_address}}" placeholder="Street address" required>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Country</label>
                        <input type="text" name="country" placeholder="Country" class="form-control" value="{{$address->country}}" required>
                    </div>
                    <div class="col-md-6">
                        <label>State</label>
                        <input type="text" name="state" placeholder="State" class="form-control" value="{{$address->state}}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>City</label>
                        <input type="text" placeholder="City" name="city" class="form-control" value="{{$address->city}}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Zip Code</label>
                        <input type="text" name="zipcode" placeholder="Zip Code" class="form-control" value="{{$address->zipcode}}" required>
                    </div>
                </div>
            </div>

    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary btn-style-one">Next</button>
    </div>
    </form>
