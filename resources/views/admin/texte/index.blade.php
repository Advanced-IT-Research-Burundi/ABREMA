{{-- resources/views/admin/texte-reglementaires/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Textes réglementaires')
@section('page-title', 'Textes réglementaires')

@section('content')
<div class="page-header">
    <h2 class="page-title">Gestion des textes réglementaires</h2>
    <a href="{{ route('admin.texte-reglementaires.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouveau texte
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th width="120">Fichier</th>
                    <th width="120">Date</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($textes as $texte)
                <tr>
                    <td><strong>{{ $texte->title }}</strong></td>
                    <td>
                        @if($texte->pathfile)
                        <a href="{{ asset('storage/' . $texte->pathfile) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-download"></i> Voir
                        </a>
                        @else
                        <span style="color: #999;">Aucun</span>
                        @endif
                    </td>
                    <td>{{ $texte->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.texte-reglementaires.edit', $texte) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.texte-reglementaires.destroy', $texte) }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Supprimer ce texte ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 40px; color: #999;">
                        <i class="fas fa-file-alt" style="font-size: 48px; margin-bottom: 15px; display: block;"></i>
                        Aucun texte réglementaire
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection