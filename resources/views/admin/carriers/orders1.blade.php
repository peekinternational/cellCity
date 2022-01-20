@extends('admin.layouts.master')

@section('title') Carrier Order List @endsection

@section('content')

    @component('admin.common-components.breadcrumb')
         @slot('title') Carrier Order List  @endslot
         @slot('li_1') Carrier Order @endslot
         @slot('li_2') Carrier Order List @endslot
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
                                            <table class="table table-bordered table-hover" id="example"  >
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Image</th>
                                                        <th>Carrier Name</th>
                                                        <th>Name</th>
                                                        <th>Wireless</th>
                                                        <th>Email</th>
                                                        <th>Mobile No</th>
                                                        <th>Shipping Address</th>
                                                        <th>Zipcode</th>
                                                        <th>Price</th>
                                                        <th>Tax</th>
                                                        <th>Grand Total</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               @foreach(CityClass::orderInt() as $index => $carrier)
                                                     @php

                                                  $sAddress =App\Models\ShippingAddr::where('id',$carrier->address_id)->first();

                                                  @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{$index + 1}}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        <img src="{{asset(CityClass::orderIntCar($carrier->carrier_id)->image)}}" width="80px" height="80px" alt="carrier Image">

                                                        </td>
                                                        <td>
                                                           {{CityClass::orderIntCar($carrier->carrier_id)->name}}

                                                        </td>
                                                        <td>{{$sAddress->first_name }} {{$sAddress->last_name }}</td>
                                                        <td>{{$carrier->mobile}}</td>
                                                        <td>{{$sAddress->email}}</td>
                                                        <td>{{$sAddress->mobileNo}}</td>
                                                        <td>{{$sAddress->shipaddress}},<br> {{$sAddress->city}}, {{$sAddress->state}}</td>
                                                        <td>{{$sAddress->zipcode}}</td>
                                                        <td>
                                                          ${{$carrier->price}}

                                                        </td>
                                                         <td>
                                                           $ {{$carrier->tax}}

                                                        </td>
                                                         <td>
                                                           $ {{$carrier->price+$carrier->tax}}

                                                        </td>
                                                         <td>
                                                           {{$carrier->created_at}}

                                                        </td>
                                                      <!--   <td>
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
                                                                <li class="list-inline-item px-2">
                                                                    <a href="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="mdi mdi-account-circle-outline"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td> -->
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
