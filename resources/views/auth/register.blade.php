@extends('layouts/master')
@section('content')
<div class="w3-card-4">
  <div class="w3-container w3-teal w3-center">
  <x-application-logo style="width:100;height:100;" class="fill-current text-gray-500" />
    <h2>Register</h2>
  </div>
  <form class="w3-container" method="POST" action="{{ route('register') }}">
      @csrf
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <p>      
    <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" class="w3-input w3-border" :value="old('name')" required autofocus />
    </p>
    <p>
    <x-label for="email" :value="__('Email')" />

<x-input id="email" class="block mt-1 w-full" type="email" class="w3-input w3-border" name="email" :value="old('email')" required />
    </p>
    <p>      
    <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                class="w3-input w3-border"
                                required autocomplete="new-password" />
    </p>
    <p>
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

<x-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                class="w3-input w3-border"
                name="password_confirmation" required />
</p>
    <p>
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
    </p>

    <button class="w3-btn w3-teal w3-block" type="submit">Register</button></p>
  </form>
</div>
@endsection

