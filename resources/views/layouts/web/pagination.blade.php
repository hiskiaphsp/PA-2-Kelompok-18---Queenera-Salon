@if($paginator->hasPages())
<div class="d-flex justify-content-end">
    <div class="pagination-wrap hstack gap-2">
        @if($paginator->onFirstPage())
        <a class="page-item pagination-prev disabled" href="javascript:;">
            Previous
        </a>
        @else
        <a class="page-item pagination-prev paginasi" href="javascript:;" halaman="{{ $paginator->previousPageUrl() }}">
            Previous
        </a>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
        <a class="page-item pagination-prev disabled" href="javascript:;">
            {{ $element }}
        </a>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a class="page-item pagination-prev active" href="javascript:;">
            {{ $page }}
        </a>
        @else
        <a class="page-item pagination-prev paginasi" href="javascript:;" halaman="{{ $url }}">
            {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach
        @if($paginator->hasMorePages())
        <a class="page-item pagination-prev paginasi" href="javascript:;" halaman="{{ $paginator->nextPageUrl() }}">
            Next
        </a>
        @else
        <a class="page-item pagination-prev disabled" href="javascript:;">
            Next
        </a>
        @endif
    </div>
</div>
@endif
