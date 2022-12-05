<x-app-layout dashboard title="Pembelian Bahan Makanan">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/datatables.min.css') }}" />
  @endpush

  <x-alert />

  <a href="{{ route('foodstuff.purchase.create') }}" class="btn btn-outline-dark">Tulis Pembelian Baru</a>

  <table id="purchasesTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Label</th>
        <th>Bahan Makanan</th>
        <th>Tanggal Pembelian</th>
        <th class="no-sort" width="100px"></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($purchases as $purchase)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $purchase->label ?? '-' }}</td>
          <td>{{ $purchase->purchases_count }} Jenis</td>
          <td>{{ Date::parse($purchase->purchased_at)->format('l, j F Y') }}</td>
          <td>
            <a href="{{ route('foodstuff.purchase.show', $purchase->id) }}" class="btn btn-sm btn-outline-dark">Lihat Detail</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @push('scripts')
    <script src="{{ asset('assets/vendor/jquery-3.6.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const purchasesTable = $('#purchasesTable').DataTable({
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
          fixedColumns: true,
          columnDefs: [{
            targets: 'no-sort',
            orderable: false
          }]
        })
      })
    </script>
  @endpush
</x-app-layout>
