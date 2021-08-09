@extends('admin.layouts.master')

@section('title') Product @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title')  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css" rel="stylesheet">

 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
  
  <style>
     
        
        #regForm {
          /* background-color: #ffffff;
          margin: 20px ;
          padding: 40px;
          width: 100%;
          min-width: 300px; */
        }
        
        h1 {
          text-align: center;  
        }
        
        input {
          padding: 10px;
          width: 100%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }
        
        /* Mark input boxes that gets an error on validation: */
        input.invalid {
          background-color: #ffdddd;
        }
        
        /* Hide all steps by default: */
        .tab {
          display: none;
        }
        
        button {
          background-color: #04AA6D;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          font-family: Raleway;
          cursor: pointer;
        }
        
        button:hover {
          opacity: 0.8;
        }
        
        #prevBtn {
          background-color: #bbbbbb;
        }
        
        /* Make circles that indicate the steps of the form: */
        .step {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbbbbb;
          border: none;  
          border-radius: 50%;
          display: inline-block;
          opacity: 0.5;
        }
        
        .step.active {
          opacity: 1;
        }
        
        /* Mark the steps that are finished and valid: */
        .step.finish {
          background-color: #04AA6D;
        }
        </style>

                         <div class="row">
                            <div class="col-12">
                                @if(Session::has('message'))
                                <div class="col-12">
                                    {!!Session::get('message')!!}
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{url('admin/product')}}" id="regForm" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            
                                                <h1>Product information</h1>
                                                <!-- One "tab" for each step in the form: -->
                                                <div class="tab">

                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Brands</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="brand" id="brand" onchange="getModel(this)">
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
                                                    <select class="form-control selectpic"  name="model_Id"  required="" onchange="getRepair(this)">
                                                        <option selected="">Select Model</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                                 <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Memory</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="memory" id="memory">
                                                            <option selected>Select Memory</option>
                                                            <option value="64 GB">64 GB</option>
                                                            <option value="32 GB">32 GB</option>
                                                            <option value="16 GB">16 GB</option>
                                                            <option value="8 GB">8 GB</option>
                                                            <option value="6 GB">6 GB</option>
                                                            <option value="4 GB">4 GB</option>
                                                            <option value="2 GB">2 GB</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Locked Or UnLocked</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="locked" id="locked">
                                                            <option selected>Select Any One</option>
                                                            <option value="Locked">Locked</option>
                                                            <option value="Unlocked">UnLocked</option>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Category</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="category" id="category">
                                                            <option selected>Select Any One</option>
                                                            <option value="phone">Phone</option>
                                                            <option value="accessory">Accessory</option>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">OS</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="OS" id="OS">
                                                            <option selected>Select Any One</option>
                                                            <option value="andriod phone">Andriod Phone</option>
                                                            <option value="window phone">Window Phone</option>
                                                            <option value="apple phone">Apple Phone</option>
                                                            <option value="all smartphone">All Smartphone</option>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                             
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Warranty</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control"  name="warranty" type="text" placeholder="Enter mobile warranty"  @if(old('warranty')) value="{{ old('warranty') }}" @endif  id="example-text-input">
                                                        <span class="text-danger">{{ $errors->first('warranty') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Screen Size</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control"  name="screen_size" type="text" placeholder="Enter mobile screen size"  @if(old('screen_size')) value="{{ old('screen_size') }}" @endif  id="example-text-input">
                                                        <span class="text-danger">{{ $errors->first('screen_size') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Screen Type</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control"  name="screen_type" type="text" placeholder="Enter mobile screen type"  @if(old('screen_type')) value="{{ old('screen_type') }}" @endif  id="example-text-input">
                                                        <span class="text-danger">{{ $errors->first('screen_type') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Megapixel</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control"  name="megapixel" type="text" placeholder="Enter mobile megapixel"  @if(old('megapixel')) value="{{ old('megapixel') }}" @endif  id="example-text-input">
                                                        <span class="text-danger">{{ $errors->first('megapixel') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Network</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="network" id="network">
                                                            <option selected>Select Any One</option>
                                                            <option value="2">GSM</option>
                                                            <option value="3">GSM/CDMA</option>
                                                            <option value="4">GSM/CDMA + Lite</option>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Sim Card Format</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="sim_card_format" id="sim_card_format">
                                                            <option selected>Select Any One</option>
                                                            <option value="nano">Nano</option>
                                                            <option value="mini">Mini</option>
                                                            <option value="micro">Micro</option>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Resolution</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="resolution" id="resolution">
                                                            <option selected>Select Any One</option>
                                                            <option value="828 x 1792">828 x 1792</option>
                                                            <option value="1125 x 2436">1125 x 2436	</option>
                                                            <option value="1242 x 2688">1242 x 2688	</option>
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Double Sim</label>
                                                    <div class="col-md-10">
                                                        <select class="form-control selectpic"  name="double_sim" id="double_sim">
                                                            <option selected>Select Any One</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Release Year</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control"  name="release_year" type="date" placeholder="Enter mobile release year"  @if(old('release_year')) value="{{ old('release_year') }}" @endif  id="example-text-input">
                                                        <span class="text-danger">{{ $errors->first('release_year') }}</span>
                                                    </div>
                                                </div>
                                             
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-md-2 col-form-label">Desciption</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control"  name="desc" type="text" placeholder="Write Something about mobile"  cols="20" rows="5"></textarea>
                                                    
                                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                                </div>
                                                </div>
                                            </div>
                                                <div class="tab">Color and Image
                                                   
                                                    <div class="form-group row" id="field_wrapper2">
                                                         
                                                        <div class="col-md-12">
                                                            <div class="col-md-12" style="text-align: right">
                                                                {{-- <input type="submit" name="loginBtn" id="loginBtn" value="Login" /> --}}
                                                               
                                                                {{-- <input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave"> --}}
                                                                <button type="button" id="NextSubmitBtn"  style="background:#0415aa">Add More</button>
                                                               </div>
                                                            <div class="row">
                                                                 
                                                                <div class="col-md-6">
                                                                <label for="example-text-input" class=" col-form-label">Color Name</label>
                                                                <input class="form-control"  name="color_name[]" type="text" placeholder="Enter mobile color name"  @if(old('color_name')) value="{{ old('color_name') }}" @endif  id="example-text-input">
                                                                <span class="text-danger">{{ $errors->first('color_name') }}</span>
                                                            
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="example-text-input" class="col-form-label">Image</label>
                                                                <input class="form-control" name="image[0][]"  multiple type="file"   @if(old('image'))  @endif  id="example-text-input">
                                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                                            
                                                            </div>
{{--                                                            
                                                            <div class="col-md-2" style="text-align: center;"> 
                                                                <a href="javascript:void(0)" class="btn btn-success" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                                            </div> --}}
                                                        </div>
                                                       <hr>
                                                       
                                                        <div class="addstorage" id="addstorage">
                                                            <div class="add_storage">
                                                        <div  id="add_storage0" >
                                                            <div class="row ">
                                                          <div class="input-group" >

                                                            <input type="hidden" name="addMoreStorage0" value="0" id="addMoreStorage0">
                                                            <div class="col-md-8">
                                                                <label for="example-text-input" class="col-form-label">Storage</label>
                                                                <select class="form-control" name="storage[0][]" >
                                                                    <option selected>Select Memory</option>
                                                                    <option value="256 GB">256 GB</option>
                                                                    <option value="128 GB">128 GB</option>
                                                                    
                                                                    <option value="64 GB">64 GB</option>
                                                                    <option value="32 GB">32 GB</option>
                                                                    <option value="16 GB">16 GB</option>
                                                                    <option value="8 GB">8 GB</option>
                                                                   
                                                                </select>
                                                           
                                                                </div>
                                                                <div class="col-md-4" style="text-align: center;"> 
                                                                    <a href="javascript:void(0)" class="btn btn-info addMoreStorage" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage # 1</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                                </div>
                                                    
                                                   
                                                    <hr>
                                                        <div class="add_condition" >
                                                            <div class="row" id="add_condition0">
                                                          <div class="input-group">
                                                         
                                                            <div class="col-md-3">
                                                                <label for="example-text-input" class="col-form-label">Condition</label>
                                                                <select class="form-control"  name="condition[0][]" id="condition">
                                                                        <option selected>Select Any One</option>
                                                                        <option value="fair">fair</option>
                                                                        <option value="good">good</option>
                                                                        <option value="excellent">excellent</option>
                                                        
                                                                    </select>
                                                              
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="example-text-input" class="col-form-label">Price</label>
                                                                <input class="form-control"  name="price[0][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">
                                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                                            </div>
                                                       <input type="hidden" name="addMoreCondition0" value="0" id="addMoreCondition0">
                                                           
                                                            <div class="col-md-3">
                                                                <label for="example-text-input" class="col-form-label">Quantity</label>
                                                                <input class="form-control"  name="quantity[0][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">
                                                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                            </div>
                                                            <div class="col-md-3" style="text-align: center;"> 
                                                                <a href="javascript:void(0)" class="btn btn-success addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # 1</a>
                                                            </div>
                                                         </div>
                                                        </div>
                                                        </div>

                                                         </div>
                                                   
                                                        
                                                        <hr>
                                                    </div>
                                                </div>

                                                    </div>      
                                                </div>
                                                    </div>
                                                <div style="overflow:auto;">
                                                  <div style="float:right;">
                                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                   
                                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                  </div>
                                                </div>
                                                <!-- Circles which indicates the steps of the form: -->
                                                <div style="text-align:center;margin-top:40px;">
                                                  <span class="step"></span>
                                                  {{-- <span class="step"></span> --}}
                                                  {{-- <span class="step"></span> --}}
                                                  <span class="step"></span>
                                                </div>
                                              
                                       
                                   </form>


                                  
                                 
                                    </div>
                                </div>
                            </div> <!-- end col -->

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
         var y=0;
         var z=0;
      
    $(document).on('click','.addMoreStorage',function(e){
		// alert(product);
      y++;
        console.log($(e.target).closest('.add_storage').children()[0]);
	
      var storageid= $(e.target).closest('.add_storage').children()[0].id;
    console.log(storageid);

      var storageindex = y;
      
        var  maxField=3;
		var childern =	$(e.target).find('#'+storageindex).children().length;
            //  alert(childern);
			if(y < maxField){
                // alert(childern);
				var fieldHTML = '<div class="add_storage"> <div class="row " id="add_storage'+y+'"><div class="input-group">'+
                                        '<div class="col-md-8">'+
                                        '<label for="example-text-input" class="col-form-label">Storage</label>'+
                                        '<select class="form-control" name="storage[0][]" >'+
                                            '<option selected>Select Memory</option>'+
                                            '<option value="256 GB">256 GB</option>'+
                                            '<option value="128 GB">128 GB</option>'+  
                                            '<option value="64 GB">64 GB</option>'+
                                            '<option value="32 GB">32 GB</option>'+
                                            '<option value="16 GB">16 GB</option>'+
                                            '<option value="8 GB">8 GB</option>'+
                                            
                                        '</select>'+

                                        '</div>'+
                                        '<div class="col-md-4" style="text-align: center;"> '+
                                        '  <a href="javascript:void(0)" class="btn btn-danger remove_storage" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Storage # '+storageindex+'</a>'+
                                        ' </div>'+
                                        
                                        '<div class="add_condition">'+
                                          '<div class="row" id="add_condition'+storageindex+'">'+
                                           '<div class="input-group">'+                               
                                          ' <div class="col-md-3">'+
                                          ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                                          ' <select class="form-control"  name="condition['+storageindex+'][]" id="condition">'+
                                                 '  <option selected>Select Any One</option>'+
                                                 '  <option value="fair">fair</option>'+
                                                 '  <option value="good">good</option>'+
                                                 '  <option value="excellent">excellent</option>'+
                                              ' </select> '+
                                      ' </div>'+
                                      ' <div class="col-md-3">'+
                                          ' <label for="example-text-input" class="col-form-label">Price</label>'+
                                          ' <input class="form-control"  name="price['+storageindex+'][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">'+
                                          ' <span class="text-danger">{{ $errors->first('price') }}</span>'+
                                      ' </div><div class="col-md-3">'+
                                          ' <label for="example-text-input" class="col-form-label">Quantity</label>'+
                                          ' <input class="form-control"  name="quantity['+storageindex+'][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">'+
                                         '  <span class="text-danger">{{ $errors->first('quantity') }}</span>'+
                                      ' </div>'+
                                       '<div class="col-md-3" style="text-align:center"> '+
                                          ' <a href="javascript:void(0)" class="btn btn-warning addMoreCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Condition # '+storageindex+'</a>'+
                                      ' </div>'+
                                      ' </div>'+
                                      ' </div>'+
                                      ' </div>'+
                                       '</div>'; 
				//$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
				$('#addstorage').append(fieldHTML);
			}
	});

     $(document).on('click', '.remove_storage', function(e){
         
            e.preventDefault();
         console.log($(this).parents('.removeStorage'));

         $(this).parents('.add_storage').remove(); //Remove field html
            y--; //Decrement field counter
        });
    

//    condition section

    $(document).on('click','.addMoreCondition',function(e){
		// alert(product);
z++;
        console.log($(e.target).closest('.add_storage').children()[0]);
	
      var conditionid= $(e.target).closest('.add_storage').children()[0].id;
      console.log(conditionid);

      var storeindex = conditionid.slice(11,12);
      
      alert(storeindex);
        var  maxField=3;
		// var childern =	$(e.target).closest('.add_condition').find('#'+conditionid).children().length;
         
			if(storeindex < maxField ){
                // alert(childern);
				var fieldHTML = ' <div class="input-group">'+
                                           ' <div class="col-md-3">'+
                                           ' <label for="example-text-input" class="col-form-label">Condition</label>'+
                                           ' <select class="form-control"  name="condition['+storeindex+'][]" id="condition">'+
                                                  '  <option selected>Select Any One</option>'+
                                                  '  <option value="fair">fair</option>'+
                                                  '  <option value="good">good</option>'+
                                                  '  <option value="excellent">excellent</option>'+
                                               ' </select> '+
                                       ' </div>'+
                                       ' <div class="col-md-3">'+
                                           ' <label for="example-text-input" class="col-form-label">Price</label>'+
                                           ' <input class="form-control"  name="price['+storeindex+'][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">'+
                                           ' <span class="text-danger">{{ $errors->first('price') }}</span>'+
                                       ' </div>    <div class="col-md-3">'+
                                           ' <label for="example-text-input" class="col-form-label">Quantity</label>'+
                                           ' <input class="form-control"  name="quantity['+storeindex+'][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">'+
                                          '  <span class="text-danger">{{ $errors->first('quantity') }}</span>'+
                                       ' </div>'+
                                        '<div  class="col-md-3" style="text-align:center"> '+
                                           ' <a href="javascript:void(0)" class="btn btn-secondary removeCondition" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Condition#'+storeindex+'</a>'+
                                       ' </div>'+
                                        '</div>'; 
				//$('#field_wrapper_size'+z).append(fieldHTML); //Add field html
				$(e.target).closest('.form-group').find('#'+conditionid).append(fieldHTML);
			}
	});

     $(wrapper2).on('click', '.removeCondition', function(e){
            e.preventDefault();
         console.log($(this).closest('.remove-color'));
            $(this).closest('.remove-color').remove(); //Remove field html
            x--; //Decrement field counter
        });
    



});

    </script>

<script>  
    $(document).ready(function(){  
        $("#NextSubmitBtn").click(function(){  
            // $("div").text($("form").serialize()); 
            $.ajax({
            type: "POST",
            url: "{{url('store-product')}}",
            data: $("form").serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'my_profile.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       }); 
        });  
    });  
    </script>
<script>

    
$(document).ready(function() {
    $('#regForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{url('store-product')}}",
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'my_profile.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});
    // var _token = $('input[name="_token"]').val();
    // $.ajax({
        

    //     url: "{{url('store-product')}}",
    //     type: "POST",
    //     data: $('#regForm').serialize(), 
    //     success: function( response ) {
    //     $('#submit').html('Submit');
    //     $("#submit"). attr("disabled", false);
    //     alert('Ajax form has been submitted successfully');
    //     document.getElementById("contactUsForm").reset(); 
    //     }
    </script>




 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>


 <script type="text/javascript">
    $('#cp2').colorpicker();
    </script> --}}


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


</script>


{{-- // $(function(){
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


/// Cart --}}

{{-- </script> --}}




  
  <script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  
  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("NextSubmitBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
      document.getElementById("NextSubmitBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    }
     else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }
  
  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
  
  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }
  
  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
  </script>
  <script>

        // var x = 1; //Initial field counter is 1
        //Once add button is clicked
        // $(document).on('click','#add_button2',function(){
        
        //     //Check maximum number of input fields
        //     x++;
        //     // alert(x);
        //     // alert(x);
        //     if(x < maxField2){
        //         var fieldHTML = '<div class="col-md-12 remove-color">'+
        //                 '<div class="row">'+
        //               '<div class="col-md-5">'+
        //                        ' <label for="example-text-input" class=" col-form-label">Color Name</label>'+
        //                        ' <input class="form-control"  name="color_name['+x+']" type="text" placeholder="Enter mobile color name"  @if(old('color_name')) value="{{ old('color_name') }}" @endif  id="example-text-input">'+
        //                         '<span class="text-danger">{{ $errors->first('color_name') }}</span>'+
                            
        //                     '</div>'+
        //                    ' <div class="col-md-5">'+
        //                        ' <label for="example-text-input" class="col-form-label">Image</label>'+
        //                        ' <input class="form-control" name="image['+x+'][]"  multiple type="file"   @if(old('image'))  @endif  id="example-text-input">'+
        //                        ' <span class="text-danger">{{ $errors->first('image') }}</span>'+
        //                     '</div>'+
                          
        //                     '<div class="col-md-2" style="text-align:center">'+
        //                       '  <a href="javascript:void(0)" class="btn btn-danger remove_button2" style="margin-top: 36px;"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a>'+ 
        //                     '</div>'+
        //                     '</div>'+
        //                    '<hr>'+
                               
        //                     '<div class="add_storage">'+
        //                             '<div class="row" id="add_storage'+x+'">'+
        //                             '<div class="input-group">'+ 
        //                             '<div class="col-md-8">'+
        //                                 '<label for="example-text-input" class="col-form-label">Storage</label>'+
        //                                 '<select class="form-control" name="storage['+x+'][]" >'+
        //                                     '<option selected>Select Memory</option>'+
        //                                     '<option value="64 GB">256 GB</option>'+
        //                                     '<option value="64 GB">128 GB</option>'+
                                            
        //                                     '<option value="64 GB">64 GB</option>'+
        //                                     '<option value="32 GB">32 GB</option>'+
        //                                     '<option value="16 GB">16 GB</option>'+
        //                                     '<option value="8 GB">8 GB</option>'+
                                            
        //                                 '</select>'+
                                    
        //                                 '</div>'+
        //                                 '<div class="col-md-4" style="text-align: center;"> '+
        //                                   '  <a href="javascript:void(0)" class="btn btn-info addMoreStorage" style="margin-top: 36px;" id="add_button2"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Storage</a>'+
        //                                ' </div>'+

        //                             '</div>'+
        //                         '</div>'+
        //                     '</div>'+
                             
        //                     '<div class="add_condition">'+
        //                         '<div class="row" id="add_condition'+x+'">'+
        //                        '<div class="input-group">'+
        //                     '<div class="col-md-3">'+
        //                        ' <label for="example-text-input" class="col-form-label">Condition</label>'+
        //                         '<select class="form-control"  name="condition['+x+'][]" id="condition">'+
        //                                ' <option selected>Select Any One</option>'+
        //                                ' <option value="fair">fair</option>'+
        //                                ' <option value="good">good</option>'+
        //                                 '<option value="excellent">excellent</option>'+
                        
        //                             '</select>'+
                                
        //                     '</div>'+
        //                     '<div class="col-md-3">'+
        //                        ' <label for="example-text-input" class="col-form-label">Price</label>'+
        //                         '<input class="form-control"  name="price['+x+'][]" type="number" placeholder="Enter mobile Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">'+
        //                        ' <span class="text-danger">{{ $errors->first('price') }}</span>'+
        //                     '</div>'+
                        
                            
        //                    ' <div class="col-md-3">'+
        //                        ' <label for="example-text-input" class="col-form-label">Quantity</label>'+
        //                         '<input class="form-control"  name="quantity['+x+'][]" type="number" placeholder="Enter mobile Quantity"  @if(old('quantity')) value="{{ old('quantity') }}" @endif  id="example-text-input">'+
        //                        ' <span class="text-danger">{{ $errors->first('quantity') }}</span>'+
        //                     '</div>'+
        //                     ' <input type="hidden" name="addMoreCondition0" value="'+x+'" id="addMoreCondition'+x+'">'+
        //                    ' <div class="col-md-3" style="text-align:center"> '+
        //                        ' <a href="javascript:void(0)" class="btn btn-success addMoreCondition" style="margin-top: 36px;" ><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>addMoreCondition</a>'+
        //                     '</div> </div></div></div>'+
                            
        //                '</div>';
             
        //     $(wrapper2).append(fieldHTML); //Add field html
        //     }
    
        // });
        
    
        //Once remove button is clicked
        // $(wrapper2).on('click', '.remove', function(e){
        // 	e.preventDefault();
        // 	$(this).parent('field_wrapper2').remove(); //Remove field html
        // 	x--; //Decrement field counter
        // });
    
        // $(wrapper2).on('click', '.remove_button2', function(e){
        //     e.preventDefault();
        //  console.log($(this).closest('.remove-color'));
        //     $(this).closest('.remove-color').remove(); //Remove field html
        //     x--; //Decrement field counter
        // });
    
   
    //  Storage section    

  </script>

@endsection

