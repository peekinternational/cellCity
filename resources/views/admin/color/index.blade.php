@extends('admin.layouts.master')

@section('title') Product Color @endsection

@section('content')
    @component('admin.common-components.breadcrumb')
        @slot('title') @endslot
        @slot('li_1') @endslot
        @slot('li_2')@endslot
    @endcomponent





    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="col-12">
                    {!! Session::get('message') !!}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/productColor-store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <h1>Product Color & Image</h1>

                        <div class="tab" id="">Color and Image

                            <div id="field_wrapper2">
                                <div class="form-group row">
                                    {{-- <input type="hidden" name="product_id" id="product_id" value="product_id"> --}}

                                    <div class="col-md-12">

                                        @foreach ($colors as $key0 => $color)
                                            @php
                                                $images = App\Models\ProductImage::where('color_id', $color->id)->first();
                                                $storage = App\Models\ProductStorage::where('color_id', $color->id)->get();

                                            @endphp
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label for="example-text-input" class=" col-form-label">Color
                                                        Name</label>
                                                    <input class="form-control" name="color_name[]" type="text"
                                                        placeholder="Enter mobile color name"
                                                        value="{{ $color->color_name }}" id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('color_name') }}</span>
                                                    <input type="hidden" name="color_id[]" value="{{$color->id}}">
                                                    <input type="hidden" name="image_id[{{$key0}}][]" value="{{$images->id}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="example-text-input" class="col-form-label">Image</label>
                                                    <input class="form-control" name="image[{{$key0}}][]" multiple type="file"
                                                        @if (old('image'))  @endif id="image-input">
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>

                                                </div>
                                                <div class="col-md-4" style="text-align: center;">
                                                    @if ($loop->index + 1 == 1)
                                                        <a href="javascript:void(0)" class="btn btn-primary addMoreColor"
                                                            id="addMoreColor" style="margin-top: 36px;"><span
                                                                class="glyphicon glyphicon glyphicon-plus"
                                                                aria-hidden="true"></span> Add Color</a>
                                                        {{-- <a href="{{url('admin/productStorage-delete',$storag->id)}}" class="btn btn-danger " style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a> --}}
                                                    @else
                                                        <a href="{{ route('admin.remove.color', $color->id) }}"
                                                            class="btn btn-success " style="margin-top: 36px;"><span
                                                                class="glyphicon glyphicon glyphicon-plus"
                                                                aria-hidden="true"></span> Remove Color</a>
                                                        <a href="javascript:void(0)" class="btn btn-info addMoreStorage"
                                                            style="margin-top: 36px;"><span
                                                                class="glyphicon glyphicon glyphicon-plus"
                                                                aria-hidden="true"></span> Add Storage</a>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="addstorage" id="addstorage">
                                                <div class="add_storage">
                                                    @foreach ($storage as $key => $storag)
                                                        @php
                                                            $condition = App\Models\ProductCondition::where('storage_id', $storag->id)->get();
                                                        @endphp
                                                        <div id="add_storage0">
                                                            <div class="row">

                                                                <div class="input-group">
                                                                    <input type="hidden" name="storage_id[{{ $key0 }}][]" value="{{$storag->id}}">
                                                                    <input type="hidden" name="addMoreStorage0" value="0"
                                                                        id="addMoreStorage0">
                                                                    <div class="col-md-8">
                                                                        <label for="example-text-input"
                                                                            class="col-form-label">Storage</label>
                                                                        <select class="form-control" name="storage[{{ $key0 }}][]">
                                                                            <option selected>Select Memory</option>
                                                                            <option value="256 GB"
                                                                                {{ $storag->storage == '256 GB' ? 'selected' : '' }}>
                                                                                256 GB</option>
                                                                            <option value="128 GB"
                                                                                {{ $storag->storage == '128 GB' ? 'selected' : '' }}>
                                                                                128 GB</option>
                                                                            <option value="64 GB"
                                                                                {{ $storag->storage == '64 GB' ? 'selected' : '' }}>
                                                                                64 GB</option>
                                                                            <option value="32 GB"
                                                                                {{ $storag->storage == '32 GB' ? 'selected' : '' }}>
                                                                                32 GB</option>
                                                                            <option value="16 GB"
                                                                                {{ $storag->storage == '16 GB' ? 'selected' : '' }}>
                                                                                16 GB</option>
                                                                            <option value="8 GB"
                                                                                {{ $storag->storage == '8 GB' ? 'selected' : '' }}>
                                                                                8 GB</option>

                                                                        </select>

                                                                    </div>
                                                                    <div class="col-md-4" style="text-align: center;">
                                                                        @if ($loop->index + 1 == 1)
                                                                            <a href="javascript:void(0)"
                                                                                class="btn btn-info addMoreStorage"
                                                                                style="margin-top: 36px;"><span
                                                                                    class="glyphicon glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span> Add
                                                                                Storage</a>
                                                                            <a href="{{ url('admin/productStorage-delete', $storag->id) }}"
                                                                                class="btn btn-danger "
                                                                                style="margin-top: 36px;"><span
                                                                                    class="glyphicon glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span> Remove</a>
                                                                        @else
                                                                            {{-- <a href="#" class="btn btn-danger "
                                                                                style="margin-top: 36px;"><span
                                                                                    class="glyphicon glyphicon glyphicon-plus"
                                                                                    aria-hidden="true"></span> Remove
                                                                                Storage</a> --}}
                                                                        @endif
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="add_condition">
                                                            <div class="add_condition">
                                                                @foreach ($condition as $condit)

                                                                    <div class="row" id="add_condition0">
                                                                        <div class="input-group">
                                                                            <div class="col-md-3">
                                                                                <input type="hidden" name="condition_id[{{ $key0 }}][{{$key}}][]" value="{{ $condit->id}}">
                                                                                <label for="example-text-input"
                                                                                    class="col-form-label">Condition</label>
                                                                                <select class="form-control"
                                                                                    name="condition[{{ $key0 }}][{{$key}}][]" id="condition">
                                                                                    <option selected>Select Any One</option>
                                                                                    <option value="fair"
                                                                                        {{ $condit->condition == 'fair' ? 'selected' : '' }}>
                                                                                        fair</option>
                                                                                    <option value="good"
                                                                                        {{ $condit->condition == 'good' ? 'selected' : '' }}>
                                                                                        good</option>
                                                                                    <option value="excellent"
                                                                                        {{ $condit->condition == 'excellent' ? 'selected' : '' }}>
                                                                                        excellent</option>

                                                                                </select>

                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label for="example-text-input"
                                                                                    class="col-form-label">Price</label>
                                                                                <input class="form-control"
                                                                                    name="price[{{ $key0 }}][{{$key}}][]" type="number"
                                                                                    placeholder="Enter mobile Price"
                                                                                    value="{{ $condit->price }}"
                                                                                    id="example-text-input">
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('price') }}</span>
                                                                            </div>
                                                                            <input type="hidden" name="addMoreCondition0"
                                                                                value="0" id="addMoreCondition0">

                                                                            <div class="col-md-3">
                                                                                <label for="example-text-input"
                                                                                    class="col-form-label">Quantity</label>
                                                                                <input class="form-control"
                                                                                    name="quantity[{{ $key0 }}][{{$key}}][]" type="number"
                                                                                    placeholder="Enter mobile Quantity"
                                                                                    value="{{ $condit->quantity }}"
                                                                                    id="example-text-input">
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('quantity') }}</span>
                                                                            </div>
                                                                            <div class="col-md-3"
                                                                                style="text-align: center;">
                                                                                @if ($loop->index + 1 == 1)
                                                                                    <a href="javascript:void(0)"
                                                                                        class="btn btn-success addMoreCondition" id="addMoreCondition"
                                                                                        style="margin-top: 36px;"><span
                                                                                            class="glyphicon glyphicon glyphicon-plus"
                                                                                            aria-hidden="true"></span> Add
                                                                                        Condition</a>
                                                                                    <a href="{{ route('admin.condition.remove', $condit->id) }}"
                                                                                        class="btn btn-danger "
                                                                                        style="margin-top: 36px;"><span
                                                                                            class="glyphicon glyphicon glyphicon-plus"
                                                                                            aria-hidden="true"></span>
                                                                                        Remove</a>

                                                                                @else

                                                                                    <a href="{{ route('admin.condition.remove', $condit->id) }}"
                                                                                        class="btn btn-secondary "
                                                                                        style="margin-top: 36px;"><span
                                                                                            class="glyphicon glyphicon glyphicon-plus"
                                                                                            aria-hidden="true"></span>
                                                                                        Remove Condition</a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                        <hr>
                                                    @endforeach



                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
