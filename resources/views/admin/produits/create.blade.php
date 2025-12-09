@extends('layouts.admin')

@section('title', isset($produit) ? 'Modifier le produit' : 'Nouveau produit')
@section('page-title', isset($produit) ? 'Modifier le produit' : 'Nouveau produit')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">{{ isset($produit) ? 'Modifier le produit' : 'Nouveau produit' }}</h2>
        <small class="text-muted">Remplissez les informations du médicament</small>
    </div>

    <a href="{{ route('admin.produits.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Retour à la liste
    </a>
</div>


<form action="{{ isset($produit) ? route('admin.produits.update', $produit) : route('admin.produits.store') }}" method="POST">
    @csrf
    @if(isset($produit))
        @method('PUT')
    @endif


    {{-- CARD INFORMATIONS GENERALES --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-info-circle"></i> Informations générales
        </div>

        <div class="card-body">
            <div class="row g-4">

                {{-- Désignation commerciale --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Désignation commerciale <span class="text-danger">*</span></label>
                    <input type="text" name="designation_commerciale"
                           class="form-control @error('designation_commerciale') is-invalid @enderror"
                           value="{{ old('designation_commerciale', $produit->designation_commerciale ?? '') }}">
                    @error('designation_commerciale') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- DCI --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">DCI <span class="text-danger">*</span></label>
                    <input type="text" name="dci"
                           class="form-control @error('dci') is-invalid @enderror"
                           value="{{ old('dci', $produit->dci ?? '') }}">
                    @error('dci') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Dosage --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Dosage <span class="text-danger">*</span></label>
                    <input type="text" name="dosage"
                           class="form-control @error('dosage') is-invalid @enderror"
                           placeholder="Ex: 500mg"
                           value="{{ old('dosage', $produit->dosage ?? '') }}">
                    @error('dosage') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Forme --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Forme pharmaceutique <span class="text-danger">*</span></label>
                    <select name="forme" class="form-select @error('forme') is-invalid @enderror">
                        <option value="">Sélectionner une forme</option>
                        @foreach(['Comprimé','Gélule','Sirop','Injection','Solution','Pommade','Suppositoire'] as $f)
                            <option value="{{ $f }}" {{ old('forme', $produit->forme ?? '') == $f ? 'selected' : '' }}>{{ $f }}</option>
                        @endforeach
                    </select>
                    @error('forme') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Conditionnement --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Conditionnement <span class="text-danger">*</span></label>
                    <input type="text" name="conditionnement"
                           class="form-control @error('conditionnement') is-invalid @enderror"
                           placeholder="Ex: Boîte de 30 comprimés"
                           value="{{ old('conditionnement', $produit->conditionnement ?? '') }}">
                    @error('conditionnement') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Catégorie --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Catégorie <span class="text-danger">*</span></label>
                    <select name="category" class="form-select @error('category') is-invalid @enderror">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach(['Antibiotique','Antalgique','Anti-inflammatoire','Antihypertenseur','Antidiabétique','Vitamines','Autre'] as $cat)
                            <option value="{{ $cat }}" {{ old('category', $produit->category ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>
        </div>
    </div>



    {{-- CARD LABORATOIRE --}}
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <i class="bi bi-building"></i> Informations du laboratoire
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nom du laboratoire <span class="text-danger">*</span></label>
                    <input type="text" name="nom_laboratoire"
                           class="form-control @error('nom_laboratoire') is-invalid @enderror"
                           value="{{ old('nom_laboratoire', $produit->nom_laboratoire ?? '') }}">
                    @error('nom_laboratoire') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pays d'origine <span class="text-danger">*</span></label>
                    <input type="text" name="pays_origine"
                           class="form-control @error('pays_origine') is-invalid @enderror"
                           value="{{ old('pays_origine', $produit->pays_origine ?? '') }}">
                    @error('pays_origine') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Titulaire AMM <span class="text-danger">*</span></label>
                    <input type="text" name="titulaire_amm"
                           class="form-control @error('titulaire_amm') is-invalid @enderror"
                           value="{{ old('titulaire_amm', $produit->titulaire_amm ?? '') }}">
                    @error('titulaire_amm') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pays du titulaire AMM <span class="text-danger">*</span></label>
                    <input type="text" name="pays_titulaire_amm"
                           class="form-control @error('pays_titulaire_amm') is-invalid @enderror"
                           value="{{ old('pays_titulaire_amm', $produit->pays_titulaire_amm ?? '') }}">
                    @error('pays_titulaire_amm') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>
        </div>
    </div>



    {{-- CARD AMM --}}
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <i class="bi bi-file-earmark-text"></i> Informations AMM
        </div>

        <div class="card-body">
            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Numéro d'enregistrement <span class="text-danger">*</span></label>
                    <input type="number" name="num_enregistrement"
                           class="form-control @error('num_enregistrement') is-invalid @enderror"
                           value="{{ old('num_enregistrement', $produit->num_enregistrement ?? '') }}">
                    @error('num_enregistrement') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Date AMM</label>
                    <input type="date" name="date_amm"
                           class="form-control @error('date_amm') is-invalid @enderror"
                           value="{{ old('date_amm', isset($produit) && $produit->date_amm ? $produit->date_amm->format('Y-m-d') : '') }}">
                    @error('date_amm') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Statut AMM</label>
                    <select name="statut_amm" class="form-select @error('statut_amm') is-invalid @enderror">
                        <option value="">Sélectionner un statut</option>
                        @foreach(['Valide','En attente','Expiré','Suspendu'] as $status)
                            <option value="{{ $status }}" {{ old('statut_amm', $produit->statut_amm ?? '') == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                    @error('statut_amm') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>
        </div>
    </div>


    {{-- ACTIONS --}}
    <div class="d-flex gap-3">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> {{ isset($produit) ? 'Mettre à jour' : 'Enregistrer' }}
        </button>

        <a href="{{ route('admin.produits.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-x-circle"></i> Annuler
        </a>
    </div>

</form>

@endsection
