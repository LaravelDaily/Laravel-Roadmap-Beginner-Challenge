@extends('layouts.app')


@section('content')

    <table class="m-3 divide-y divide-gray-200 w-1/2 mx-auto">
        @if (session('createdSuccess'))
            <br><br>
            <div id="create-success-message" class="flex items-center p-4 mb-4 text-sm text-green-800
                    rounded-lg bg-green-50
     dark:bg-gray-800
    dark:text-green-400 w-1/5 mx-auto"
                 role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success!</span> {{ session('createdSuccess')['message'] }}
                </div>
            </div>
        @endif
        @if (session('deletedSuccess'))
            <br><br>
            <div id="delete-success-message" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50
     dark:bg-gray-800
    dark:text-green-400 w-1/5 mx-auto"
                 role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success!</span> {{ session('deletedSuccess')['message'] }}
                </div>
            </div>
        @endif
        @if (session('updatedSuccess'))
            <br><br>
            <div id="update-success-message" class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg
            bg-green-50
             dark:bg-gray-800
            dark:text-green-400 w-1/5 mx-auto"
                 role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success!</span> {{ session('updatedSuccess')['message'] }}
                    <br>
                    <span>Old: {{ session('updatedSuccess')['oldName'] }}</span>
                    <br>
                    <span>New: {{ session('updatedSuccess')['newName'] }}</span>
                </div>
                @endif

                <caption class="px-6 py-3 text-left text-lg font-medium text-gray-500 uppercase tracking-wider">
                    Categories
                    List
                </caption>
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Name
                    </th>
                    {{--<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Tag
                    </th>--}}
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Created
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Updated
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Edit
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                        Delete
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($categories as $category)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-gray-200' }}">
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->name }}</td>
                        {{--<td class="px-6 py-4 whitespace-nowrap w-1/3">
                            @php
                                //coleção vazia é criada
                                $tags = collect();
                                /* Seleciona/itera todos os Artigos relacionados a Categoria.
                                 * $category→articles é uma relação definida no modelo Category
                                */
                                foreach($category->articles as $article) {
                                    /* Itera sobre cada article_tag associado ao artigo atual.
                                    * $article→article_tags é uma relação definida no modelo Article
                                    * que retorna todos os article_tags associados ao artigo. */
                                    foreach($article->article_tags as $article_tag) {
                                        /* Aqui, verificamos se a tag associada ao article_tag atual não é nula.
                                        * Se não for nula, o nome da tag é adicionado à coleção $tags.
                                        * $article_tag→tag é uma relação definida no modelo ArticleTag que retorna
                                        * a tag associada ao article_tag.
                                        * —>name acessa o nome dessa tag.
                                        * Isso evita o erro de tentar acessar a propriedade "name" em null quando a tag
                                        * foi excluída, mas ainda está referenciada em article_tags. */
                                        if ($article_tag->tag !== null) {
                                            $tags->push($article_tag->tag->name);
                                        }
                                    }
                                }
                            @endphp

                            --}}{{--Este é um comando if do Blade que verifica se a coleção $tags está vazia.
                            ->isEmpty() é um método das coleções do Laravel que retorna true se a coleção
                            estiver vazia e false caso contrário.--}}{{--
                            @if($tags->isEmpty())
                                No tags
                                --}}{{--Se a coleção $tags não estiver vazia, os nomes das tags são unidos em uma
                                única string, separados por vírgulas. .toArray() é um método das coleções
                                do Laravel que converte a coleção em um array. implode() é uma função PHP
                                que une os elementos de um array em uma string, usando o delimitador fornecido
                                (neste caso, uma vírgula seguida de um espaço).--}}{{--
                            @else
                                {{ implode(', ', $tags->toArray()) }}
                            @endif

                        </td>--}}
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">{{ $category->updated_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap w-1/3">
                            <a href="{{ route('category.edit', $category->id) }}" class="text-white bg-blue-700
                            hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto
                    px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                        </td>
                    @include('categories.destroy', ['route' => route('category.destroy', $category->id)])
                @endforeach
                </tbody>
            </div>
    </table>

    <div class="mt-6 flex justify-center w-full">
        <br><br>
        {{ $categories->links() }}
    </div>


    <script>
        window.onload = function () {
            setTimeout(function () {
                const updateElement = document.getElementById('update-success-message');
                const deleteElement = document.getElementById('delete-success-message');
                const createElement = document.getElementById('create-success-message');

                if (updateElement) {
                    updateElement.style.display = 'none';
                }

                if (deleteElement) {
                    deleteElement.style.display = 'none';
                }

                if (createElement) {
                    createElement.style.display = 'none';
                }
            }, 5000); // 5000 milissegundos = 5 segundos
        };
    </script>

@endsection