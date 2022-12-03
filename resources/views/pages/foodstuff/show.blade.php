<x-app-layout dashboard title="{{ $foodstuff->name }}">
  @dump($foodstuff->getAttributes())
</x-app-layout>
