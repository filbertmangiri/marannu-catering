@props(['inputGroupText', 'type' => 'text', 'step' => null, 'name', 'old' => null, 'class' => '', 'autofocus' => false])

<div class="input-group {{ $class }}">
  <span class="input-group-text">{{ $inputGroupText }}</span>

  <div class="form-floating flex-grow-1">
    <input
      type="{{ $type }}"
      {!! $step ? 'step="' . $step . '"' : '' !!}
      name="{{ $name }}"
      value="{{ $old ? old($name, $old) : old($name) }}"
      placeholder=" "
      class="form-control @error($name) is-invalid @enderror"
      {{ $autofocus ? 'autofocus' : '' }}
    >
    <label>{{ $slot }}</label>
  </div>

  @error($name)
    <hr class="d-none is-invalid">
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
