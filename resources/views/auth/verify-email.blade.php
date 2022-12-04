<x-app-layout title="Verifikasi Email">
  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        <div class="fs-6 mb-4">
          Email anda harus terverifikasi, silakan klik link di email yang telah kami kirimkan.
        </div>

        @if (session('status') == 'verification-link-sent')
          <div class="mb-4 fs-6 text-success">
            Link verifikasi yang baru telah dikirimkan ke {{ auth()->user()->email }}. Silakan cek kembali.
          </div>
        @endif

        <div class="d-flex justify-content-start">
          <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="btn btn-outline-dark me-3">Kirim Ulang</button>
          </form>

          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-outline-danger">
              Keluar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
