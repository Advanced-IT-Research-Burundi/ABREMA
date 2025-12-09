{{-- ACTUALITES INDEX: admin/actualites/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Actualités')
@section('page-title', 'Gestion des Actualités')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Actualités</h2>
        <p style="color: #666; margin-top: 5px;">Publier et gérer les actualités</p>
    </div>
    <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouvelle actualité
    </a>
</div>

<div class="card">
    <table class="data-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($actualites as $actualite)
            <tr>
                <td>
                    @if($actualite->image)
                        <img src="{{ Storage::url($actualite->image) }}" 
                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                    @else
                        <div style="width: 60px; height: 60px; background: var(--light); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-image" style="color: #ccc;"></i>
                        </div>
                    @endif
                </td>
                <td><strong>{{ $actualite->title }}</strong></td>
                <td>{{ Str::limit($actualite->description, 60) }}</td>
                <td>{{ $actualite->created_at->format('d/m/Y') }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.actualites.edit', $actualite) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.actualites.destroy', $actualite) }}" method="POST" onsubmit="return confirm('Supprimer ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 40px;">Aucune actualité</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection