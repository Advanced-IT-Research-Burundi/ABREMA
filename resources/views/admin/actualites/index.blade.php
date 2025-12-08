@extends('admin.layout')

@section('title', 'Actualités')

@section('content')
<div class="page-header">
    <h1 class="page-title">Actualités</h1>
    <div class="page-breadcrumb">
        <a href="{{ route('admin.dashboard') }}">Accueil</a>
        <span>/</span>
        <span>Actualités</span>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Liste des actualités</h2>
        <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nouvelle actualité
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($actualites as $actualite)
                <tr>
                    <td>
                        @if($actualite->image)
                        <img src="{{ asset('storage/' . $actualite->image) }}" alt="" class="table-image">
                        @else
                        <div class="table-image-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                        @endif
                    </td>
                    <td>{{ $actualite->title }}</td>
                    <td>{{ Str::limit($actualite->description, 50) }}</td>
                    <td>{{ $actualite->user->name ?? 'N/A' }}</td>
                    <td>{{ $actualite->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.actualites.show', $actualite->id) }}" class="btn btn-sm btn-info" title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="btn btn-sm btn-warning" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.actualites.destroy', $actualite->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Aucune actualité trouvée</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($actualites->hasPages())
    <div class="pagination-wrapper">
        {{ $actualites->links() }}
    </div>
    @endif
</div>

@endsection