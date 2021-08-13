@extends('admin.layouts.master')

@section('title') Product Condition @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title')  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent





    <div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="col-12">
            {!!Session::get('message')!!}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/productColor-store')}}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <h1>Product Condition</h1>
                        <!-- One "tab" for each step in the form: -->

                         <div class="tab" id="moreAdd">

                            <div class="form-group row" id="field_wrapper2">

                                <div class="col-md-12">
                                    <div class="row">
                                    @foreach ($colors as $key0=>  $color)


                                        <div class="col-md-6">
                                        <label for="example-text-input" class=" col-form-label">Color Name</label>
                                        <input class="form-control"  name="color_name[]" type="text" placeholder="Enter mobile color name"   value="{{ $color->color_name }}" @ id="example-text-input">
                                        <span class="text-danger">{{ $errors->first('color_name') }}</span>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="example-text-input" class="col-form-label">Image</label>
                                        <input class="form-control" name="image[0][]"  multiple type="file" value="{{ $color->image }}" id="image-input">
                                        <span class="text-danger">{{ $errors->first('image') }}</span>

                                    </div>

                                @endforeach
                            </div>

                                <hr>

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

    $(document).ready(function(){
        //group add limit
        var maxField2 = 4; //Input fields increment limitation
        var addButton2 = $('#add_button2'); //Add button selector
        var wrapper2 = $('#field_wrapper2');
        //Input field wrapper
         var x=0;



//    condition section

    $(document).on('click','.addMoreCondition',function(e){
		// alert('asdasd');

        console.log($(e.target).closest('.add_condition').children()[0]);

      var conditionid= $(e.target).closest('.addCondition').children()[0].id;
      console.log(conditionid);

      var storeindex = conditionid.slice(13,14);
      var storeindex2 = conditionid.slice(14,15);
       alert(storeindex);
        x++;
        // console.log(
         var storageid= $(e.target).closest('.addstorage').find('input').val();




        var  maxField=5;
		var childern =	$(e.target).closest('.add_condition').find('#'+storeindex).children().length;
        //   alert(storeindex);
			if(x < maxField ){
                // alert(childern);
				var fieldHTML = '   <div class="col-md-6">'+
                                       ' <label for="example-text-input" class=" col-form-label">Color Name</label>'+
                                        '<input class="form-control"  name="color_name[]" type="text" placeholder="Enter mobile color name"  @if(old('color_name')) value="{{ old('color_name') }}" @endif  id="example-text-input">'+
                                        '<span class="text-danger">{{ $errors->first('color_name') }}</span>'+

                                   ' </div>'
                                   ' <div class="col-md-6">'+
                                       ' <label for="example-text-input" class="col-form-label">Image</label>'+
                                       ' <input class="form-control" name="image[0][]"  multiple type="file"   @if(old('image'))  @endif  id="image-input">'+
                                        '<span class="text-danger">{{ $errors->first('image') }}</span>'+

                                   ' </div>';
				//$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
				$(e.target).closest('.addCondition').find('#'+conditionid).append(fieldHTML);
			}
	});


     $(document).on('click', '.removeCondition', function(e){
            e.preventDefault();
         console.log($(this).parents('.remove_condition'));

         $(this).parents('.remove_condition').remove(); //Remove field html
            x--; //Decrement field counter
        });




});

    </script>




@endsection

