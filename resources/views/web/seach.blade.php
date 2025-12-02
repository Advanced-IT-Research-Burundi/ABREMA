{{-- resources/views/web/search.blade.php --}}
@extends('layouts.base')
@section('content')

    <div class="page-wrapper">
        <div class="page-section">
            <h2 class="page-section-title">
                Résultats de la recherche pour "{{ $query }}"
            </h2>

            @if ($results->isEmpty() && $query)
                {{-- Added check for $query being non-empty for better UX --}}
                <p class="page-text">
                    Aucun résultat trouvé pour votre recherche.
                </p>
            @elseif(!$results->isEmpty())
                <ul class="search-results-list">
                    @foreach ($results as $item)
                        <li>
                            <span class="result-type" style="font-size: 0.8em; color: #666; margin-right: 8px;">
                                {{ class_basename($item->itemable_type) }}
                            </span>

                            {{-- Map itemable types to web route names (adjust names to match your routes) --}}
                            @php
                                $routeMap = [
                                    \App\Models\Actualite::class => 'actualites.show',
                                    \App\Models\AvisPublic::class => 'avispublic.show',
                                    \App\Models\Publication::class => 'publications.show',
                                    \App\Models\TexteReglementaire::class => 'textereglementaire.show',
                                    \App\Models\Client::class => 'clients.show',
                                    \App\Models\Colis::class => 'colis.show',
                                    // add other mappings here...
                                ];

                                $type = $item->itemable_type;
                                $routeName = $routeMap[$type] ?? null;
                            @endphp

                            {{-- Only create a link if itemable relation exists AND route exists in web.php --}}
                            @if ($item->itemable && $routeName && Route::has($routeName))
                                <a href="{{ route($routeName, $item->itemable->id) }}" class="result-title">
                                    {{ $item->title }}
                                </a>
                            @else
                                <span class="result-title">{{ $item->title }} (Lien non disponible)</span>
                            @endif

                            <p class="page-text">{{ Str::limit($item->description, 150) }}</p>
                        </li>
                    @endforeach
                </ul>

                <!-- Pagination -->
                <div style="margin-top: 20px;">
                    {{ $results->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection
