<x-app-layout dashboard title="Bahan Makanan">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/datatables.min.css') }}" />
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
        <th class="no-sort" width="150px"></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($foodstuffs as $foodstuff)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <a href="{{ route('foodstuff.show', $foodstuff->slug) }}" class="text-reset">
              {{ $foodstuff->name }}
            </a>
          </td>
          <td>{{ "{$foodstuff->quantity} {$foodstuff->measurement_unit->value}" }}</td>
          <td>{{ "Rp {$foodstuff->price} per {$foodstuff->measurement_unit->value}" }}</td>
          <td>
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
    <script src="{{ asset('assets/vendor/jquery-3.6.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2-11.6.15/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const foodstuffsTable = $('#foodstuffsTable').DataTable({
          language: {
            url: '{{ asset('assets/vendor/DataTables/language/id.json') }}'
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
          fixedColumns: true,
          createdRow: function(row, data, dataIndex) {
            const quantity = Number(data[2].split(' ')[0])

            if (quantity <= 0) {
              $(row).addClass('bg-warning');
              $(row).find('.btn-outline-warning').removeClass('btn-outline-warning').addClass('btn-outline-dark')
            }
          }
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
