@props([
    'type' => 'text',
    'step' => null,
    'name',
    'old' => null,
    'aliasName' => null,
    'class' => '',
    'autocomplete' => 'off',
    'autofocus' => false,
])

<div class="form-floating {{ $class }}">
  <input type="{{ $type }}" {!! $step ? 'step="' . $step . '"' : '' !!} name="{{ $name }}" value="{{ $old ? old($name, $old) : old($name) }}" class="form-control rounded-4 @error($name) is-invalid @elseif ($aliasName && $errors->has($aliasName)) is-invalid @enderror" placeholder=" " autocomplete="{{ $autocomplete }}" {{ $autofocus ? 'autofocus' : '' }}>
  <label>{{ $slot }}</label>

  @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @elseif ($aliasName && $errors->has($aliasName))
    <div class="invalid-feedback">
      {{ $errors->first($aliasName) }}
    </div>
  @enderror
</div>
