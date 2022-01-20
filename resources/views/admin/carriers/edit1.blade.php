@extends('admin.layouts.master')

@section('title') Carriers Update @endsection
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
         @slot('title') Carriers Update @endslot
         @slot('li_1')  @endslot
         @slot('li_2')  @endslot
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
                                        <form id="updateForm" action="{{route('admin.icarriers.update',$icarrier)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('PUT')

                                        <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Country</label>
                                                <div class="col-md-10">
                                                   <select class="form-control" name="country">
                                                    <option value="" selected>Select Country</option>
                                                       <option value="Cuba,CU" {{$icarrier->country.','.$icarrier->country_class == 'Cuba,CU' ? 'selected': ''}}>Cuba</option>
                                                       <option value="Dominican Republic,DO" {{$icarrier->country.','.$icarrier->country_class == 'Dominican Republic,DO' ? 'selected': ''}}>Dominican</option>
                                                       <option value="El Salvador,SV" {{$icarrier->country.','.$icarrier->country_class == 'El Salvador,SV' ? 'selected': ''}}>El Salvador</option>
                                                       <option value="Guatemala,GT" {{$icarrier->country.','.$icarrier->country_class == 'Guatemala,GT' ? 'selected': ''}}>Guatemala</option>
                                                       <option value="Haiti,HT" {{$icarrier->country.','.$icarrier->country_class == 'Haiti,HT' ? 'selected': ''}}>Haiti</option>
                                                       <option value="Honduras,HN" {{$icarrier->country.','.$icarrier->country_class == 'Honduras,HN' ? 'selected': ''}}>Honduras</option>
                                                       <option value="Jamaica,JM" {{$icarrier->country.','.$icarrier->country_class == 'Jamaica,JM' ? 'selected': ''}}>Jamaica</option>
                                                       <option value="Mexico,MX" {{$icarrier->country.','.$icarrier->country_class == 'Mexico,MX' ? 'selected': ''}}>Mexico</option>
                                                       <option value="Puerto Rico,PR" {{$icarrier->country.','.$icarrier->country_class == 'Puerto Rico,PR' ? 'selected': ''}}>Puerto</option>
                                                       <option value="Trinidad and Tobago,TT" {{$icarrier->country.','.$icarrier->country_class == 'Trinidad and Tobago,TT' ? 'selected': ''}}>Trinidad and Tobago</option>
                                                   </select>
                                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="image" onchange="readURL(this);" type="file" placeholder="Enter image"  @if(old('image')) value="{{ old('image') }}" @endif  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    <img id="blah" src="{{asset($icarrier->image)}}" alt="your image" width="150px" height="150px"/>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">

                                                <input class="form-control" name="name" type="text" placeholder="Enter  Name"  @if(old('name'))  @endif value="{{$icarrier->name}}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                             
                                                <input type="text" class="form-control" value="{{$icarrier->price}}" name="price"  data-role="tagsinput" >
                                           
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Min Limit</label>
                                            <div class="col-md-10">
                                             
                                                <input type="text" class="form-control" value="{{$icarrier->min_limit}}" name="min_limit" >
                                           
                                                <span class="text-danger">{{ $errors->first('min_limit') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Max Limit</label>
                                            <div class="col-md-10">
                                             
                                                <input type="text" class="form-control" value="{{$icarrier->max_limit}}" name="max_limit">
                                           
                                                <span class="text-danger">{{ $errors->first('max_limit') }}</span>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Tax</label>
                                            <div class="col-md-10">

                                                <input class="form-control" name="tax" type="text" placeholder="Enter Tax"  @if(old('tax'))  @endif value="{{$icarrier->tax}}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('tax') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Package Type</label>
                                            <div class="col-md-10 p-2">
                                                <input type="radio" name="package_type" value="fixed" {{$icarrier->package_type == 'fixed' ? 'checked' : ''}}> Fixed
                                                <input type="radio" name="package_type" value="custom"{{$icarrier->package_type == 'custom' ? 'checked' : ''}}> Custom
                                                <span class="text-danger">{{ $errors->first('package_type') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Phone Codes</label>
                                            <div class="col-md-10">
                                          
                                                <input type="text" class="form-control" placeholder="Enter Phone Codes" value="{{$icarrier->phone_codes}}" name="phone_codes"  data-role="tagsinput">
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                        <button type="button" id="updateButton" class="btn btn-primary waves-effect waves-light">Update</button>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <!-- end row -->
@endsection
@section('script')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
