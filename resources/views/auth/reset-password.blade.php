<x-app-layout title="Atur Ulang Password">
  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        @error('reset_password')
          <div class="alert alert-danger alert-dismissible" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>

            {{ $message }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror

        <form action="{{ route('password.store') }}" method="POST">
          @csrf

          {{-- Password Reset Token --}}
          <input type="hidden" name="token" value="{{ $request->route('token') }}">

          <x-form.floating-input name="email" class="mb-3" autofocus>Email</x-form.floating-input>
          <x-form.floating-input type="password" name="password" class="mb-3">Password</x-form.floating-input>
          <x-form.floating-input type="password" name="password_confirmation" class="mb-3">Konfirmasi Password</x-form.floating-input>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Selesai</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
