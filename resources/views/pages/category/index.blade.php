<x-pages.category.layout>
    
    @if ($errors->any())
        @foreach ($errors->all() as $error) 
        <p>{{ $error }}</p>
        @endforeach
    @endif
    <table class="table-auto w-full mt-4">
        <thead>
          <tr>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="text-center">
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{route('categories.edit', $category->id)}}">
                            <x-button>Edit</x-button>
                        </a>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                            @method('DELETE')
                            @csrf
                            
                            <x-button class="mt-1">
                                {{ __('Delete') }}
                            </x-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $categories->links() }}

</x-pages.category.layout>
