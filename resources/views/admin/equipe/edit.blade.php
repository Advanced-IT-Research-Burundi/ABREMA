@extends('layouts.admin')

@section('title', 'Modifier un membre')
@section('page-title', 'Modifier membre : ' . $equipe_direction->nom_prenom)

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.equipe-directions.update', $equipe_direction) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nom & Prénom</label>
                <input type="text" name="nom_prenom" class="form-control" 
                       value="{{ $equipe_direction->nom_prenom }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email (optionnel)</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $equipe_direction->email }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Photo (URL ou chemin)</label>
                <input type="text" name="photo" class="form-control"
                       value="{{ $equipe_direction->photo }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $equipe_direction->description }}</textarea>
            </div>

            <button class="btn btn-primary">Mettre à jour</button>
        </form>

    </div>
</div>

@endsection
