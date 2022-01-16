<!-- post card -->
@props(['post'])
<div class="flex shadow-lg rounded-lg mx-4 md:mx-auto my-10 max-w-md md:max-w-2xl">
    <div class="flex items-start px-4 py-6 bg-white w-full">
        <div class="w-full">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 -mt-1 hover:font-bold"><a
                        href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <small class="text-sm text-gray-700"> {{ $post->created_at->diffForHumans() }} </small>
            </div>
            <p class="mt-3 text-gray-700 text-sm">
                {!! $post->excerpt  !!}
                <span class="">
                    <a class="text-indigo-600 font-semibold" href="/posts/{{ $post->slug }}">Read More</a>
                </span>
            </p>

            <div class="flex">
                <div class="mt-2 flex-1">
                    @foreach($post->tags as $tag)
                        <a href="/?tag={{ $tag->slug }}"> #{{ $tag->name }}</a>
                    @endforeach
                </div>

                <div class="mt-2 flex">
                    <small class="text-sm text-gray-700 ml-2"> <a
                            href="/?category={{ $post->category->slug }}">{{ $post->category->name }}</a> </small>
                </div>

            </div>
        </div>
    </div>
</div>
