<x-app-layout title="Lupa Password">
  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        @error('forgot_password')
          <div class="alert alert-danger alert-dismissible" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>

            {{ $message }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror

        <div class="fs-6 mb-4">
          Masukkan email anda untuk kemudian kami kirimkan link untuk mengatur ulang password anda.
        </div>

        @if (session('status'))
          <div class="mb-4 fs-6 text-success">
            Kami telah mengirim link untuk mengatur ulang password anda. Silakan klik link tersebut.
          </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
          @csrf

          <x-form.floating-input name="email" class="mb-4" autofocus>Email</x-form.floating-input>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
