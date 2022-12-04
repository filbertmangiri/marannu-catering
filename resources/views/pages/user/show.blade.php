<x-app-layout dashboard title="{{ $user->name }}">
  <x-alert />

  @dump($user->toArray())
</x-app-layout>
