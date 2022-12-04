@php
  use App\Enums\Gender;
@endphp

<div class="row justify-content-center">
  <div class="col col-sm-11 col-md-8 col-lg-6">
    <div class="container-fluid border rounded-4 shadow p-3">
      <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
      </form>

      <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <x-form.floating-input name="name" class="mb-3" old="{{ $user->name }}">Nama Lengkap</x-form.floating-input>

        <x-form.floating-input type="email" name="email" old="{{ $user->email }}" class="mb-3">Alamat Email</x-form.floating-input>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
          <p class="mb-3">
            <small class="ms-2">Email anda belum terverifikasi.</small>
            <button form="send-verification" class="btn btn-sm btn-link text-reset">
              <small>Klik di sini untuk mengirim ulang link verifikasi.</small>
            </button>
          </p>

          @if (session('status') === 'verification-link-sent')
            <p class="mb-3">
              <small class="text-success ms-2">
                Link verifikasi yang baru telah dikirimkan. Silakan cek kembali.
              </small>
            </p>
          @endif
        @endif

        <x-form.floating-input name="username" old="{{ $user->username }}" class="mb-4">Nama Pengguna</x-form.floating-input>

        <div class="mb-4">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="{{ Gender::Male->value }}" {{ old('gender', $user->gender->value) === Gender::Male->value ? 'checked' : '' }}>
            <label class="form-check-label" for="genderMale">Pria</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="{{ Gender::Female->value }}" {{ old('gender', $user->gender->value) === Gender::Female->value ? 'checked' : '' }}>
            <label class="form-check-label" for="genderFemale">Wanita</label>
          </div>

          @error('gender')
            <hr class="d-none is-invalid">
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Simpan</button>
      </form>
    </div>
  </div>
</div>
