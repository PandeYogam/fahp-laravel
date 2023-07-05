<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        @can('pengelola_wisata')
          <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/posts') ? 'active' : '' }}" aria-current="page" href="/dashboard/posts">
              <span data-feather="file-text" class="align-text-bottom"></span>
              My Posts
            </a>
          </li>
        @endcan

        @can('pengelola_paket_wisata')
          <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/paketwisata') ? 'active' : '' }} " aria-current="page" href="/dashboard/paketwisata">
              <span data-feather="package" class="align-text-bottom"></span>
              My Package
            </a>
          </li>
        @endcan
      </ul>

      @can('admin')  
        <h6 class=" sidebar-heading d-flex  justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>ADMIN</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/dashboard/users*') ? 'active' : '' }} " aria-current="page" href="/dashboard/users">
              <span data-feather="user" class="align-text-bottom"></span>
              Admin Registered
            </a>
          </li>
        </ul>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/dashboard/categories*') ? 'active' : '' }} " aria-current="page" href="/dashboard/categories">
              <span data-feather="grid" class="align-text-bottom"></span>
              Post Categories
            </a>
          </li>
        </ul>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link{{ request()->is('dashboard/subkriteria*') ? 'active' : '' }}" aria-current="page" href="/dashboard/subkriteria">
              <span data-feather="anchor" class="align-text-bottom"></span>
              Bobot alternatif
            </a>
          </li>
        </ul>
      @endcan
    </div>
  </nav>