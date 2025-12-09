@extends('layouts.admin')

@section('title', isset($produit) ? 'Modifier le produit' : 'Nouveau produit')
@section('page-title', isset($produit) ? 'Modifier le produit' : 'Nouveau produit')

@section('styles')
<style>
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 14px;
        color: #333;
    }

    .form-group label .required {
        color: var(--danger);
        margin-left: 3px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.2s;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(44, 122, 78, 0.1);
    }

    .form-control.error {
        border-color: var(--danger);
    }

    .error-message {
        color: var(--danger);
        font-size: 12px;
        margin-top: 5px;
    }

    select.form-control {
        cursor: pointer;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--primary);
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">{{ isset($produit) ? 'Modifier le produit' : 'Nouveau produit' }}</h2>
        <p style="color: #666; margin-top: 5px;">Remplissez les informations du médicament</p>
    </div>
    <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour à la liste
    </a>
</div>

<form action="{{ isset($produit) ? route('admin.produits.update', $produit) : route('admin.produits.store') }}" method="POST">
    @csrf
    @if(isset($produit))
        @method('PUT')
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fas fa-info-circle"></i> Informations générales
        </div>
        <div class="card-body">
            <div class="form-grid">
                <div class="form-group">
                    <label for="designation_commerciale">
                        Désignation commerciale <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="designation_commerciale" 
                           name="designation_commerciale" 
                           class="form-control @error('designation_commerciale') error @enderror" 
                           value="{{ old('designation_commerciale', $produit->designation_commerciale ?? '') }}" 
                           required>
                    @error('designation_commerciale')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dci">
                        DCI (Dénomination Commune Internationale) <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="dci" 
                           name="dci" 
                           class="form-control @error('dci') error @enderror" 
                           value="{{ old('dci', $produit->dci ?? '') }}" 
                           required>
                    @error('dci')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dosage">
                        Dosage <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="dosage" 
                           name="dosage" 
                           class="form-control @error('dosage') error @enderror" 
                           value="{{ old('dosage', $produit->dosage ?? '') }}" 
                           placeholder="Ex: 500mg"
                           required>
                    @error('dosage')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="forme">
                        Forme pharmaceutique <span class="required">*</span>
                    </label>
                    <select id="forme" 
                            name="forme" 
                            class="form-control @error('forme') error @enderror" 
                            required>
                        <option value="">Sélectionner une forme</option>
                        <option value="Comprimé" {{ old('forme', $produit->forme ?? '') == 'Comprimé' ? 'selected' : '' }}>Comprimé</option>
                        <option value="Gélule" {{ old('forme', $produit->forme ?? '') == 'Gélule' ? 'selected' : '' }}>Gélule</option>
                        <option value="Sirop" {{ old('forme', $produit->forme ?? '') == 'Sirop' ? 'selected' : '' }}>Sirop</option>
                        <option value="Injection" {{ old('forme', $produit->forme ?? '') == 'Injection' ? 'selected' : '' }}>Injection</option>
                        <option value="Solution" {{ old('forme', $produit->forme ?? '') == 'Solution' ? 'selected' : '' }}>Solution</option>
                        <option value="Pommade" {{ old('forme', $produit->forme ?? '') == 'Pommade' ? 'selected' : '' }}>Pommade</option>
                        <option value="Suppositoire" {{ old('forme', $produit->forme ?? '') == 'Suppositoire' ? 'selected' : '' }}>Suppositoire</option>
                    </select>
                    @error('forme')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="conditionnement">
                        Conditionnement <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="conditionnement" 
                           name="conditionnement" 
                           class="form-control @error('conditionnement') error @enderror" 
                           value="{{ old('conditionnement', $produit->conditionnement ?? '') }}" 
                           placeholder="Ex: Boîte de 30 comprimés"
                           required>
                    @error('conditionnement')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">
                        Catégorie <span class="required">*</span>
                    </label>
                    <select id="category" 
                            name="category" 
                            class="form-control @error('category') error @enderror" 
                            required>
                        <option value="">Sélectionner une catégorie</option>
                        <option value="Antibiotique" {{ old('category', $produit->category ?? '') == 'Antibiotique' ? 'selected' : '' }}>Antibiotique</option>
                        <option value="Antalgique" {{ old('category', $produit->category ?? '') == 'Antalgique' ? 'selected' : '' }}>Antalgique</option>
                        <option value="Anti-inflammatoire" {{ old('category', $produit->category ?? '') == 'Anti-inflammatoire' ? 'selected' : '' }}>Anti-inflammatoire</option>
                        <option value="Antihypertenseur" {{ old('category', $produit->category ?? '') == 'Antihypertenseur' ? 'selected' : '' }}>Antihypertenseur</option>
                        <option value="Antidiabétique" {{ old('category', $produit->category ?? '') == 'Antidiabétique' ? 'selected' : '' }}>Antidiabétique</option>
                        <option value="Vitamines" {{ old('category', $produit->category ?? '') == 'Vitamines' ? 'selected' : '' }}>Vitamines</option>
                        <option value="Autre" {{ old('category', $produit->category ?? '') == 'Autre' ? 'selected' : '' }}>Autre</option>
                    </select>
                    @error('category')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-building"></i> Informations du laboratoire
        </div>
        <div class="card-body">
            <div class="form-grid">
                <div class="form-group">
                    <label for="nom_laboratoire">
                        Nom du laboratoire <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="nom_laboratoire" 
                           name="nom_laboratoire" 
                           class="form-control @error('nom_laboratoire') error @enderror" 
                           value="{{ old('nom_laboratoire', $produit->nom_laboratoire ?? '') }}" 
                           required>
                    @error('nom_laboratoire')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pays_origine">
                        Pays d'origine <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="pays_origine" 
                           name="pays_origine" 
                           class="form-control @error('pays_origine') error @enderror" 
                           value="{{ old('pays_origine', $produit->pays_origine ?? '') }}" 
                           required>
                    @error('pays_origine')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulaire_amm">
                        Titulaire AMM <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="titulaire_amm" 
                           name="titulaire_amm" 
                           class="form-control @error('titulaire_amm') error @enderror" 
                           value="{{ old('titulaire_amm', $produit->titulaire_amm ?? '') }}" 
                           required>
                    @error('titulaire_amm')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pays_titulaire_amm">
                        Pays du titulaire AMM <span class="required">*</span>
                    </label>
                    <input type="text" 
                           id="pays_titulaire_amm" 
                           name="pays_titulaire_amm" 
                           class="form-control @error('pays_titulaire_amm') error @enderror" 
                           value="{{ old('pays_titulaire_amm', $produit->pays_titulaire_amm ?? '') }}" 
                           required>
                    @error('pays_titulaire_amm')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-file-contract"></i> Informations AMM
        </div>
        <div class="card-body">
            <div class="form-grid">
                <div class="form-group">
                    <label for="num_enregistrement">
                        Numéro d'enregistrement <span class="required">*</span>
                    </label>
                    <input type="number" 
                           id="num_enregistrement" 
                           name="num_enregistrement" 
                           class="form-control @error('num_enregistrement') error @enderror" 
                           value="{{ old('num_enregistrement', $produit->num_enregistrement ?? '') }}" 
                           required>
                    @error('num_enregistrement')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date_amm">
                        Date AMM
                    </label>
                    <input type="date" 
                           id="date_amm" 
                           name="date_amm" 
                           class="form-control @error('date_amm') error @enderror" 
                           {{-- value="{{ old('date_amm', isset($produit) && $produit->date_amm ? $produit->date_amm->format('Y-m-d') : '') }}"> --}}
                    @error('date_amm')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="statut_amm">
                        Statut AMM
                    </label>
                    <select id="statut_amm" 
                            name="statut_amm" 
                            class="form-control @error('statut_amm') error @enderror">
                        <option value="">Sélectionner un statut</option>
                        <option value="Valide" {{ old('statut_amm', $produit->statut_amm ?? '') == 'Valide' ? 'selected' : '' }}>Valide</option>
                        <option value="En attente" {{ old('statut_amm', $produit->statut_amm ?? '') == 'En attente' ? 'selected' : '' }}>En attente</option>
                        <option value="Expiré" {{ old('statut_amm', $produit->statut_amm ?? '') == 'Expiré' ? 'selected' : '' }}>Expiré</option>
                        <option value="Suspendu" {{ old('statut_amm', $produit->statut_amm ?? '') == 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                    </select>
                    @error('statut_amm')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($produit) ? 'Mettre à jour' : 'Enregistrer' }}
                </button>
                <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </div>
    </div>
</form>
@endsection