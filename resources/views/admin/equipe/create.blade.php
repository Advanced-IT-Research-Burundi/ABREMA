@extends('layouts.admin')

@section('title', 'Créer un membre de l\'équipe')
@section('page-title', 'Ajouter un Membre de la Direction')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('admin.equipe-directions.index') }}">Équipe</a>
    <span>/</span>
    <span>Nouveau</span>
@endsection

@section('content')

<div class="form-page">

    <div class="card">
        <div class="card-header">
            <h4>Ajouter un membre de la direction</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.equipe-directions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NOM ET PRENOM --}}
                <div class="form-group mb-3">
                    <label for="nom_prenom">Nom & Prénom</label>
                    <input type="text" name="nom_prenom" class="form-control" value="{{ old('nom_prenom') }}" required>
                    @error('nom_prenom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- PHOTO --}}
                <div class="form-group mb-3">
                    <label for="photo">Photo (optionnel)</label>
                    <input type="file" name="photo" class="form-control">
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="form-group mb-3">
                    <label for="description">Description / Fonction</label>
                    <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="form-group mb-3">
                    <label for="email">Adresse Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- UTILISATEUR ASSOCIE --}}
                {{-- <div class="form-group mb-3">
                    <label for="user_id">Utilisateur associé (optionnel)</label>
                    <select name="user_id" class="form-control">
                        <option value="">Aucun</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}

                {{-- SUBMIT --}}
                <div class="form-group mt-3">
                    <button class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('admin.equipe-directions.index') }}" class="btn btn-secondary">Annuler</a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
