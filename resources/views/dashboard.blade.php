@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-6/12 bg-white p-5 rounded-lg">
      <h1 class="mb-5 font-bold">Dashboard</h1>
      
      <p>Total number of posts you created: <a href="{{ route('user.posts', $user->name) }}" class="text-blue-500">{{ $user->posts->count() }}</a></p>

      <p>Total number of likes you gave: {{ $user->likes->count() }}</p>

      <p>Total number of likes you received: {{ $user->receivedLikes->count() }}</p>
    </div>
  </div>
@endsection