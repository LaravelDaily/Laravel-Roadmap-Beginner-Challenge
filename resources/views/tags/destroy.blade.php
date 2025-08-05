<form method="POST" action="{{ $route }}" id="deleteForm{{ $tag->id }}">
    @csrf
    @method('DELETE')
    <td>
        <button type="button" onclick="confirmDelete({{ $tag->id }})" class="text-white bg-blue-700 hover:bg-blue-800
        focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto
        px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete
        </button>
    </td>
</form>

<script>
    function confirmDelete(id) {
        if (confirm('Você realmente quer excluir este arquivo?')) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>