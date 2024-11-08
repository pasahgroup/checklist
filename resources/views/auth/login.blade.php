

  
  @extends('layouts.app_login_pwd')
@section('content')
<style>
.bg-bannerw{
  
background-image:url({{URL::asset('../../assets/images/misc/bg-login.jpg')}});
    height: 100%
    width: 100%;
    position: relative;
    background-repeat: no-repeat;
    background-size:cover;
};

</style>
<main class="login-form" style="padding-top:60px;">
  <div class="cotainer">
      <div class="row justify-content-center">

          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">Login Form</div>
                  <div class="card-body ">
    

<x-guest-layout>   
    <x-jet-authentication-card>
        <div class=""> 
        <x-slot name="logo">
            <span class="brand-text"><img style="height: 150px;" alt="Logo"
                src="../../assets/images/misc/bg-login.jpg" /></span>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="{{ route('login') }}">
            @csrf
            {{--
            <div class="row">
               <div class="col-md-2">                   
                               <x-jet-label for="code" value="{{ __('Code') }}" />
                </div>
                  <div class="col-md-9"> 
                <input id="code" class="form-control" type="text" name="code" value="{{ app('request')->input('code') }}" required autofocus/>
               
                </div>
            </div>
            --}}
           
    <div class="mt-4">
        
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>


         <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
            <a href="{{ route('forget.password.get') }}"><u>Forget Password</u></a><br>
              <a href="{{ url('company-profile-web') }}"><strong style="color:green"><u>Register Lodge</u></strong></a>
        </form>
   </div>

    </x-jet-authentication-card>
</x-guest-layout>
        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2 float-right">©2022</span>
                            <span class="ext-muted font-weight-bold mr-2 text-center" style="color: #000;">Licensed to: {{$company->company_name??'Set Company Profile'}}</span>
                        </div>            

                        

                  </div>

              </div>

          </div>
      </div>
  </div>

</main>

@endsection