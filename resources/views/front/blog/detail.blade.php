@extends('front.layouts.app')
@section('content')
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <div class="space-x-2">
                    <span
                        class="bg-indigo-100 text-indigo-800 text-md mb-3 font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                                                    clip-rule="evenodd"></path><path
                              d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                        <a href="{{route('category.index', $article->category->id)}}">{{$article->category->name}}</a>
                  </span>
                        <div class="inline-flex">
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                <time datetime="{{$article->created_at->format('Y-m-d')}}"
                                      title="{{$article->created_at->format('F d Y')}}">{{$article->created_at->format('F. d, Y')}}</time>
                            </p>
                        </div>
                    </div>
                    <figure><img class="rounded" src="{{asset('storage/article/images/'.$article->image)}}"
                                 alt="{{$article->name}}">
                    </figure>
                    <h1 class="mb-4 mt-6 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{$article->title}}</h1>
                </header>
                <p class="text-justify">{{$article->content}}</p>
                <footer class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <div>
                                <span rel="author"
                                      class="text-xl font-bold justify-between text-gray-900 dark:text-white">{{$article->author->name}} <p
                                        class="text-base text-gray-500 dark:text-gray-400">Author</p>
                                </span>
                            </div>
                        </div>
                    </address>
                </footer>
                @foreach($article->tags as $tag)
                    <span class="relative z-10 mt-15 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"># {{$tag->name}}</span>
                @endforeach
            </article>
        </div>
    </main>
@endsection
