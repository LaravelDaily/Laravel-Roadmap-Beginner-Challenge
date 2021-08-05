@props(['route', 'entity'])

<form
  action="{{ route($route.'.update', $entity->id) }}"
  method="POST"
  class="w-full"
>
  @csrf
  @method('PATCH')
  <x-auth-validation-errors></x-auth-validation-errors>

  <div class="flex justify-between">
    <x-input
      type="text"
      name="name"
      class="flex-1 mr-4"
      value="{{ old('name') ?? $entity->name }}"
    />
    <div class="inline-flex items-center space-x-2">
      <x-button class="bg-green-600 hover:bg-green-500">Save</x-button>
      <x-button type="button">
        <a href="{{ route($route.'.index') }}">Cancel</a>
      </x-button>
    </div>
  </div>
</form>
