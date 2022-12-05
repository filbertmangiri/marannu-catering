@php
  use App\Enums\Gender;
  use App\Enums\Role;
@endphp

<x-app-layout dashboard title="{{ $user->name }}">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2-4.1.0/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2-bootstrap-5-theme-1.3.0/select2-bootstrap-5-theme.min.css') }}" />
  @endpush

  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        <form action="{{ route('user.update', $user->username) }}" method="POST" id="editUserForm">
          @csrf
          @method('PUT')

          <x-form.floating-input name="name" class="mb-3" old="{{ $user->name }}" autofocus>Nama Lengkap</x-form.floating-input>
          <x-form.floating-input type="email" name="email" old="{{ $user->email }}" class="mb-3">Alamat Email</x-form.floating-input>
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

          <div class="row row-cols-1 mb-0 row-cols-sm-2 mb-sm-4 gx-2">
            <div class="col">
              <x-form.floating-input type="password" name="password" class="mb-3 mb-sm-0">Password</x-form.floating-input>
            </div>
            <div class="col">
              <x-form.floating-input type="password" name="password_confirmation" class="mb-4 mb-sm-0">Ulangi Password</x-form.floating-input>
            </div>
          </div>

          @can('atleast_role', Role::Admin)
            <div class="mb-4">
              <select name="role" class="form-select @error('role') is-invalid @enderror">
                @php($oldRole = old('role', $user->role->value))

                <option disabled {{ !$oldRole ? 'selected' : '' }}>Pilih Jabatan</option>

                @foreach (Role::cases() as $role)
                  @break($role->value === Role::Admin->value)

                  <option value="{{ $role->value }}" {{ $role->value === $oldRole ? 'selected' : '' }}>{{ $role->locale() }}</option>
                @endforeach
              </select>

              @error('role')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          @endcan

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100 mb-4">Simpan</button>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="{{ asset('assets/vendor/jquery-3.6.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2-4.1.0/js/select2.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#editUserForm select').select2({
          theme: 'bootstrap-5',
          width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
        })
      })
    </script>
  @endpush
</x-app-layout>
