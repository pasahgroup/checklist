@extends('layouts.app')
@section('content')
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
                    <!--begin::Subheader-->
                    <div class="subheader py-2 py-lg-6 subheader-solid">
                        <div class="container-fluid">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                                    <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                           <!--  <div class="card card-custom gutter-b bg-transparent shadow-none border-0" > -->

                                            
                                                  <div class="card card-custom bg-transparent shadow-none border-1" >
                                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                                    <div class="card-title mb-0">
                                                        <h3 class="card-label mb-0 font-weight-bold text-body">User List
                                                        </h3>
                                                    </div>
                                                    <div class="icons d-flex"><button  class="btn ml-2 p-0 kt_notes_panel_toggle"
                                                          data-toggle="tooltip" title="" data-placement="right"data-original-title="Check out more demos" >
                <span class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

            <svg width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-plus white" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                                </span>

                                                        </button>
            <a href="#" onclick="printDiv()" class="ml-2">
                <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
         <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">                                       <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                          <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                                    <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                                  </svg>
                                                            </span>

                                                        </a>
                                                        <a href="#" class="ml-2" >
                                                            <span class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                                                  </svg>
                                                            </span>

                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-12 ">
                                            <div class="card card-custom gutter-b bg-white border-0" >
                                                <div class="card-body" >
                                                    <div >
                                                        <div class=" table-responsive" id="printableTable">
                                                            <table id="orderTable" class="display" style="width:100%">

                                            <thead class="text-body">
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th >Full Name</th>
                                                                        <th >Property Name</th>
                                                                        <th >Department</th>
                                                                        <th >Email</th>

                                                                        <th class="no-sort text-right">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="kt-table-tbody text-dark">
                                                                    @isset($users)
                                                                    @foreach ($users as $user)
                                                                    <tr class="kt-table-row kt-table-row-level-0">
                                                                        <td >{{ $user->id }}</td>
                                                                        <td>{{ $user->name }}</td>
 <td>
                                                                       @foreach ($properties as $property)
                                                                        @if($user->property_id==$property->id)
                                                                       {{ $property->property_name }}
                                                                        @endif
                                                                    @endforeach
                                                                    </td>

                                                                       <td>
                                                                        @foreach ($departments as $department)
                                                                        @isset($user->department_id)
                                                                        @if($user->department_id==$department->id)
                                                                       {{ $department->unit_name }}

                                                                        @endif
                                                                        @endisset
                                                                    @endforeach
                                                                       </td>
                                                                        <td>{{ $user->email }}</td>

                                                                        <td>

 <!-- start Modal -->
  <div class="modal fade" id="issue{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit {{ $user->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('user-register.update',$user->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-dark" >Edit user name</label>
                            <input type="text" name="full_name" class="form-control" value="{{ $user->name }}" required="">
                            <small  class="form-text text-muted">please edit user name</small>
                        </div>
                                  <div class="form-group">
                        <label class="text-dark" >Edit Property/Accommodation</label>
                        <select name="property" id="property" class="form-control">

                                        <option value="{{$user->property_id}}">  
                                            @isset($properties)
                                            @foreach ($properties as $property)
                                                                        @if($user->property_id==$property->id)
                                                                       {{ $property->property_name }}
                                                                        @endif
                                                                    @endforeach</option>
                                         @foreach ($properties as $property)
                                          <option value="{{$property->id}}">{{$property->property_name}}</option>

                                       @endforeach
                                       @endisset
                        </select>
                    </div>

                      <div class="form-group">
                        <label class="text-dark" >Department</label>
                        <select name="department" id="" class="form-control">

                                        <option value="{{$user->department_id}}">   @foreach ($departments as $department)
                                                                        @isset($user->department_id)
                                                                        @if($user->department_id==$department->id)
                                                                       {{ $department->unit_name }}

                                                                        @endif
                                                                        @endisset
                                                                    @endforeach</option>
                                         @foreach ($departments as $department)
                                          <option value="{{$department->id}}">{{$department->unit_name}}</option>

                                       @endforeach
                        </select>
                    </div>

                         <div class="form-group">
                            <label class="text-dark" >Edit user Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required="">
                            <small  class="form-text text-muted">please edit user Email</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" >Update</button>
              </form>
        </div>

      </div>
    </div>
  </div>
  {{-- end of modal --}}


                                                                            <div class="card-toolbar text-right">
                                                                                <button class="btn p-0 shadow-none" type="button" id="dropdowneditButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="svg-icon">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots text-body" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowneditButton2"  style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                                                @if(($user->status)!="Stop")
                                                                                    <a href="javascript:void(0)" class="btn-success dropdown-item click-edit" id="click-edit1" data-toggle="modal" data-target="#issue{{ $user->id }}">Edit</a>

                                                                                     <a href="{{ route('delete-user',$user->id) }}" class="btn-success dropdown-item click-delete" id="click-edit1" onclick="return confirm(id='Are you sure you want to delete this  {{$user->name}}')">Delete</a>

                                                                            @endif
                                                                                </div>
                                                                                </div>
                                                                        </td>

                                                                    </tr>
                                                                    @endforeach
                                                                @endisset
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>




    <div  class="offcanvas offcanvas-right kt-color-panel p-1 kt_notes_panel">
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
            <h4 class="font-size-h4 font-weight-bold m-0">Register user
            </h4>
            <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary kt_notes_panel_close" >
                <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                </svg>
            </a>
        </div>

        <div class="row col-xl-12 col-md-12">
<div class="card-body"  style="background-color:#b2ca5d !important">
<x-guest-layout>
 <form method="POST" action="{{ route('user-register.store') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Full Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
              <div>
                <x-jet-label for="property" value="{{ __('Property/Accommodation') }}" />
 <select name="property" id="property" class="block mt-1 w-full" required>
                        <option value="">--- Select Property ---</option>
                            @foreach ($properties as $property)
                       <option value="{{$property->id}}">{{$property->property_name}}</option>

                            @endforeach
                        </select>
            </div>

  <div>
                <x-jet-label for="department" value="{{ __('Department') }}" />
 <select name="department" id="department" class="block mt-1 w-full" required>
                        <option value="">--- Select Department ---</option>
                            @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->unit_name}}</option>

                            @endforeach
                        </select>
            </div>



  <div>
                <x-jet-label for="role" value="{{ __('Role') }}" />
 <select name="role" id="role" class="block mt-1 w-full" required>
                        <option value="">--- Select Roles ---</option>
                            @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>

                            @endforeach
                        </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-3">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
</x-guest-layout>
</div>
</div>
    </div>
    <iframe name="print_frame" width="0" height="0"  src="about:blank"></iframe>

</body>
</html>
@endsection
