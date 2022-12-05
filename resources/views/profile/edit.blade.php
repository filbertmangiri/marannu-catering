@php
  use App\Enums\Role;
@endphp

<x-app-layout title="Profil Saya">
  <div class="row justify-content-center mb-3">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <x-alert />
    </div>
  </div>

  <div class="mb-3">
    @include('profile.partials.update-profile-information-form')
  </div>

  <div class="mb-3">
    @include('profile.partials.update-password-form')
  </div>

  <div class="mb-3">
    @include('profile.partials.delete-user-form')
  </div>
</x-app-layout>
