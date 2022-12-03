<x-app-layout title="{{ $foodstuff->name }}">
  @dump($foodstuff->getAttributes())
</x-app-layout>
