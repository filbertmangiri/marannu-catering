<x-app-layout dashboard title="User">
  @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.css" />

    <style type="text/css">
      table.dataTable tbody td {
        vertical-align: middle;
      }
    </style>
  @endpush

  <x-alert />

  <table id="usersTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username</th>
        <th>Jenis Kelamin</th>
        <th>Jabatan</th>

        <th class="no-sort"></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <a href="{{ route('user.show', $user->username) }}" class="text-reset">{{ $user->name }}</a>
          </td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->gender->locale() }}</td>
          <td>{{ $user->role->locale() }}</td>
          <td>
            @can('update', $user)
              <a href="{{ route('user.edit', $user->username) }}" class="btn btn-sm btn-outline-warning">
                Ubah
              </a>
            @endcan

            @can('delete', $user)
              <form action="{{ route('user.destroy', $user->username) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-sm btn-outline-danger" id="deleteUserButton">
                  Hapus
                </button>
              </form>
            @endcan
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
        const usersTable = $('#usersTable').DataTable({
          language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json'
          },
          scrollY: '55vh',
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

      $(document).on('click', '#deleteUserButton', function(event) {
        event.preventDefault()

        Swal.fire({
          title: 'Anda yakin ingin menghapus user ini?',
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
