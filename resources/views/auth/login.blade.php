@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-4/12 bg-white p-5 rounded-lg">
    @if (session('status'))
      <div class="mb-5 p-5 bg-red-500 text-white text-center">{{ session('status') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <div class="mb-5">
        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" class="p-5 bg-gray-100 w-full border-2 rounded-lg @error('email') border-red-500 @enderror" placeholder="Email" value="{{ old('email') }}">
        @error('email')
          <div class="text-red-500">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-5">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="p-5 bg-gray-100 w-full border-2 rounded-lg @error('password') border-red-500 @enderror" placeholder="Password">
        @error('password')
          <div class="text-red-500">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-5">
          <input type="checkbox" name="remember" id="remember" class="mr-1">
          <label for="remember">Remember Me</label>
      </div>
      <button class="p-5 bg-blue-500 w-full text-white font-medium rounded-lg">Login</button>
    </form>
  </div>
</div>
@endsection