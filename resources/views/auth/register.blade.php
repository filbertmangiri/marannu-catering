@php
  use App\Enums\Gender;
@endphp

<x-app-layout>
  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        <form action="{{ route('register') }}" method="POST">
          @csrf

          <x-form.floating-input name="name" class="mb-3" autofocus>Nama Lengkap</x-form.floating-input>
          <x-form.floating-input type="email" name="email" class="mb-3">Alamat Email</x-form.floating-input>
          <x-form.floating-input name="username" class="mb-4">Nama Pengguna</x-form.floating-input>

          <div class="mb-4">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="genderMale" value="{{ Gender::Male->value }}" {{ old('gender') === Gender::Male->value ? 'checked' : '' }}>
              <label class="form-check-label" for="genderMale">Pria</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="{{ Gender::Female->value }}" {{ old('gender') === Gender::Female->value ? 'checked' : '' }}>
              <label class="form-check-label" for="genderFemale">Wanita</label>
            </div>

            @error('gender')
              <hr class="d-none is-invalid">
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="row row-cols-1 mb-0 row-cols-sm-2 mb-sm-4 gx-2">
            <div class="col">
              <x-form.floating-input type="password" name="password" class="mb-3 mb-sm-0">Password</x-form.floating-input>
            </div>
            <div class="col">
              <x-form.floating-input type="password" name="password_confirmation" class="mb-4 mb-sm-0">Ulangi Password</x-form.floating-input>
            </div>
          </div>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100 mb-4">Daftar</button>

          <span class="ms-2">Sudah ada akun? <a href="{{ route('login') }}" class="text-reset">Masuk</a></span>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
