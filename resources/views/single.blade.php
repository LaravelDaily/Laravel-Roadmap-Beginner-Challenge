@extends('layouts.master')

@section('content')
    <div class="bg-gray-100 py-1">
        <div class="grid md:grid-cols-4 gap-8 md:mx-32 md:my-10">
            <div class="">
                <div class="mt-10 md:mt-40 mx-3">
                    <h4 class="text-blue-900 font-bold text-2xl">
                        {{ __('NEW ARTICLES') }}
                    </h4>
                </div>
                <div class="mt-6">
                    @foreach($latestArticles as $latest)
                    <div class="border-b border-gray-300 mx-3 py-3 hover:text-red-700 capitalize">
                        <a href="{{ route('articles.view', $latest->id) }}">{{ $latest->title }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-3">
                <div class="py-6 px-6 flex items-center justify-center">
                    <img src="{{ $article->image_url }}" alt="" class="w-2/3">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold uppercase text-blue-900">{{ $article->title }}</h2>
                </div>
                @if($article->category)
                <div class="py-0 px-6">
                    <h2 class="text-sm font-bold text-gray-600 capitalize">{{ $article->category->name }}</h2>
                </div>
                @endif
                <div class="p-10">
                    <p class="text-gray-500"> {{ $article->full_text }} </p>
                </div>
            </div>
        </div>
    </div>
@endsection
