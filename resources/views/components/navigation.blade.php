<div>
  @guest
    <a href={{ route('register') }}>Register</a>
    <a href={{ route('login') }}>Login</a>
  @endguest

  @auth
    <form method="POST" action="{{ route('logout') }}">
    @method('DELETE')
    @csrf
    <button>Logout</button>
    </form>
  @endauth

  <a href='/url/create'><button>Create a short URL</button></a>
  <a href='/url'>Listing</a>
</div>