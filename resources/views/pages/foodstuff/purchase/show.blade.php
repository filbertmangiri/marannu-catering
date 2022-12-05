<x-app-layout dashboard title="Pembelian: {{ Date::parse($purchaseHistory->purchased_at)->format('l, j F Y') }}">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/datatables.min.css') }}" />
  @endpush

  <h3>{{ $purchaseHistory->label ?? '' }}</h3>
  <h5 class="mb-2">{{ Date::parse($purchaseHistory->purchased_at)->format('l, j F Y') }}</h5>

  <x-alert />

  <table id="purchasesTable" class="table table-striped table-hover w-100">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col" width="40%">Bahan Makanan</th>
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
            @if ($purchase->foodstuff_id)
              <a href="{{ route('foodstuff.show', $purchase->foodstuff->slug) }}" class="text-reset">{{ $purchase->name }}</a>
            @else
              {{ $purchase->name }}
              <span class="badge rounded-pill text-bg-danger ms-3">Telah dihapus</span>
            @endif
          </td>
          <td>{{ "$purchase->quantity $purchase->measurement_unit" }}</td>
          <td>
            {{ "Rp $purchase->price per $purchase->measurement_unit" }}

            @if ($purchase->foodstuff)
              @if ($purchase->price > $purchase->foodstuff->price)
                <button class="btn" onclick="alertPrice({{ $purchase->foodstuff_id }}, {{ $purchase->foodstuff->price }}, {{ $purchase->price }}, '{{ $purchase->measurement_unit }}')">
                  <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                </button>
              @elseif ($purchase->price < $purchase->foodstuff->price)
                <button class="btn" onclick="alertPrice({{ $purchase->foodstuff_id }}, {{ $purchase->foodstuff->price }}, {{ $purchase->price }}, '{{ $purchase->measurement_unit }}')">
                  <i class="bi bi-info-circle-fill text-warning fs-5"></i>
                </button>
              @endif
            @endif
          </td>
          <td>{{ 'Rp ' . $purchase->quantity * $purchase->price }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <form method="POST" id="changePriceForm">
    @csrf
    @method('PATCH')

    <input type="hidden" name="price">
  </form>

  @push('scripts')
    <script src="{{ asset('assets/vendor/jquery-3.6.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2-11.6.15/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        const purchasesTable = $('#purchasesTable').DataTable({
          language: {
            url: '{{ asset('assets/vendor/DataTables/language/id.json') }}'
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

      const alertPrice = (id, old_price, price, measurement_unit) => {
        const form = $('#changePriceForm')
        const priceInput = form.find('input[name="price"]')

        form.attr('action', `/foodstuff/${id}/patch`)
        priceInput.val(price)

        Swal.fire({
          title: 'HAL TAK WAJAR',
          icon: 'warning',
          html: `
            Harga lebih ${price > old_price ? 'tinggi' : 'rendah'} dibandingkan harga yang diketahui saat ini. <br><br>
            Apakah anda ingin mengkonfirmasi perubahan harga tersebut? Jika ya, maka harga saat ini akan diperbarui<br><br>
            Rp ${old_price} per ${measurement_unit} <br>
            <i class="bi bi-chevron-double-down"></i><br>
            <b>Rp ${price} per ${measurement_unit}</b>
          `,
          confirmButtonText: 'Konfirmasi',
          showCancelButton: true,
          cancelButtonText: 'Kembali'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit()
          } else {
            priceInput.val(null)
          }
        })
      }
    </script>
  @endpush
</x-app-layout>
