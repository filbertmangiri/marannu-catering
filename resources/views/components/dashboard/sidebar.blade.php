@props([
    'class' => '',
])

<nav id="sidebarMenu" class="{{ $class }} bg-dark sidebar collapse">
  <div class="position-sticky pt-3">
    <div class="nav nav-pills flex-column px-2 py-3" id="MainMenu">
      <a href="{{ route('dashboard') }}" class="nav-link text-light {{ Route::is('dashboard') ? 'active' : '' }}">Dashboard</a>

      @can('viewAny', App\Models\Foodstuff\Foodstuff::class)
        <a href="{{ route('foodstuff.index') }}" class="nav-link text-light {{ Route::is('foodstuff.*') ? 'active' : '' }}">Bahan Makanan</a>
      @endcan

      @can('viewAny', App\Models\User::class)
        <a href="{{ route('user.index') }}" class="nav-link text-light {{ Route::is('user.*') ? 'active' : '' }}">User</a>
      @endcan

      {{-- <button class="nav-link text-light text-start {{ Route::is('foodstuff.*') ? 'active' : '' }}">Bahan Makanan</button> --}}
    </div>
  </div>
</nav>
