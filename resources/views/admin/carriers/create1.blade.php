@extends('admin.layouts.master')

@section('title') Carriers @endsection
<style type="text/css">
.label-info {
    background-color: #5bc0de;
    border-radius: 4px;
    padding: 3px;
}
.bootstrap-tagsinput {
    width: 100%;
	}
</style>
@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Carriers Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
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
                                        <form action="{{url('admin/icarriers')}}" method="post" id="testForm" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                              <div class="form-group row">
                                                <label for="" class="col-md-2 col-form-label">Country</label>
                                                <div class="col-md-10">
                                                   <select class="form-control" name="country" required>
                                                    <option value="" selected>Select Country</option>
                                                       <option value="Cuba,CU">Cuba</option>
                                                       <option value="Dominican Republic,DO">Dominican</option>
                                                       <option value="El Salvador,SV">El Salvador</option>
                                                       <option value="Guatemala,GT">Guatemala</option>
                                                       <option value="Haiti,HT">Haiti</option>
                                                       <option value="Honduras,HN">Honduras</option>
                                                       <option value="Jamaica,JM">Jamaica</option>
                                                       <option value="Mexico,MX">Mexico</option>
                                                       <option value="Puerto Rico,PR">Puerto</option>
                                                       <option value="Trinidad and Tobago,TT">Trinidad and Tobago</option>
                                                   </select>
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-md-2 col-form-label">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="image" type="file" placeholder="Enter Brand Name"  @if(old('image')) value="{{ old('image') }}" @endif  id="" required>
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="name" type="text" placeholder="Enter Carrier Name"  @if(old('name')) value="{{ old('name') }}" @endif  id="" required>
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                          
                                                <input type="text" class="form-control" placeholder="Enter Price" name="price"  data-role="tagsinput">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Min Limit</label>
                                            <div class="col-md-10">
                                          
                                                <input type="text" class="form-control" placeholder="Enter Min Limit" name="min_limit" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Max Limit</label>
                                            <div class="col-md-10">
                                          
                                                <input type="text" class="form-control" placeholder="Enter Max Limit" name="max_limit" required>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Tax</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="tax" type="text" placeholder="Enter Carrier Tax"  @if(old('tax')) value="{{ old('tax') }}" @endif  id="" required>
                                                <span class="text-danger">{{ $errors->first('tax') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Package Type</label>
                                            <div class="col-md-10 p-2">
                                                <input type="radio" name="package_type" value="fixed" checked=""> Fixed
                                                <input type="radio" name="package_type" value="custom"> Custom
                                                <span class="text-danger">{{ $errors->first('package_type') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Phone Codes</label>
                                            <div class="col-md-10">
                                          
                                                <input type="text" class="form-control" placeholder="Enter Phone Codes" name="phone_codes"  data-role="tagsinput">
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                        <button type="submit" id="" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <!-- end row -->

@endsection

