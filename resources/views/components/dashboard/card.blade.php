@props(['href', 'img'])

<div class="col">
  <a href="{{ $href }}" class="card rounded-4 rounded shadow text-reset text-decoration-none h-100">
    <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 150px">
      <img src="{{ $img }}" alt="{{ $slot }}" class="img-fluid rounded-4 rounded-bottom mw-100 mh-100">
    </div>
    <div class="card-body">
      <p class="card-text">{{ $slot }}</p>
    </div>
  </a>
</div>
