@props(['href', 'img'])

<div class="col">
  <a href="{{ $href }}" class="card rounded-4 shadow text-reset text-decoration-none h-100">
    <div class="card-img-top rounded-4 rounded-bottom d-flex align-items-center justify-content-center">
      <img src="{{ $img }}" alt="{{ $slot }}" class="img-fluid w-100 rounded-4 rounded-bottom">
    </div>
    <div class="card-body">
      <div class="card-text fs-5 fw-bold">{{ $slot }}</div>
    </div>
  </a>
</div>
