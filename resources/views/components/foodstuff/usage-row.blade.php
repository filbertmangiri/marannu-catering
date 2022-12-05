@props(['foodstuffs', 'row'])

<tr>
  <input type="hidden" name="measurement_unit[]" @isset($row) value="{{ old('measurement_unit.' . $row) }}" @endisset class="foodstuff-measurement-unit">

  <td>
    <select name="foodstuff_id[]" class="foodstuff-select @isset($row) @error('foodstuff_id.' . $row) is-invalid @enderror @endisset" data-placeholder="Pilih">
      <option></option>

      @foreach ($foodstuffs as $foodstuff)
        <option value="{{ $foodstuff->id }}" data-stock="{{ $foodstuff->quantity }}" data-price="{{ $foodstuff->price }}" data-measurement_unit="{{ $foodstuff->measurement_unit }}" @isset($row) {{ $foodstuff->id == old('foodstuff_id.' . $row) ? 'selected' : '' }} @endisset>{{ $foodstuff->name }}</option>
      @endforeach
    </select>

    @isset($row)
      @error('foodstuff_id.' . $row)
        <hr class="d-none is-invalid">
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    @endisset
  </td>

  <td>
    <div class="input-group">
      <input type="number" step="0.1" name="stock[]" @isset($row) value="{{ old('stock.' . $row) }}" @endisset class="form-control foodstuff-stock" readonly>
      <span class="input-group-text foodstuff-quantity-measurement-unit">
        @isset($row)
          {{ old('measurement_unit.' . $row) ?? '...' }}
        @else
          ...
        @endisset
      </span>
    </div>
  </td>

  <td>
    <div class="input-group">
      <input type="number" step="0.1" name="quantity[]" @isset($row) value="{{ old('quantity.' . $row) }}" @endisset class="form-control @isset($row) @error('quantity.' . $row) is-invalid @enderror @endisset">
      <span class="input-group-text foodstuff-quantity-measurement-unit">
        @isset($row)
          {{ old('measurement_unit.' . $row) ?? '...' }}
        @else
          ...
        @endisset
      </span>

      @isset($row)
        @error('quantity.' . $row)
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      @endisset
    </div>
  </td>

  <td>
    <button type="button" class="btn btn-outline-danger foodstuff-row-delete-button">Hapus</button>
  </td>
</tr>
