<x-app-layout dashboard title="User">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/datatables.min.css') }}" />

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
    <script src="{{ asset('assets/vendor/jquery-3.6.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2-11.6.15/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const usersTable = $('#usersTable').DataTable({
          language: {
            url: '{{ asset('assets/vendor/DataTables/language/id.json') }}'
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

      $(document).on('click', '#deleteUserButton', function() {
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
