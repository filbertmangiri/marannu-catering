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
          <x-form.floating-input type="password" name="password" class="mb-4" autocomplete="on">Password</x-form.floating-input>

          <div class="form-check mb-4">
            <input type="checkbox" name="remember" id="remember_me" autocomplete="current-password" class="form-check-input">
            <label for="remember_me" class="form-check-label">
              Ingat saya
            </label>
          </div>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100 mb-4">Masuk</button>

          <div class="row row-cols-1 row-cols-sm-2 justify-content-between px-2 gy-2">
            <div class="col">
              <span>Belum ada akun? <a href="{{ route('register') }}" class="text-reset">Daftar</a></span>
            </div>

            @if (Route::has('password.request'))
              <div class="col d-sm-flex justify-content-sm-end">
                <a href="{{ route('password.request') }}" class="text-reset text-end">Lupa password?</a>
              </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
