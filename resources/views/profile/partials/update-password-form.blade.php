<div class="row justify-content-center">
  <div class="col col-sm-11 col-md-8 col-lg-6">
    <div class="container-fluid border rounded-4 shadow p-3">
      <form action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <x-form.floating-input type="password" name="current_password" class="mb-3">Password Lama</x-form.floating-input>
        <x-form.floating-input type="password" name="password" class="mb-3">Password Baru</x-form.floating-input>
        <x-form.floating-input type="password" name="password_confirmation" class="mb-4">Ulangi Password Baru</x-form.floating-input>

        <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Simpan</button>
      </form>
    </div>
  </div>
</div>
