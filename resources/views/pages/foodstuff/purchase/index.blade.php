<x-app-layout dashboard title="Pembelian Bahan Makanan">
  @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.css" />
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.js"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const purchasesTable = $('#purchasesTable').DataTable({
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
