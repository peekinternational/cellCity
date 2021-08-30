

@extends('admin.layouts.master')

@section('title') Repair Type List @endsection

@section('content')

    @component('admin.common-components.breadcrumb')
         @slot('title') Repair Type List  @endslot
         @slot('li_1') Repair Type @endslot
         @slot('li_2') Repair Type List @endslot
     @endcomponent

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
                                            <table id="example" class="table table-centered table-nowrap table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $index => $user)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{$index + 1}}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{$user->name}}</a></h5>

                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{$user->email}}</a></h5>

                                                        </td>

                                                       <td>
                                                        @if(!empty($user->getRoleNames()))
                                                        @foreach($user->getRoleNames() as $v)

                                                           <label class="badge badge-success">{{ $v->name}}</label>
                                                        @endforeach
                                                      @endif
                                                       </td>
                                                        <td>
                                                            {{-- <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/repairTypes/'.$users->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/repairTypes/'.$users->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                       @method('DELETE')

                                                                       <label for="delZip" data-toggle="tooltip" data-placement="top" title="Delete" style="cursor: pointer;"><i class="mdi mdi-delete-circle-outline"></i></label>
                                                                       <input id="delZip" type="submit" name="" style="display: none">
                                                                   </form>

                                                                </li>
                                                              <!--   <li class="list-inline-item px-2">
                                                                    <a href="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="mdi mdi-account-circle-outline"></i></a>
                                                                </li> -->
                                                            </ul> --}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
@endsection
