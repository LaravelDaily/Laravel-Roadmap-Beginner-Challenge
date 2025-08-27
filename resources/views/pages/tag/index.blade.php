<x-pages.tag.layout>
    
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
            @foreach ($tags as $tag)
                <tr class="text-center">
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}">
                            <x-button>Edit</x-button>
                        </a>
                        <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
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

      {{ $tags->links() }}

</x-pages.tag.layout>
