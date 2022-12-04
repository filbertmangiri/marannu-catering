<x-app-layout dashboard title="Bahan Makanan">
  @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.css" />
  @endpush

  <x-alert />

  <div class="mb-3 mb-md-0">
    <a href="{{ route('foodstuff.create') }}" class="btn btn-outline-dark">Tambah</a>
    <a href="{{ route('foodstuff.purchase.index') }}" class="btn btn-outline-dark">Pembelian</a>
    <a href="{{ route('foodstuff.usage.index') }}" class="btn btn-outline-dark">Pemakaian</a>
  </div>

  <table id="foodstuffsTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kuantitas</th>
        <th>Harga saat ini</th>
        <th class="no-sort" width="200px"></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($foodstuffs as $foodstuff)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $foodstuff->name }}</td>
          <td>{{ "{$foodstuff->quantity} {$foodstuff->measurement_unit->value}" }}</td>
          <td>{{ "Rp {$foodstuff->price} per {$foodstuff->measurement_unit->value}" }}</td>
          <td>
            <a href="{{ route('foodstuff.show', $foodstuff->slug) }}" class="btn btn-sm btn-outline-dark">
              Lihat
            </a>

            <a href="{{ route('foodstuff.edit', $foodstuff->slug) }}" class="btn btn-sm btn-outline-warning">
              Ubah
            </a>

            <form action="{{ route('foodstuff.destroy', $foodstuff->slug) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')

              <button type="button" class="btn btn-sm btn-outline-danger" id="deleteFoodstuffButton">
                Hapus
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const foodstuffsTable = $('#foodstuffsTable').DataTable({
          language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json'
          },
          scrollY: '45vh',
          scrollX: true,
          scrollCollapse: true,
          paging: false,
          fixedColumns: {
            left: 0,
            right: 1,
            heightMatch: 'none'
          },
          columnDefs: [{
            targets: 'no-sort',
            orderable: false
          }],
          fixedColumns: true
        })
      })

      $(document).on('click', '#deleteFoodstuffButton', function() {
        Swal.fire({
          title: 'Anda yakin ingin menghapus bahan makanan ini?',
          icon: 'warning',
          confirmButtonText: 'Hapus',
          showCancelButton: true,
          cancelButtonText: 'Kembali'
        }).then((result) => {
          if (result.isConfirmed) {
            $(this).parents('form').submit()
          }
        })
      })
    </script>
  @endpush
</x-app-layout>
