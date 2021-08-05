@props(['route', 'entity'])

<div>{{ $entity->name }}</div>
<div class="inline-flex items-center space-x-2">
  <a href="{{ route($route.'.index', ['edit' => $entity->id]) }}">
    <x-icons.edit class="h-4 w-4 hover:text-gray-700" />
  </a>
  <div
    x-data
    @click.prevent="$dispatch('open-delete-modal', {
      route: '{{ route($route.'.destroy', $entity->id) }}',
      entity: '{{ $entity->name }}',
      subText: '',
    })"
  >
    <x-icons.delete class="h-5 w-5 hover:text-red-600 fill-current" />
  </div>
</div>
