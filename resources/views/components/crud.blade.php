@props(['route', 'entities', 'entityName'])

<x-app-layout>
  <x-crud-helpers.header :title="$entityName">
    <div class="text-right mb-2">
      <a href="{{ route($route.'.index', ['create']) }}">
        <x-button>Create new {{ $entityName }}</x-button>
      </a>
    </div>
  </x-header>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:mx-6 lg:mx-8 sm:p-6 lg:p-8 bg-white rounded-xl">
      <div>
        @if (Request::has('create'))
          <x-crud-helpers.create :route="$route" :entityName="$entityName" />
        @else
        @endif
        @if ($entities)
          <ul>
            @foreach ($entities as $entity)
              <li class="flex justify-between py-1">
                @if (Request::has('edit') && $entity->id == Request::query('edit'))
                  <x-crud-helpers.edit :route="$route" :entity="$entity" />
                @else
                  <x-crud-helpers.show :route="$route" :entity="$entity" />
                @endif
              </li>
            @endforeach
          </ul>
        @else
          No {{ Str::of($entityName)->plural() }} have been created yet.
        @endif
      </div>
    </div>
  </div>
</x-app-layout>
