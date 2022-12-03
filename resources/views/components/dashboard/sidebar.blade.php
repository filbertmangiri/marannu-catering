@props([
    'class' => '',
])

<nav id="sidebarMenu" class="{{ $class }} bg-dark sidebar collapse">
  <div class="position-sticky pt-3">
    <div class="nav nav-pills flex-column px-2 py-3" id="MainMenu">
      <a href="{{ route('page.dashboard') }}" class="nav-link text-light {{ Route::is('page.dashboard') ? 'active' : '' }}">Dashboard</a>
      <a href="{{ route('foodstuff.index') }}" class="nav-link text-light {{ Route::is('foodstuff.*') ? 'active' : '' }}">Bahan Makanan</a>
    </div>
  </div>
</nav>
