<div class="row justify-content-center">
  <div class="col col-sm-11 col-md-8 col-lg-6">
    <div class="container-fluid border rounded-4 shadow p-3">
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMeModal">
        Hapus Akun
      </button>
    </div>
  </div>
</div>

@push('modals')
  <div class="modal fade" id="deleteMeModal" tabindex="-1" aria-labelledby="deleteMeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route('profile.destroy') }}" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteMeModalLabel">Hapus Akun</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Anda yakin ingin menghapus akun anda?</p>
            <p>Sekalinya anda menghapus akun, semua data yang anda punya akan hilang secara permanen. Silakan masukkan password anda terlebih dahulu untuk memastikan bahwa anda benar-benar yakin untuk menghapus akun anda.</p>

            <x-form.floating-input type="password" name="password_delete">Password</x-form.floating-input>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>

            <form action="{{ route('profile.destroy') }}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger">Hapus Akun</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endpush

@push('scripts')
  <script type="text/javascript">
    const deleteMeModal = new bootstrap.Modal('#deleteMeModal')

    @if ($errors->has('password_delete'))
      deleteMeModal.show()
    @endif
  </script>
@endpush
