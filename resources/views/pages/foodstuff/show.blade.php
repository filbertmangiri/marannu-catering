<x-app-layout dashboard title="{{ $foodstuff->name }}">
  <div class="row justify-content-center">
    <div class="col col-sm-9 col-md-8 col-lg-5">
      <div class="card container-fluid border rounded-4 shadow p-3">
        <div class="card-header fs-4 fw-bold">
          {{ $foodstuff->name }}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ "{$foodstuff->quantity} {$foodstuff->measurement_unit->locale()}" }}</li>
          <li class="list-group-item">{{ "Rp {$foodstuff->price} per " . strtolower($foodstuff->measurement_unit->value) }}</li>
          <li class="list-group-item">Dibuat pada :<br><small>{{ Date::parse($foodstuff->created_at)->format('l, j F Y H:i:s') }}</small></li>
          <li class="list-group-item">Terakhir diperbarui pada :<br><small>{{ Date::parse($foodstuff->updated_at)->format('l, j F Y H:i:s') }}</small></li>
        </ul>
      </div>
    </div>
  </div>
</x-app-layout>
