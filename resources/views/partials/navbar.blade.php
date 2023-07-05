<div class="position-relative p-0 bg-dark" >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-1 py-lg-3ar mx-auto text-center">
    <a href="" class="navbar-brand d-flex align-items-center">
      <img class="logo pe-2" src="{{ asset('css/logo.png') }}" alt="">
      <h1 class="text-primary m-0">SISPAR</h1>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="/" class="nav-link {{ url()->current() === url('/') ? 'active' : '' }}">Home</a>
        </li>
        <li class="nav-item">
            <a href="/posts" class="nav-link {{ request()->is('posts*') ? 'active' : '' }}">Destination</a>
        </li>
      
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle bg-transparent {{ request()->is('categories*') ? 'active' : '' }}" data-bs-toggle="dropdown">Categories</a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
              <li><a class="dropdown-item" href="/posts?category={{ $category->slug }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a href="/dss" class="nav-link {{ request()->is('dss*') ? 'active' : '' }}" >Suggestion</a>
        </li>
      </ul>
      
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i>  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a href="/login" class="btn btn-primary py-2 px-4"> <i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </nav>
</div>
