<x-app-layout dashboard title="Pemakaian Bahan Makanan">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/datatables.min.css') }}" />
  @endpush

  <x-alert />

  <a href="{{ route('foodstuff.usage.create') }}" class="btn btn-outline-dark">Tulis Pemakaian Baru</a>

  <table id="usagesTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Label</th>
        <th>Bahan Makanan</th>
        <th>Tanggal Pemakaian</th>
        <th width="100px"></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($usages as $usage)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $usage->label ?? '-' }}</td>
          <td>{{ $usage->usages_count }} Jenis</td>
          <td>{{ Date::parse($usage->used_at)->format('l, j F Y') }}</td>
          <td>
            <a href="{{ route('foodstuff.usage.show', $usage->id) }}" class="btn btn-sm btn-outline-dark">Lihat Detail</a>
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
        const usagesTable = $('#usagesTable').DataTable({
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
