<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Devio</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Devio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left menu -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item :active="">
          <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        @auth
        <li class="nav-item" :active="request()->routeis('posts.*')">
          <a class="nav-link" href="{{url('posts')}}">Posts</a>
        </li>
        @can('admin-control')
        <li class="nav-item" :active="request()->routeis('users.*')">
          <a class="nav-link" href="{{route('users.index')}}">Users</a>
        </li>
        @endcan
        <li class="nav-item" :active="request()->routeis('tags.*')">
          <a class="nav-link" href="{{route('tags.index')}}">Tags</a>
        </li>
        @endauth
      </ul>

      <!-- Search -->
      <form class="d-flex me-3" action="{{url('posts/search')}}" method="GET" role="search">
        <input class="form-control me-2 rounded-pill" type="search" name="q" placeholder="Search..." aria-label="Search">
        <button class="btn btn-light rounded-pill" type="submit">Search</button>
      </form>

      <!-- Right menu -->
      <ul class="navbar-nav">
        @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          @endif
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  Logout
                </a>
              </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="row">
    @yield('content')
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@yield('script')
