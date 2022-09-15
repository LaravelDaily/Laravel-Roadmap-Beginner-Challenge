<x-site-layout>

    <x-slot name="title">{{ $article->title }}</x-slot>

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    
                    @if ($article->getFirstMediaUrl('images'))
                        <img class="card-img-top" src="{{ $article->getFirstMediaUrl('images') }}" alt="..." />
                    @else
                        <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." />
                    @endif

                    <div class="card-body">
                        <div class="small text-muted">{{ $article->created_at->format('M d, Y') }}</div>
                        <div class="small text-muted">Category: {{ $article->category->title }}</div>
                       
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <p class="card-text">{{ $article->fulltext }}</p>
                        <div class="small text-muted">Tags:
                            @foreach ($article->tags as $tag)
                                {{ $tag->title }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <x-sidewidgets />

        </div>
    </div>


</x-site-layout>
