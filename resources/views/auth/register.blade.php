@php
  use App\Enums\Gender;
@endphp

<x-app-layout>
  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        <form action="{{ route('register') }}" method="POST">
          @csrf

          <x-floating-input name="name" class="mb-3" autofocus>Nama Lengkap</x-floating-input>
          <x-floating-input type="email" name="email" class="mb-3">Alamat Email</x-floating-input>
          <x-floating-input name="username" class="mb-4">Nama Pengguna</x-floating-input>

          <div class="mb-4">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="genderMale" value="{{ Gender::Male }}" {{ old('gender') === Gender::Male ? 'checked' : '' }}>
              <label class="form-check-label" for="genderMale">Pria</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="{{ Gender::Female }}" {{ old('gender') === Gender::Female ? 'checked' : '' }}>
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
              <x-floating-input type="password" name="password" class="mb-3 mb-sm-0">Kata Sandi</x-floating-input>
            </div>
            <div class="col">
              <x-floating-input type="password" name="password_confirmation" class="mb-4 mb-sm-0">Ulangi Kata Sandi</x-floating-input>
            </div>
          </div>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Daftar</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
