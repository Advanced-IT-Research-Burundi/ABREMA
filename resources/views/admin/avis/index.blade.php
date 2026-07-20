{{-- AVIS PUBLICS INDEX: admin/avis-publics/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Avis Publics')
@section('page-title', 'Gestion des Avis Publics')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Avis publics</h2>
        <p style="color: #666; margin-top: 5px;">Communiqués et annonces officielles</p>
    </div>
    <a href="{{ route('admin.avis-publics.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouvel avis
    </a>
</div>

<div class="card">
    <table class="data-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($avisPublics as $avis)
            <tr>
                <td><strong>{{ $avis->title }}</strong></td>
                <td>{{ $avis->contenu }}</td>
                <td>{{ Str::limit($avis->description, 50) }}</td>
                <td>{{ $avis->created_at->format('d/m/Y') }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.avis-publics.edit', $avis) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.avis-publics.destroy', $avis) }}" method="POST" onsubmit="return confirm('Supprimer ?');">
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
                <td colspan="5" style="text-align: center; padding: 40px;">Aucun avis public</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection