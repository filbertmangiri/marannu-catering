<x-app-layout dashboard title="Pemakaian: {{ Date::parse($usageHistory->used_at)->format('l, j F Y H:i:s') }}">
  @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.css" />
  @endpush

  <h3>{{ $usageHistory->label ?? '' }}</h3>
  <h5 class="mb-2">{{ Date::parse($usageHistory->used_at)->format('l, j F Y') }}</h5>

  <x-alert />

  <table id="usagesTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col" width="60%">Bahan Makanan</th>
        <th scope="col">Kuantitas</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($usageHistory->usages as $usage)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            @if ($usage->foodstuff_id)
              <a href="{{ route('foodstuff.show', $usage->foodstuff->slug) }}" class="text-reset">{{ $usage->name }}</a>
            @else
              {{ $usage->name }}
              <span class="badge rounded-pill text-bg-danger ms-3">Telah dihapus</span>
            @endif
          </td>
          <td>{{ "$usage->quantity $usage->measurement_unit" }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const usagesTable = $('#usagesTable').DataTable({
          language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json'
          },
          bInfo: false,
          scrollY: '45vh',
          scrollX: true,
          scrollCollapse: true,
          paging: false,
          fixedColumns: {
            left: 0,
            right: 1,
            heightMatch: 'none'
          },
          fixedColumns: true
        })
      })
    </script>
  @endpush
</x-app-layout>
