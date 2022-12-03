<x-app-layout title="Pembelian: {{ Date::parse($purchaseHistory->purchased_at)->format('l, j F Y') }}">
  @push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.css" />
  @endpush

  {{-- @dump($purchaseHistory->purchases[1]->toArray()) --}}

  <h3>{{ $purchaseHistory->label ?? '' }}</h3>
  <h3 class="mb-2">{{ Date::parse($purchaseHistory->purchased_at)->format('l, j F Y') }}</h3>

  <table id="purchasesTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col" width="40%">Nama</th>
        <th scope="col">Kuantitas</th>
        <th scope="col">Harga</th>
        <th scope="col">Total</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($purchaseHistory->purchases as $purchase)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            {{ $purchase->name }}
            @if (!$purchase->foodstuff)
              <span class="badge rounded-pill text-bg-danger ms-3">Telah dihapus</span>
            @endif
          </td>
          <td>{{ "$purchase->quantity $purchase->measurement_unit" }}</td>
          <td>
            {{ "Rp $purchase->price per $purchase->measurement_unit" }}

            @if ($purchase->foodstuff)
              @if ($purchase->price > $purchase->foodstuff->price)
                <button class="btn" onclick="alertPrice({{ $purchase->foodstuff_id }}, {{ $purchase->foodstuff->price }}, {{ $purchase->price }}, '{{ $purchase->measurement_unit }}')">
                  <i class="bi bi-exclamation-triangle text-danger"></i>
                </button>
              @elseif ($purchase->price < $purchase->foodstuff->price)
                <button class="btn" onclick="alertPrice({{ $purchase->foodstuff_id }}, {{ $purchase->foodstuff->price }}, {{ $purchase->price }}, '{{ $purchase->measurement_unit }}')">
                  <i class="bi bi-info-circle text-warning"></i>
                </button>
              @endif
            @endif
          </td>
          <td>{{ 'Rp ' . $purchase->quantity * $purchase->price }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/date-1.2.0/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const foodstuffsTable = $('#purchasesTable').DataTable({
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
          columnDefs: [{
            targets: 'no-sort',
            orderable: false
          }],
          fixedColumns: true
        })
      })

      const alertPrice = (id, old_price, price, measurement_unit) => {
        Swal.fire({
          title: 'HAL TAK WAJAR',
          icon: 'warning',
          html: `
            Harga lebih ${price > old_price ? 'tinggi' : 'rendah'} dibandingkan harga yang diketahui saat ini. <br><br>
            Apakah anda ingin mengkonfirmasi perubahan harga tersebut? Jika ya, maka harga saat ini akan diubah<br><br>
            Rp ${old_price} per ${measurement_unit} <br>
            <i class="bi bi-chevron-double-down"></i><br>
            <b>Rp ${price} per ${measurement_unit}</b>
          `,
          confirmButtonText: 'Konfirmasi',
          showCancelButton: true,
          cancelButtonText: 'Kembali'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: `/foodstuff/${id}/patch`,
              type: 'POST',
              data: {
                _token: '{{ csrf_token() }}',
                _method: 'PATCH',
                price
              },

              success: () => {
                location.reload()
              }
            })
          }
        })
      }
    </script>
  @endpush
</x-app-layout>
