<x-app-layout dashboard title="Dashboard">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-5 g-sm-3 g-md-4">
    @can('viewAny', 'App/Models/Foodstuff/Foodstuff')
      <x-dashboard.card :href="route('foodstuff.index')" img="https://media.premiumtimesng.com/wp-content/files/2019/02/foodstuffs.jpg">
        Bahan Makanan
      </x-dashboard.card>
    @endcan
  </div>
</x-app-layout>
