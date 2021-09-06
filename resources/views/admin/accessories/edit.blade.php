@extends('admin.layouts.master')

@section('title') Customer Add @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Customer Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

                        <div class="row">
                              @if(Session::has('message'))
                              <div class="col-12">
                                  {!!Session::get('message')!!}
                              </div>
                              @endif
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.accessory.update',$accessory->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Brand</label>
                                                <div class="col-md-10">
                                                <select name="brand_id"  class="form-control selectpic" onchange="getModel(this)">
                                                    <option>select anyone</option>
                                                    @foreach (CityClass::brands() as $brand)
                                                    <option value="{{$brand->id}}" {{ $brand->id == $accessory->models->brand_Id ? 'selected' : '' }}>{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Model</label>
                                                <div class="col-md-10" id="showModels">
                                                    <select name="model_id" id="" class="form-control selectpic" >
                                                     <option value="{{$model->id}}">{{$model->model_name}}</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-email-input" class="col-md-2 col-form-label">Category</label>
                                                <div class="col-md-10">
                                                    <select name="category"  class="form-control selectpic">
                                                       <option>select anyone</option>
                                                       <option value="charger" {{$accessory->category =='charger' ? 'selected' : ''}}>Charger</option>
                                                       <option value="protector" {{$accessory->category == 'protector'  ? 'selected' : ''}} >Screen Protector</option>
                                                       <option value="cables" {{$accessory->category == 'cables'  ? 'selected' : ''}} >Cable</option>
                                                       <option value="battery" {{$accessory->category == 'battery'  ? 'selected' : ''}} >Battery</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="name" type="text" placeholder="Enter name"  value="{{ $accessory->name }}"   name="name" id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">Sell Price</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="number" placeholder="Enter Sell Price"  value="{{ $accessory->sell_price }}" name="sell_price" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('sell_price') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label"> Original Price</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="number" placeholder="Enter orig_price"  value="{{ $accessory->orig_price }}" name="orig_price" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('orig_price') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label"> Quantity</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="number" placeholder="Enter quantity" value="{{$accessory->quantity}}" name="quantity" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label">Description</label>
                                                <div class="col-md-10">
                                                    <textarea type="text" name="description" class="form-control" cols="30" rows="10">{{ $accessory->description }}</textarea>
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label"> Images</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="file"  name="images[]" multiple id="profile-img">
                                                    <span class="text-danger">{{ $errors->first('images') }}</span>
                                                    <div id="imagShow">
                                                        @foreach ($images as $img)
                                                        <img src="{{  asset('/storage/accessories/images/'.$img->images)}} " id="profile-img-tag" width="150px" height="100px">
                                                        @endforeach
                                                    </div>
                                                    <div class="gallery">
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
    $(function() {
$('.selectpic').select2();
});

</script>

<script>
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            $(".gallery").empty();
            $('#imagShow').hide();
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };


    $('#profile-img').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#profile-img-tag').attr('src', e.target.result);
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // $("#profile-img").change(function(){
    //     readURL(this);
    // });


    function getModel(event)
    {
        var id = $(event).val();
        $.ajax({
        url: "{{url('admin/accessory/getModels')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
        },

       });
    }
</script>
@endsection
