<x-site-layout>

    <x-slot name="title">I am Title </x-slot>

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                {{-- <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2021</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div> --}}
                <!-- Nested row for non-featured blog posts-->
                <div class="row">

                    @foreach ($articles as $article)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="{{ route('article', $article->id)}}">
                                    @if ($article->getFirstMediaUrl('images'))
                                        <img class="card-img-top" src="{{ $article->getFirstMediaUrl('images') }}" alt="..." />
                                    @else
                                        <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." />
                                    @endif
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $article->created_at->format('M d, Y') }}</div>
                                    <h2 class="card-title h4">{{ $article->title }}</h2>
                                    <p class="card-text">{{ substr($article->fulltext, 0, 50)}}...</p>
                                    <a class="btn btn-primary" href="{{ route('article', $article->id)}}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    

                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />

                    
                    {{ $articles->links() }}


{{--                     
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul> --}}
                </nav>
            </div>
            <!-- Side widgets-->
            <x-sidewidgets />
        </div>
    </div>


</x-site-layout>
