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
                                        <form id="updateForm" action="{{route('admin.carriers.update',$carrier)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('PUT')


                                            <div class="form-group row">

                                                <label for="" class="col-md-2 col-form-label">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="image" onchange="readURL(this);" type="file" placeholder="Enter image"  @if(old('image')) value="{{ old('image') }}" @endif  id="" required>
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    <img id="blah" src="{{asset($carrier->image)}}" alt="your image" width="150px" height="150px"/>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">

                                                <input class="form-control" name="name" type="text" placeholder="Enter Carrier Name"  @if(old('name'))  @endif value="{{$carrier->name}}" id="" required>
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                             
                                                <input type="text" class="form-control" value="{{$carrier->price}}" name="price"  data-role="tagsinput" required >
                                           
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            </div>
                                        </div>
                                      <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Tax</label>
                                            <div class="col-md-10">

                                                <input class="form-control" name="tax" type="text" placeholder="Enter Tax"  @if(old('tax'))  @endif value="{{$carrier->tax}}" id="" required>
                                                <span class="text-danger">{{ $errors->first('tax') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">Package Type</label>
                                            <div class="col-md-10 p-2">
                                                <input type="radio" name="package_type" value="fixed" {{$carrier->package_type == 'fixed' ? 'checked' : ''}}> Fixed
                                                <input type="radio" name="package_type" value="custom"{{$carrier->package_type == 'custom' ? 'checked' : ''}}> Custom
                                                <span class="text-danger">{{ $errors->first('package_type') }}</span>
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
