@if ($paginator->hasPages())
    <nav class="pagination-custom col-4">
        <ul class="tableau-pagination">
            <!-- Lien Précédent de la pagination -->

            @if ($paginator->onFirstPage())
                <li class="pagination-element disabled">
                    <span class="fas pagination-disabled">
                        
                    </span>
                </li>
            @else
                <li class="pagination-element">
                    <a href="{{ $paginator->previousPageUrl() }}" class="fas pagination-lien">
                        
                    </a>
                </li>
            @endif

            <!-- Affichage des numéros de pagination -->

            @foreach ($elements as $element)

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-element"><span class="pagination-disabled">{{ $page }}</span></li>
                        @else
                            <li class="pagination-element"><a href="{{ $url }}" class="pagination-lien">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif

            @endforeach

            <!-- Lien Suivant de la pagination -->

            @if ($paginator->hasMorePages())
                <li class="pagination-element">
                    <a href="{{ $paginator->nextPageUrl() }}" class="fas pagination-lien">
                        
                    </a>
                </li>
            @else
                <li class="pagination-element disabled">
                    <span class="fas pagination-disabled">
                        
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif