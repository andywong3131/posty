<nav class="bg-black flex justify-between">
  <ul class="flex text-gray-300">
    <li class="m-5"><a href="{{ route('home') }}">Home</a></li>
    <li class="m-5"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="m-5"><a href="{{ route('posts') }}">Posts</a></li>
  </ul>

  <ul class="flex text-gray-300">
    @guest
      <li class="m-5"><a href="{{ route('login') }}">Login</a></li>
      <li class="m-5"><a href="{{ route('register') }}">Register</a></li>
    @endguest

    @auth
      <li class="m-5"><a href="">{{ auth()->user()->name }}</a></li>
      <li class="m-5">
        <form action="{{ route('logout') }}" method="POST">
          @csrf

          <button>Logout</button>
        </form>
    @endauth
  </ul>
</nav>