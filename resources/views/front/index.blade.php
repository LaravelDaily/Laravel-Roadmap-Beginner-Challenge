@extends('front.layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-xl text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl text-center tracking-tight font-extrabold text-gray-900 dark:text-white">Homepage</h2>
                @foreach($categories as $id => $name)
                    <span
                        class="bg-indigo-100 text-indigo-800 text-md m-1 font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                                                    clip-rule="evenodd"></path><path
                              d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                        <a href="{{route('category.index', $id)}}">{{$name}}</a>
                  </span>
                @endforeach
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                @foreach($articles as $article)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-center mb-3">
                        @if(Storage::disk('public')->exists('article/images/'.$article->image))
                        <img class="h-auto rounded-lg" src="{{asset('storage/article/images/'. $article->image)}}" alt="image description">
                            @else
                            <img class="h-auto rounded-lg" width="550" height="220" src="{{asset('default.png')}}" alt="article image">
                        @endif
                    </div>
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span
                      class="bg-indigo-100 text-indigo-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-800">
                      <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd"
                                                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                                                    clip-rule="evenodd"></path><path
                              d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                      {{$article->category->name}}
                  </span>
                        <span class="text-sm">{{$article->created_at->diffForHumans()}}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{$article->title}}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400 overflow-y">{{\Illuminate\Support\Str::limit($article->content, 200)}}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <b>Author by:</b><span class="font-medium dark:text-white">{{$article->author->name}}</span>
                        </div>
                        <a href="{{route('blog.detail', [$article->category->id, $article->slug])}}"
                           class="inline-flex items-center font-medium text-indigo-600 dark:text-indigo-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            <div class="flex flex-col mt-5">
                {{$articles->links()}}
            </div>
        </div>
    </section>
@endsection
