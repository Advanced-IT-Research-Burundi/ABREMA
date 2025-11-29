@extends('layouts.admin')

@section('title', 'Détails du membre')
@section('page-title', 'Membre : ' . $equipe_direction->nom_prenom)

@section('content')

<div class="card">
    <div class="card-body">

        <h3>{{ $equipe_direction->nom_prenom }}</h3>

        @if($equipe_direction->photo)
            <img src="{{ $equipe_direction->photo }}" alt="photo" class="img-fluid mb-3"
                 style="max-height: 200px;">
        @endif

        <p><strong>Email : </strong> {{ $equipe_direction->email ?? 'N/A' }}</p>

        <p><strong>Description :</strong></p>
        <p>{{ $equipe_direction->description ?? 'Aucune description.' }}</p>

        <a href="{{ route('admin.equipe-directions.index') }}" class="btn btn-secondary mt-3">
            Retour
        </a>

    </div>
</div>

@endsection
