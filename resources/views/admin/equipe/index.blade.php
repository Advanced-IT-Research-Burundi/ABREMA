@extends('layouts.admin')

@section('title', 'Équipe de Direction')
@section('page-title', 'Liste des membres')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Membres de la direction</h5>
        <a href="{{ route('admin.equipe-directions.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Ajouter un membre
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom & Prénom</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($equipes as $membre)
                    <tr>
                        <td>{{$membre->photo}}</td>
                        <td>{{ $membre->nom_prenom }}</td>
                        <td>{{ $membre->email }}</td>
                        <td>{{ Str::limit($membre->description, 50) }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.equipe-directions.show', $membre) }}" class="btn btn-sm btn-info">
                                Voir
                            </a>
                            <a href="{{ route('admin.equipe-directions.edit', $membre) }}" class="btn btn-sm btn-warning">
                                Modifier
                            </a>
                            <form action="{{ route('admin.equipe-directions.destroy', $membre) }}" method="POST"
                                  class="d-inline-block"
                                  onsubmit="return confirm('Supprimer ce membre ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Aucun membre trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $equipes->links() }}
        </div>
    </div>
</div>

@endsection
