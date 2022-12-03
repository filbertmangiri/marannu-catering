<x-app-layout>
  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        @error('login')
          <div class="alert alert-danger alert-dismissible" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>

            {{ $message }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror

        <form action="{{ route('login') }}" method="POST">
          @csrf

          <x-form.floating-input name="emailOrUsername" class="mb-3" autocomplete="on" autofocus>Email atau username</x-form.floating-input>
          <x-form.floating-input type="password" name="password" class="mb-4" autocomplete="on">Kata Sandi</x-form.floating-input>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
