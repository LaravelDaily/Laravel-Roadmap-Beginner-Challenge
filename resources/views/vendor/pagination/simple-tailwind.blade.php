@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation"
         class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between ">
        <div class="inline-flex mt-2 xs:mt-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span
                    class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                {!! __('pagination.previous') !!}
            </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                    {!! __('pagination.previous') !!}
                </a>
            @endif
            &nbsp; &nbsp;
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                {!! __('pagination.next') !!}
            </span>
            @endif
        </div>
    </nav>
@endif
