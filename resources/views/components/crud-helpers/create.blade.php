@props(['route', 'entityName'])

<form
  action="{{ route($route.'.store') }}"
  method="POST"
>
  @csrf
  <x-auth-validation-errors></x-auth-validation-errors>

  <x-label for="name">New {{ $entityName }} Name</x-label>
  <div class="flex justify-between">
    <div class="w-full mr-4">
      <x-input
      type="text"
      name="name"
      id="name"
      class="flex-1 w-full"
      value="{{ old('name') }}"
    />
    </div>
    <div class="inline-flex items-center space-x-2">
      <x-button class="bg-green-600 hover:bg-green-500">Save</x-button>
      <x-button type="button">
        <a href="{{ route($route.'.index') }}">Cancel</a>
      </x-button>
    </div>
  </div>
</form>
