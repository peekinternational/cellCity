@extends('admin.layouts.master')

@section('title') Product @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Product Add  @endslot
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
                                        <form action="{{url('admin/product')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="image[]" type="file" placeholder="Enter Brand Name" multiple  @if(old('image')) value="{{ old('image') }}" @endif  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Brands</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="brand" id="brand" onchange="getModel(this)">
                                                    <option selected="">Select Brand</option>
                                                    @foreach(CityClass::brands() as $brand)
                                                     <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>
    
                                            </div>
                                        </div>
                                        <div class="form-group row" id="showModels">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Models</label>
                                        <div class="col-md-10">
                                            <select class="form-control selectpic" name="model_Id"  required="" onchange="getRepair(this)">
                                                <option selected="">Select Model</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Storage</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="storage" id="storage">
                                                    <option selected="">Select Storage</option>
                                                    <option value="256GB">256 GB</option>
                                                    <option value="128GB">128 GB</option>
                                                    <option value="64GB">64 GB</option>
                                                    <option value="32GB">32 GB</option>
                                                    <option value="16GB">16 GB</option>
                                                    <option value="8GB">8 GB</option>
                                                    <option value="4GB">4 GB</option>
                                                    <option value="2GB">2 GB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Ram</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="ram" id="ram">
                                                    <option selected="">Select Memory</option>
                                                    <option value="64GB">64 GB</option>
                                                    <option value="32GB">32 GB</option>
                                                    <option value="16GB">16 GB</option>
                                                    <option value="8GB">8 GB</option>
                                                    <option value="6GB">6 GB</option>
                                                    <option value="4GB">4 GB</option>
                                                    <option value="2GB">2 GB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Locked Or UnLocked</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="locked" id="locked">
                                                    <option selected="">Select Any One</option>
                                                    <option value="locked">Locked</option>
                                                    <option value="unlocked">UnLocked</option>
                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Category</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="category" id="category">
                                                    <option selected="">Select Any One</option>
                                                    <option value="phone">Phone</option>
                                                    <option value="accessory">Accessory</option>
                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">OS</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="OS" id="OS">
                                                    <option selected="">Select Any One</option>
                                                    <option value="andriod phone">Andriod Phone</option>
                                                    <option value="window phone">Window Phone</option>
                                                    <option value="apple phone">Apple Phone</option>
                                                    <option value="all smartphone">All Smartphone</option>
                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Quantity</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="quantity" type="number" placeholder="Enter mobile quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Colors</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="colors" type="text" placeholder="Enter mobile colors"  @if(old('colors')) value="{{ old('colors') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('colors') }}</span>
                                            </div>
                                        </div>
                              
                                       
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Warranty</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="warranty" type="text" placeholder="Enter mobile warranty"  @if(old('warranty')) value="{{ old('warranty') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('warranty') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Sell Price</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="sell_price" type="number" placeholder="Enter mobile Sell Price"  @if(old('sell_price')) value="{{ old('sell_price') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('sell_price') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Original Price</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="original_price" type="text" placeholder="Enter mobile Original Price"  @if(old('original_price')) value="{{ old('original_price') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('original_price') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Camera</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="cameraMp" type="text" placeholder="Enter mobile cameraMp"  @if(old('cameraMp')) value="{{ old('cameraMp') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('cameraMp') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">LCD(Display)</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="display" type="text" placeholder="Enter mobile display"  @if(old('display')) value="{{ old('display') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('display') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Resolution</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="resolution" type="text" placeholder="Enter mobile resolution"  @if(old('resolution')) value="{{ old('resolution') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('resolution') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="desc" type="text" placeholder="Enter Brand Name"  @if(old('desc')) value="{{ old('desc') }}" @endif  id="example-text-input"></textarea>
                                                <span class="text-danger">{{ $errors->first('desc') }}</span>
                                            </div>
                                        </div>


                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
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

<script type="text/javascript">
    $(function() {
  $('.selectpic').select2();
});

function getModel(event)
{

    // alert($(event).val());
    $("#priceDetails").empty();
    $("#PmodelName").empty();
    $("#totalCost").empty();

    var brand = $(event).val().split(',');
    var id = brand[0];
    var  brandName = brand[1];
    // alert(brand[0]);

    // $('#brand_name').html('<h5>Brand Name :<b>'+brandName+'</b></h5>');
    $('#model-repair').hide();
    //    var id =$(event).val();
  $.ajax({
        url: "{{url('admin/product/getModels')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#exampleModal'+id).modal('show');
        },

       });

}





// $(function(){
//     var dtToday = new Date();

//     var month = dtToday.getMonth() + 1;
//     var day = dtToday.getDate();
//     var year = dtToday.getFullYear();
//     if(month < 10)
//         month = '0' + month.toString();
//     if(day < 10)
//         day = '0' + day.toString();

//     var maxDate = year + '-' + month + '-' + day;

//     // or instead:
//     // var maxDate = dtToday.toISOString().substr(0, 10);
//     // alert(maxDate);
//     $('#txtDate').attr('min', maxDate);
// });


/// Cart

</script>

@endsection