@section('script')

    <script type="text/javascript">


    </script>



    {{-- nested add field storage --}}
    <script type="text/javascript">
        $(document).ready(function() {
            //color

            var addButton2 = $('#addMoreColor'); //Add button selector
            var wrapper2 = $('#field_wrapper2');
            //Input field wrapper
            var x = 0;



            //    condition section

            $(document).on('click', '.addMoreColor', function(e) {
                // alert('asdasd');

                x++;
                var maxField = 3;
                // var childern = $(e.target).closest('.add_condition').find('#' + storeindex).children()

                // alert(maxField);
                if (x < maxField) {
                    // alert(childern);
                    var fieldHTML2 = '<div  id="removeColor"><div class="row"><div class="col-md-4">' +
                        '<label for="example-text-input" class=" col-form-label">Color Name</label>' +
                        '<input class="form-control"  name="color_name[]" type="text" placeholder="Enter mobile color name"    id="example-text-input">' +
                        ' </div>' +
                        ' <div class="col-md-4">' +
                        ' <input type="hidden" name="color_id[]" value="null">'+
                        '<input type="hidden" name="image_id[][]" value="null">'+
                        ' <label for="example-text-input" class="col-form-label">Image</label>' +
                        '<input class="form-control" name="image['+x+'][]"  multiple type="file"   @if (old('image'))  @endif  id="image-input">' +
                        ' </div>' +
                        ' <div class="col-md-4" style="text-align: center;">' +
                        '<a href="javascript:void(0)" class="btn btn-success  removeColor" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Color</a>' +
                        ' <a href="javascript:void(0)" class="btn btn-info addMoreStorage" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage # 1</a>' +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '<div class="addstorage" id="addstorage">' +
                        '<div class="add_storage">' +
                        '<div id="add_storage0">' +
                        '<div class="row">' +
                        '<div class="input-group" >' +
                        '<input type="hidden" name="addMoreStorage0" value="0" id="addMoreStorage0">' +
                        ' <input type="hidden" name="storage_id[][]" value="null">'+
                        '<div class="col-md-8">' +
                        '<label for="example-text-input" class="col-form-label">Storage</label>' +
                        '<select class="form-control" name="storage['+x+'][]" >' +
                        ' <option selected>Select Memory</option>' +
                        '<option value="256 GB">256 GB</option>' +
                        '<option value="128 GB">128 GB</option>' +
                        '<option value="64 GB">64 GB</option>' +
                        ' <option value="32 GB">32 GB</option>' +
                        '<option value="16 GB">16 GB</option>' +
                        '<option value="8 GB">8 GB</option>' +

                        '</select>' +
                        '</div>' +
                        ' <div class="col-md-4" style="text-align: center;">' +
                        '<a href="javascript:void(0)" class="btn btn-info addMoreStorage" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage</a>' +

                        ' </div>' +
                        '</div>' +
                        '</div>' +
                        ' </div>' +
                        '<div class="add_condition">' +
                        '<div class="add_condition">' +
                        '<div class="row" id="add_condition0">' +
                        '<div class="input-group">' +
                        '<div class="col-md-3">' +
                        '<label for="example-text-input" class="col-form-label">Condition</label>' +

                        '<select class="form-control"  name="condition[][][]" id="condition">' +
                        '<option selected>Select Any One</option>' +
                        '<option value="fair" >fair</option>' +
                        '<option value="good" >good</option>' +
                        '<option value="excellent" >excellent</option>' +
                        '</select>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<label for="example-text-input" class="col-form-label">Price</label>' +
                        '<input class="form-control"  name="price[][][]" type="number" placeholder="Enter mobile Price" id="example-text-input">' +

                        '</div>' +
                        '<input type="hidden" name="addMoreCondition0" value="0" id="addMoreCondition0">' +

                        '<div class="col-md-3">' +
                        '<label for="example-text-input" class="col-form-label">Quantity</label>' +
                        '<input class="form-control"  name="quantity[][][]" type="number" placeholder="Enter mobile Quantity"   id="example-text-input">' +
                        '<input type="hidden" name="condition_id[][][]" value="null">'+
                        '</div>' +
                        '<div class="col-md-3" style="text-align: center;">' +
                        ' <a href="javascript:void(0)" class="btn btn-warning addMoreCondition" id="addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition</a>' +
                        '</div>' +
                        '</div>' +
                        ' </div>' +

                        '</div>' +

                        '</div>' +
                        '<hr>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $(wrapper2).append(fieldHTML2);
                }
            });


            $(document).on('click', '.removeColor', function(e) {
                e.preventDefault();
                console.log($("#removeColor"));

                $("#removeColor").remove(); //Remove field html
                x--; //Decrement field counter
            });




        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            var addButton2 = $('#add_button2'); //Add button selector
            var wrapper2 = $('#field_wrapper2');
            //Input field wrapper
            var x = 0;
            var y = 0;
            var z = 0;

            $(document).on('click', '.addMoreStorage', function(e) {
                // alert(product);
                y++;
                console.log($(e.target).closest('.add_storage').children()[0]);

                var storageid = $(e.target).closest('.add_storage').children()[0].id;
                console.log(storageid);

                var storageindex = y;

                var maxField = 3;
                // var childern = $(e.target).find('#' + storageindex).children().length;
                //  alert(childern);
                if (y < maxField) {
                    // alert(childern);
                    var fieldHTML = '<div class="add_storage"> <div class="row " id="add_storage' + y +'"><div class="input-group">' +
                        '<div class="col-md-8">' +
                        '<label for="example-text-input" class="col-form-label">Storage</label>' +
                        '<select class="form-control" name="storage[0][]" >' +
                        '<option selected>Select Memory</option>' +
                        '<option value="256 GB">256 GB</option>' +
                        '<option value="128 GB">128 GB</option>' +
                        '<option value="64 GB">64 GB</option>' +
                        '<option value="32 GB">32 GB</option>' +
                        '<option value="16 GB">16 GB</option>' +
                        '<option value="8 GB">8 GB</option>' +
                        '</select>' +

                        '</div>' +
                        '<div class="col-md-4" style="text-align: center;"> ' +
                        '  <a href="javascript:void(0)" class="btn btn-danger remove_storage" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Storage </a>'+
                        ' </div>' +

                        '<div class="add_condition">' +
                        '<div class="row" id="add_condition' + storageindex + '">' +
                        '<div class="input-group">' +
                        ' <div class="col-md-3">' +
                        ' <label for="example-text-input" class="col-form-label">Condition</label>' +
                        ' <select class="form-control"  name="condition[' + storageindex +'][]" id="condition">' +
                        '  <option selected>Select Any One</option>' +
                        '  <option value="fair">fair</option>' +
                        '  <option value="good">good</option>' +
                        '  <option value="excellent">excellent</option>' +
                        ' </select> ' +
                        ' </div>' +
                        ' <div class="col-md-3">' +
                        ' <label for="example-text-input" class="col-form-label">Price</label>' +
                        ' <input class="form-control"  name="price[' + storageindex +'][]" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                        ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                        ' </div><div class="col-md-3">' +
                        ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                        ' <input class="form-control"  name="quantity[' + storageindex +'][]" type="number" placeholder="Enter mobile Quantity"   id="example-text-input">' +
                        '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                        ' </div>' +
                        '<div class="col-md-3" style="text-align:center"> ' +
                        ' <a href="javascript:void(0)" class="btn btn-warning addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # '+ storageindex + '</a>' +
                        ' </div>' +
                        ' </div>' +
                        ' </div>' +
                        ' </div>' +
                        '</div>';
                    //$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
                    $('#addstorage').append(fieldHTML);
                }
            });

            $(document).on('click', '.remove_storage', function(e) {

                e.preventDefault();
                console.log($(this).parents('.removeStorage'));

                $(this).parents('.add_storage').remove(); //Remove field html
                y--; //Decrement field counter
            });


            //    condition section

            $(document).on('click', '.addMoreCondition', function(e) {
                // alert('asdsad');

                console.log($(e.target).closest('.add_condition').children()[0]);

                var conditionid = $(e.target).closest('.add_condition').children()[0].id;
                console.log(conditionid);
                alert(conditionid);
                var storeindex = conditionid.slice(13, 14);
                        console.log(storeindex);

                var maxField = 3;
                var childern = $(e.target).closest('.add_condition').find('#'+storeindex).children()
                    .length;
                //   alert(storeindex);
                if (y < maxField) {
                    // alert(childern);
                    var fieldHTML = ' <div class="remove_condition"><div class="row" id="add_condition' +
                        storeindex + '"><div class="input-group">' +
                        ' <div class="col-md-3">' +
                        ' <label for="example-text-input" class="col-form-label">Condition</label>' +
                        ' <select class="form-control"  name="condition[' + storeindex +
                        '][]" id="condition">' +
                        '  <option selected>Select Any One</option>' +
                        '  <option value="fair">fair</option>' +
                        '  <option value="good">good</option>' +
                        '  <option value="excellent">excellent</option>' +
                        ' </select> ' +
                        ' </div>' +
                        ' <div class="col-md-3">' +
                        ' <label for="example-text-input" class="col-form-label">Price</label>' +
                        ' <input class="form-control"  name="price[' + storeindex +
                        '][]" type="number" placeholder="Enter mobile Price"  @if (old('price')) value="{{ old('price') }}" @endif  id="example-text-input">' +
                        ' <span class="text-danger">{{ $errors->first('price') }}</span>' +
                        ' </div>    <div class="col-md-3">' +
                        ' <label for="example-text-input" class="col-form-label">Quantity</label>' +
                        ' <input class="form-control"  name="quantity[' + storeindex +
                        '][]" type="number" placeholder="Enter mobile Quantity"  @if (old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">' +
                        '  <span class="text-danger">{{ $errors->first('quantity') }}</span>' +
                        ' </div>' +
                        '<div  class="col-md-3" style="text-align:center"> ' +
                        ' <a href="javascript:void(0)" class="btn btn-secondary removeCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#' +
                        storeindex + '</a>' +
                        ' </div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    //$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
                    $(e.target).closest('.form-group').find('#' + conditionid).append(fieldHTML);
                }
            });


            $(document).on('click', '.removeCondition', function(e) {
                e.preventDefault();
                console.log($(this).parents('.remove_condition'));

                $(this).parents('.remove_condition').remove(); //Remove field html
                y--; //Decrement field counter
            });




        });
    </script>

@endsection
