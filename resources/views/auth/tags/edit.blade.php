<div>
    <form method="POST" action="{{ route('auth.tags.update', $tag) }}" >
        @csrf
        @method('PATCH')
 {{-- holy shit con esto... fixear plz --}}
        Name: <input type="text" name="name" value="{{ $tag->name }}"><br>

        <input type="submit">
    </form>
</div>