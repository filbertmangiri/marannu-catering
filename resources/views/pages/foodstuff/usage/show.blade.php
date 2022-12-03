<x-app-layout title="Pemakaian: {{ Date::parse($usage->used_at)->format('l, j F Y H:i:s') }}">
  @dump($usage->toArray())
</x-app-layout>
