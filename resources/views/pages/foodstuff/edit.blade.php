@php
  use App\Enums\MeasurementUnit;
@endphp

<x-app-layout title="{{ $foodstuff->name }}">
  @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
  @endpush

  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        <form action="{{ route('foodstuff.update', $foodstuff->slug) }}" method="POST" id="editFoodstuffForm">
          @csrf
          @method('PUT')

          <x-form.floating-input name="name" aliasName="slug" old="{{ $foodstuff->name }}" class="mb-3">Nama Bahan Makanan</x-form.floating-input>
          <x-form.floating-input-group type="number" name="price" old="{{ $foodstuff->price }}" class="mb-3">
            <x-slot name="inputGroupText">Rp</x-slot>
            Harga
          </x-form.floating-input-group>

          <div class="mb-4">
            <select name="measurement_unit" class="form-select @error('measurement_unit') is-invalid @enderror">
              @php($oldMeasurementUnit = old('measurement_unit', $foodstuff->measurement_unit))

              <option disabled {{ !$oldMeasurementUnit ? 'selected' : '' }}>Pilih Satuan Hitung</option>

              @foreach (MeasurementUnit::cases() as $measurementUnit)
                <option value="{{ $measurementUnit }}" {{ $measurementUnit === $oldMeasurementUnit ? 'selected' : '' }}>{{ $measurementUnit->long() }}</option>
              @endforeach
            </select>

            @error('measurement_unit')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Simpan</button>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#editFoodstuffForm select').select2({
          theme: 'bootstrap-5',
          width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
        })
      })
    </script>
  @endpush
</x-app-layout>
