@extends('layouts/master')
@section('content')
<div class="w3-card-4">
  <div class="w3-container w3-teal w3-center">
  <x-application-logo style="width:100;height:100;" class="fill-current text-gray-500" />
    <h2>Login</h2>
  </div>
  <form class="w3-container" method="POST" action="{{ route('login') }}">
      @csrf
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <p>      
    <x-label for="email" :value="__('Email')" />

<x-input id="email" class="block mt-1 w-full" type="email" class="w3-input w3-border" name="email" :value="old('email')" required autofocus />

</p>
    <p>      
    <x-label for="password" :value="__('Password')" />

     <x-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                class="w3-input w3-border"
                required autocomplete="current-password" />
    </p>
    <p>
    <p>
    <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
    </p>

    <p>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </p>
    <button class="w3-btn w3-teal w3-block" type="submit">Login</button></p>
  </form>
</div>
@endsection

