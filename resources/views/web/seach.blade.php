{{-- resources/views/web/search.blade.php --}}
@extends('layouts.base')
@section('content')

    <div class="page-wrapper">
        <div class="page-section">
            <h2 class="page-section-title">
                Résultats de la recherche pour "{{ $query }}"
            </h2>

            @if ($results->isEmpty() && $query) {{-- Added check for $query being non-empty for better UX --}}
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
                            
                            {{-- Dynamically generate the route name. Ensure the routes exist in web.php --}}
                            @php
                                $modelName = strtolower(class_basename($item->itemable_type));
                                // Handle specific model naming inconsistencies (e.g., AvisPublic becomes avispublic)
                                if ($modelName === 'avispublic') $modelName = 'avispublic'; 
                                
                                $routeName = $modelName . '.show';
                            @endphp

                            {{-- Check if the route actually exists before linking --}}
                            @if ($item->itemable && Route::has($routeName))
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
