@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-6/12 bg-white p-5 rounded-lg">
      @auth
        <form action="{{ route('posts') }}" class="mb-6" method="POST">
          @csrf

          <div class="mb-3">
            <textarea name="body" id="body" rows="3" placeholder="Post something!" class="p-5 bg-gray-100 border-2 rounded-lg w-full @error('body') border-red-500 @enderror"></textarea>
            
            @error('body')
              <div class="text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div>
            <button class="bg-blue-500 text-white px-4 py-2 font-medium rounded-md">Post</button>
          </div>
        </form>
      @endauth

      @forelse ($posts as $post)
        <x-post :post="$post" />
      @empty
        <p>No posts yet</p>
      @endforelse

      {{ $posts->links() }}
    </div>
  </div>
@endsection