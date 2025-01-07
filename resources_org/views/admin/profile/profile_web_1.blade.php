@extends('layouts.app_web')
@section('content')
        
        <div class="row col-xl-12 col-md-12">
<div class="card-body"  style="background-color:#b2ca5d !important">
<x-guest-layout>
 <form method="POST" action="{{ route('company-profile-create.store') }}">
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
@endsection