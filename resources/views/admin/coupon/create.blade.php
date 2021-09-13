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
                                        <form action="{{route('admin.coupon.store')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Coupon Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="name" type="text" placeholder="Enter name" @if(old('name')) value="{{ old('name') }}" @endif  name="name" id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">Coupon Code</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter Coupon Code" @if(old('code')) value="{{ old('code') }}" @endif name="code" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('code') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label"> Coupon Type</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter type" @if(old('type')) value="{{ old('type') }}" @endif name="type" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('orig_price') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label"> value</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter value" @if(old('value')) value="{{ old('value') }}" @endif name="value" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label">Description</label>
                                                <div class="col-md-10">
                                                    <textarea type="text" name="description" class="form-control" cols="30" rows="10"></textarea>
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
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

<script>
    $(function() {
$('.selectpic').select2();
});

</script>

<script>
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
