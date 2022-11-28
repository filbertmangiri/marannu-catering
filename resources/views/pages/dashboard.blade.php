<x-app-layout title="Dashboard">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-5 g-sm-3 g-md-4">
    <div class="col">
      <a href="{{ route('foodstuff.index') }}" class="card rounded-4 rounded shadow text-reset text-decoration-none">
        <img src="https://media.premiumtimesng.com/wp-content/files/2019/02/foodstuffs.jpg" class="card-img-top rounded-4 rounded-bottom" alt="Bahan Makanan">
        <div class="card-body">
          <p class="card-text">Bahan Makanan</p>
        </div>
      </a>
    </div>
  </div>
</x-app-layout>
