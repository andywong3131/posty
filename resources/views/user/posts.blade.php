@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-6/12">
      <div class="px-5 pb-5">
        <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
        
        <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
      </div>

      <div class="bg-white p-5 rounded-lg">
        @forelse ($posts as $post)
          <x-post :post="$post" />
        @empty
          <p>No posts yet</p>
        @endforelse

        {{ $posts->links() }}
      </div>
    </div>
  </div>
@endsection