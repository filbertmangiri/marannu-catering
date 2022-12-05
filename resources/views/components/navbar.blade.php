@php
  use App\Enums\Gender;
  use App\Enums\Role;
@endphp

@props([
    'position' => 'sticky-top',
])

<nav class="navbar {{ $position }} navbar-expand-lg navbar-dark bg-dark" id="navigationBar">
  <div class="container">
    @if ($attributes->has('dashboard'))
      <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    @endif

    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('assets/img/brand-fill.png') }}" alt="Marannu Catering" height="40">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationCollapse" aria-controls="navigationCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navigationCollapse">
      <div class="navbar-nav">
        <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Beranda</a>

        @can('viewDashboard')
          <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
        @endcan
      </div>

      <hr class="border-top d-lg-none">

      <div class="navbar-nav ms-auto">
        @auth
          <div class="nav-item dropdown">
            <div class="nav-link dropdown-toggle d-flex align-items-center" role="button" id="profileMenu" data-bs-toggle="dropdown" aria-expanded="false">
              @can('atleast_role', Role::Employee)
                <span class="badge rounded-pill text-bg-primary me-3">{{ auth()->user()->role->locale() }}</span>
              @endcan
              <img class="rounded-circle me-2" src="{{ asset('storage/profile-pictures/' . (auth()->user()->gender === Gender::Male ? 'default-male' : 'default-female') . '.png') }}" alt="Foto profil saya" title="Foto profil saya" height="35px">
              {{ auth()->user()->name }}
            </div>

            <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end col-sm-6 col-md-4" aria-labelledby="profileMenu">
              <a class="dropdown-item {{ Route::is('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                <i class="bi bi-person-circle"></i>
                Profil
              </a>

              <hr class="dropdown-divider">

              <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')

                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right"></i>
                  Keluar
                </button>
              </form>
            </div>
          </div>
        @else
          <a class="nav-link {{ Route::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Masuk</a>
        @endauth
      </div>
    </div>
  </div>
</nav>

@push('scripts')
  <script type="text/javascript">
    const navbarCollapse = new bootstrap.Collapse(document.getElementById('navigationCollapse'), {
      toggle: false
    })

    document.onclick = (event) => {
      const clicked = event.target
      const navbar = document.getElementById('navigationBar')

      if (!navbar.contains(clicked)) {
        navbarCollapse.hide()
      }
    }
  </script>
@endpush
