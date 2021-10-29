<header class="bg-blue-700 flex items-center justify-between mb-8 px-16 py-4 shadow-lg">
    <h1 class="font-bold text-2xl text-white">Laravel Daily</h1>

    @auth
        <h5 class="text-white font-bold">Welcome, {{ auth()->user()->name }}</h5>
    @endauth

    <nav class="space-x-1">
        <a href="{{ route('article.index') }}"
           class="border-b-2 border-transparent font-bold hover:border-white text-sm text-white uppercase">Articles</a>

        @admin
        <a href="#" class="border-b-2 border-transparent font-bold hover:border-white text-sm text-white uppercase">Manage</a>
        @endadmin

        @auth
            <form action="{{ route('session.destroy') }}" method="POST" class="inline">
                @method('DELETE')
                @csrf
                <button
                    class="border-b-2 border-transparent font-bold hover:border-white text-sm text-white uppercase inline">
                    Log
                    Out
                </button>
            </form>
        @else
            <a href="{{ route('session.create') }}"
               class="border-b-2 border-transparent font-bold hover:border-white text-sm text-white uppercase">Log In
            </a>
        @endauth

    </nav>
</header>
