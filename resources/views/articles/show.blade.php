@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4 py-5">
        <div class="max-w-md mx-auto bg-neutral-400 shadow-lg rounded-lg md:max-w-5xl">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">
                    <div class="mx-auto">
                        <img src="{{ asset($article->resized_image) }}" alt="{{ $article->title }}" class="w-full h-96
                        object-cover rounded"><br>
                    </div>
                    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
                    <p class="text-lg text-gray-700 mb-4">{{ $article->full_text }}</p>

                    <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
                        <div>
                            <span><strong>Author:</strong>     {{ $article->user->name }} </span><br>
                            <span><strong>Created at:</strong> {{ $article->created_at->format('d/m/Y') }}</span><br>
                            <span><strong>Updated at:</strong> {{ $article->updated_at->format('d/m/Y') }}</span>
                        </div>
                        @auth()
                            <div>
                                <a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn mr-4
                            bg-green-500 text-white px-4 py-2 rounded block mb-2">Edit</a>

                                <form action="{{ route('article.destroy', ['id' => $article->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn mr-4 bg-red-500 text-white px-4 py-2 rounded
                                block">Delete</button>
                                </form>
                            </div>
                        @endauth
                        <div>
                            {{--Neste código, $article->category ? $article->category->name : 'No related category' é uma
                            expressão condicional inline. Ela verifica se $article->category é verdadeiro
                            (ou seja, não null). Se for verdadeiro, ela retorna $article->category->name. Se for falso
                            (ou seja, null), ela retorna a string 'No related category'.--}}
                            <span><strong>Category:</strong> {{ $article->category->name ?? 'No Related category' }}
                            </span><br>
                            @php
                                // Pega todas as tags associadas ao artigo.
                                $tagNames = $article->article_tags()->with('tag')->get()->pluck('tag.name')->filter()->toArray();
                            @endphp
                            <span><strong>Name Tags:</strong>
                            {{-- Verifica se a coleção de nomes de tags está vazia. Se estiver vazia, exibe 'No Related Tags'.
                            Caso contrário, junta todos os nomes das tags em uma única string, separados por vírgulas. --}}
                                {{ empty($tagNames) ? 'No Related Tags' : implode(', ', $tagNames) }}
                            </span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection