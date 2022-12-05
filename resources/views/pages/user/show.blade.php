@php
  use App\Enums\Role;
  use App\Enums\Gender;
@endphp

<x-app-layout dashboard title="{{ $user->name }}">
  <x-alert />

  <div class="row justify-content-center">
    <div class="col col-sm-9 col-md-8 col-lg-5">
      <div class="card container-fluid border rounded-4 shadow p-3">
        <div class="card-header fs-4 fw-bold">
          {{ $user->name }}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ $user->email }}</li>
          <li class="list-group-item">{{ $user->username }}</li>

          <li class="list-group-item">
            {{ $user->gender->locale() }}

            @if ($user->gender === Gender::Male)
              <i class="bi bi-gender-male"></i>
            @else
              <i class="bi bi-gender-female"></i>
            @endif
          </li>

          @can('atleast_role', Role::Employee)
            <li class="list-group-item">
              <span class="badge rounded-pill text-bg-primary me-3">{{ $user->role->locale() }}</span>
            </li>
          @endcan

          <li class="list-group-item">Terdaftar pada :<br><small>{{ Date::parse($user->created_at)->format('l, j F Y H:i:s') }}</small></li>
        </ul>
      </div>
    </div>
  </div>
</x-app-layout>
