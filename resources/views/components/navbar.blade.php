<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand btn btn-warning" href="#">AAB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @if (Route::has('login'))
    @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                @if(Auth::user() && Auth::user()->is_admin)
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                @endif
                @if(Auth::user() && Auth::user()->is_revisor)
                <li class="nav-item">
                <a class="nav-link" href="{{ route('revisor.dashboard') }}">Dashboard</a>
                </li>
                @endif
                @if(Auth::user() && Auth::user()->is_writer)
                <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.dashboard', Auth::user()->id) }}">Author</a>
                </li>
                @endif
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"
                        onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:none ;" id="form-logout">

                        @csrf

                    </form>
                </div>
                </li>
            </ul>
            <form action="{{ route('search.articles') }}" method="get" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="key" placeholder="Cerca" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    @else
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Log in <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @endif
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    @endauth
    @endif
  </nav>
