<x-app-layout dashboard title="Tulis Pembelian Baru">
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2-4.1.0/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2-bootstrap-5-theme-1.3.0/select2-bootstrap-5-theme.min.css') }}" />
  @endpush

  <form action="{{ route('foodstuff.purchase.store') }}" method="POST">
    @csrf

    <x-form.floating-input name="label" class="mb-3" autofocus>Label (opsional)</x-form.floating-input>
    <x-form.floating-input type="date" name="purchased_at" old="{{ date('Y-m-d') }}" class="mb-3">Tanggal Pembelian</x-form.floating-input>

    <table class="table" id="createPurchaseTable">
      <thead>
        <tr>
          <th scope="col" class="w-50">Nama Bahan Makanan</th>
          <th scope="col" class="w-25">Kuantitas</th>
          <th scope="col" class="w-25">Harga</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @if ($rowsCount = old('rows_count'))
          @foreach (range(0, $rowsCount - 1) as $row)
            <x-foodstuff.purchase-row :foodstuffs="$foodstuffs" row="{{ $row }}" />
          @endforeach
        @endif
      </tbody>
    </table>

    @error('rows_count')
      <div class="alert alert-danger alert-dismissible" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>

        {{ $message }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @enderror

    <input type="hidden" name="rows_count" value="{{ old('rows_count') }}" id="foodstuffRowsCount">

    <button type="button" class="btn btn-sm btn-outline-success mb-3" id="foodstuffAddRowButton">Tambah Baris</button>

    <button type="button" class="btn btn-lg btn-dark rounded-4 d-block w-100" id="createPurchaseButton">Selesai</button>
  </form>

  <template id="foodstuffRow">
    <x-foodstuff.purchase-row :foodstuffs="$foodstuffs" />
  </template>

  @push('scripts')
    <script src="{{ asset('assets/vendor/jquery-3.6.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2-4.1.0/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2-11.6.15/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript">
      let rowsCount = {{ old('rows_count') ?? 0 }}

      const foodstuffRowInit = () => {
        $('.foodstuff-select').select2({
          theme: 'bootstrap-5',
          width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
        })
      }

      const foodstuffCreateRow = () => {
        const tbody = document.querySelector('#createPurchaseTable>tbody')
        const template = document.querySelector('#foodstuffRow')

        const clone = template.content.cloneNode(true)

        tbody.appendChild(clone)

        foodstuffRowInit()

        $('#foodstuffRowsCount').val(++rowsCount)
      }

      $(document).ready(() => {
        if (!('content' in document.createElement('template'))) {
          Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Browser anda tidak support untuk menggunakan fitur ini!'
          })

          return
        }

        @if (!old('rows_count'))
          foodstuffCreateRow()
        @endif

        foodstuffRowInit()
      })

      $(document).on('change', '.foodstuff-select', function() {
        const row = $(this).closest('tr')
        const selected = $(this).find(':selected')
        const measurement_unit = selected.data('measurement_unit')

        row.find('.foodstuff-quantity-measurement-unit').html(measurement_unit)
        row.find('.foodstuff-price').val(selected.data('price'))
        row.find('.foodstuff-price-measurement-unit').html('/ ' + measurement_unit)
        row.find('.foodstuff-measurement-unit').val(measurement_unit)
      })

      $(document).on('click', '.foodstuff-row-delete-button', function() {
        const row = $(this).closest('tr')

        row.remove()

        $('#foodstuffRowsCount').val(--rowsCount)
      })

      $('#foodstuffAddRowButton').click(() => {
        foodstuffCreateRow()
      })

      $('#createPurchaseButton').click(function() {
        Swal.fire({
          title: 'Anda yakin ingin menyelesaikan pembelian ini?',
          icon: 'warning',
          html: 'Sekalinya anda menyudahi pembelian ini, maka tidak akan bisa anda ubah lagi',
          confirmButtonText: 'Selesai',
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
