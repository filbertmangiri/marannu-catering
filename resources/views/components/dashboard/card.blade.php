@props(['href', 'img'])

<div class="col">
  <a href="{{ $href }}" class="card rounded-4 rounded shadow text-reset text-decoration-none">
    <img src="{{ $img }}" class="card-img-top rounded-4 rounded-bottom" alt="{{ $slot }}">
    <div class="card-body">
      <p class="card-text">{{ $slot }}</p>
    </div>
  </a>
</div>
