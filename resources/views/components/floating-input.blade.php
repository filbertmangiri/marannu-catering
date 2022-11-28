@props([
    'type' => 'text',
    'step' => null,
    'name',
    'aliasName' => null,
    'class' => '',
    'autofocus' => false,
])

<div class="form-floating {{ $class }}">
  <input type="{{ $type }}" {!! $step ? 'step="' . $step . '"' : '' !!} name="{{ $name }}" class="form-control rounded-4 @error($name) is-invalid @elseif ($aliasName && $errors->has($aliasName)) is-invalid @enderror" value="{{ old($name) }}" placeholder=" " {{ $autofocus ? 'autofocus' : '' }}>
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
