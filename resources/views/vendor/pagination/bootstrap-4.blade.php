@if ($paginator->hasPages())
    <nav>
        <ul class="pagination-box">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="Previous" aria-hidden="true">Previous</a>
                </li> --}}
            @else
                <li>
                    <a class="Previous" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Anterior</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <a>{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a>{{ $page }}</a></li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="Next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Siguiente</a>
                </li>
            @else
                {{-- <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="Next" aria-hidden="true">Next</span>
                </li> --}}
            @endif
        </ul>
    </nav>
@endif
