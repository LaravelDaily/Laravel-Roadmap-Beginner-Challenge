<div>
    <form method="POST" action="{{ route('auth.categories.update', $category) }}" >
        @csrf
        @method('PATCH')
 {{-- holy shit con esto... fixear plz --}}
        Name: <input type="text" name="name" value="{{ $category->name }}"><br>

        <input type="submit">
    </form>
</div>