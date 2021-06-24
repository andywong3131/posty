<nav class="bg-black flex justify-between">
  <ul class="flex text-gray-300">
    <li class="m-5"><a href="{{ route('home') }}">Home</a></li>
    <li class="m-5"><a href="">Dashboard</a></li>
    <li class="m-5"><a href="">Posts</a></li>
  </ul>

  <ul class="flex text-gray-300">
    @guest
      <li class="m-5"><a href="">Login</a></li>
      <li class="m-5"><a href="{{ route('register') }}">Register</a></li>
    @endguest

    @auth
      <li class="m-5"><a href="">{{ auth()->user()->name }}</a></li>
      <li class="m-5"><a href="">Logout</a></li>
    @endauth
  </ul>
</nav>