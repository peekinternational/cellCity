@extends('admin.layouts.master')

@section('title') Carrier List @endsection

@section('content')

    @component('admin.common-components.breadcrumb')
         @slot('title') Carrier List  @endslot
         @slot('li_1') Carrier @endslot
         @slot('li_2') Carrier List @endslot
     @endcomponent
   @section('css')

   @endsection

                        <div class="row">
                             @if(Session::has('message'))
                              <div class="col-12">
                                  {!!Session::get('message')!!}
                              </div>
                              @endif
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap table-hover" id="example" cellspacing="0" width="100%" >
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Name</th>
                                                        <th>Price</th>
                                                        <th>Tax</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($carriers as $index => $carrier)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{$index + 1}}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        <img src="{{asset($carrier->image)}}" width="80px" height="80px" alt="carrier Image">

                                                        </td>
                                                        <td>
                                                           {{$carrier->name}}

                                                        </td>
                                                        <td>
                                                            <?php foreach(explode(",", $carrier->price) as $price){
                                                                   echo '$ '.$price .'<br>';
                                                            } ?>

                                                        </td>
                                                         <td>
                                                           $ {{$carrier->tax}}

                                                        </td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/carriers/'.$carrier->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/carriers/'.$carrier->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                       @method('DELETE')
                                                                      
                                                                       <button type="submit" style="border: none;background: white;"><i class="mdi mdi-delete-circle-outline"></i></button>
                                                                      
                                                                   </form>

                                                                </li>
                                                              <!--   <li class="list-inline-item px-2">
                                                                    <a href="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="mdi mdi-account-circle-outline"></i></a>
                                                                </li> -->
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                      <!--   <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>


@endsection
