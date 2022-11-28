<x-app-layout title="Bahan Makanan">
  @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/r-2.4.0/datatables.min.css" />
  @endpush

  @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <i class="bi bi-check-circle-fill"></i>

      {{ session('message') }}

      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <a href="{{ route('foodstuff.create') }}" class="btn btn-outline-dark mb-3 mb-md-0">Tambah</a>

  <table id="foodstuffsTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kuantitas</th>
        <th>Harga</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($foodstuffs as $foodstuff)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $foodstuff->name }}</td>
          <td>{{ "{$foodstuff->quantity} {$foodstuff->measurement_unit->value}" }}</td>
          <td>{{ "Rp {$foodstuff->price} per {$foodstuff->measurement_unit->value}" }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/r-2.4.0/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        $('#foodstuffsTable').DataTable({
          language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json'
          },
          scrollX: true,
          scrollCollapse: true,
          paging: false,
          fixedColumns: {
            left: 0,
            right: 1,
            heightMatch: 'none'
          }
        })
      })
    </script>
  @endpush
</x-app-layout>
