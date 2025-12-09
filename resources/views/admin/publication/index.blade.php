{{-- PUBLICATIONS INDEX: admin/publications/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Publications')
@section('page-title', 'Gestion des Publications')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Publications scientifiques</h2>
        <p style="color: #666; margin-top: 5px;">Documents et recherches publiés</p>
    </div>
    <a href="{{ route('admin.publications.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouvelle publication
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
            @forelse($publications as $publication)
            <tr>
                <td>
                    @if($publication->image)
                        <img src="{{ Storage::url($publication->image) }}" 
                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                    @else
                        <div style="width: 60px; height: 60px; background: var(--light); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-book" style="color: #ccc;"></i>
                        </div>
                    @endif
                </td>
                <td><strong>{{ $publication->title }}</strong></td>
                <td>{{ Str::limit($publication->description, 60) }}</td>
                <td>{{ $publication->created_at->format('d/m/Y') }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.publications.edit', $publication) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.publications.destroy', $publication) }}" method="POST" onsubmit="return confirm('Supprimer ?');">
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
                <td colspan="5" style="text-align: center; padding: 40px;">Aucune publication</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection