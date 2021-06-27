<div class="mb-5">
  <a href="{{ route('user.posts', $post->user->name) }}" class="font-bold">{{ $post->user->name }}</a>

  <span class="text-sm"> {{ $post->created_at->diffForHumans() }}</span>

  <p>{{ $post->body }}</p>

  @auth
    @if ($post->alreadyLikedBy(auth()->user()))
      <form action="{{ route('posts.unlike', $post) }}" method="POST" class="inline">
        @method('DELETE')
        @csrf

        <button class="text-blue-500">Unlike</button>
      </form>
    @else
      <form action="{{ route('posts.like', $post) }}" method="POST" class="inline">
        @csrf

        <button class="text-blue-500">Like</button>
      </form>
    @endif

    @can('delete', $post)
      <form action="{{ route('posts.delete', $post) }}" method="POST" class="inline">
        @method('DELETE')
        @csrf

        <button class="text-red-500">Delete</button>
      </form>
    @endcan
  @endauth

  <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
</div>