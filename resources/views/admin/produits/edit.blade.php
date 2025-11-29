@extends('layouts.admin')

@section('title', 'Modifier Produit')
@section('page-title', 'Modifier le Produit')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('admin.produits.index') }}">Produits</a>
    <span>/</span>
    <span>Modifier #{{ $produit->num_enregistrement }}</span>
@endsection

@section('content')
<div class="form-page">
    <form action="{{ route('admin.produits.update', $produit->id) }}" method="POST" class="product-form">
        @csrf
        @method('PUT')
        
        <div class="form-layout">
            <!-- Main Form -->
            <div class="form-main">
                <!-- Informations Générales -->
                <div class="card form-card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3 class="card-title">Informations Générales</h3>
                        <span class="badge badge-info">ID: {{ $produit->id }}</span>
                    </div>
                    <div class="card-body">
                        <div class="form-grid">
                            <div class="form-group span-2">
                                <label class="form-label required">
                                    <i class="fas fa-capsules"></i>
                                    Désignation Commerciale
                                </label>
                                <input type="text" 
                                       name="designation_commerciale" 
                                       class="form-control @error('designation_commerciale') is-invalid @enderror"
                                       value="{{ old('designation_commerciale', $produit->designation_commerciale) }}"
                                       required>
                                @error('designation_commerciale')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group span-2">
                                <label class="form-label required">
                                    <i class="fas fa-dna"></i>
                                    DCI (Dénomination Commune Internationale)
                                </label>
                                <input type="text" 
                                       name="dci" 
                                       class="form-control @error('dci') is-invalid @enderror"
                                       value="{{ old('dci', $produit->dci) }}"
                                       required>
                                @error('dci')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-weight"></i>
                                    Dosage
                                </label>
                                <input type="text" 
                                       name="dosage" 
                                       class="form-control @error('dosage') is-invalid @enderror"
                                       value="{{ old('dosage', $produit->dosage) }}"
                                       required>
                                @error('dosage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-pills"></i>
                                    Forme Pharmaceutique
                                </label>
                                <select name="forme" 
                                        class="form-control @error('forme') is-invalid @enderror"
                                        required>
                                    <option value="">Sélectionner...</option>
                                    <option value="Comprimé" {{ old('forme', $produit->forme) == 'Comprimé' ? 'selected' : '' }}>Comprimé</option>
                                    <option value="Gélule" {{ old('forme', $produit->forme) == 'Gélule' ? 'selected' : '' }}>Gélule</option>
                                    <option value="Sirop" {{ old('forme', $produit->forme) == 'Sirop' ? 'selected' : '' }}>Sirop</option>
                                    <option value="Suspension" {{ old('forme', $produit->forme) == 'Suspension' ? 'selected' : '' }}>Suspension</option>
                                    <option value="Solution injectable" {{ old('forme', $produit->forme) == 'Solution injectable' ? 'selected' : '' }}>Solution injectable</option>
                                    <option value="Crème" {{ old('forme', $produit->forme) == 'Crème' ? 'selected' : '' }}>Crème</option>
                                    <option value="Pommade" {{ old('forme', $produit->forme) == 'Pommade' ? 'selected' : '' }}>Pommade</option>
                                    <option value="Suppositoire" {{ old('forme', $produit->forme) == 'Suppositoire' ? 'selected' : '' }}>Suppositoire</option>
                                    <option value="Poudre" {{ old('forme', $produit->forme) == 'Poudre' ? 'selected' : '' }}>Poudre</option>
                                </select>
                                @error('forme')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-box"></i>
                                    Conditionnement
                                </label>
                                <input type="text" 
                                       name="conditionnement" 
                                       class="form-control @error('conditionnement') is-invalid @enderror"
                                       value="{{ old('conditionnement', $produit->conditionnement) }}"
                                       required>
                                @error('conditionnement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-tag"></i>
                                    Catégorie
                                </label>
                                <select name="category" 
                                        class="form-control @error('category') is-invalid @enderror"
                                        required>
                                    <option value="">Sélectionner...</option>
                                    <option value="Générique" {{ old('category', $produit->category) == 'Générique' ? 'selected' : '' }}>Générique</option>
                                    <option value="Princeps" {{ old('category', $produit->category) == 'Princeps' ? 'selected' : '' }}>Princeps</option>
                                    <option value="OTC" {{ old('category', $produit->category) == 'OTC' ? 'selected' : '' }}>OTC (Vente Libre)</option>
                                    <option value="Phytothérapie" {{ old('category', $produit->category) == 'Phytothérapie' ? 'selected' : '' }}>Phytothérapie</option>
                                    <option value="Homéopathie" {{ old('category', $produit->category) == 'Homéopathie' ? 'selected' : '' }}>Homéopathie</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations Laboratoire -->
                <div class="card form-card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h3 class="card-title">Informations Laboratoire</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-grid">
                            <div class="form-group span-2">
                                <label class="form-label required">
                                    <i class="fas fa-building"></i>
                                    Nom du Laboratoire
                                </label>
                                <input type="text" 
                                       name="nom_laboratoire" 
                                       class="form-control @error('nom_laboratoire') is-invalid @enderror"
                                       value="{{ old('nom_laboratoire', $produit->nom_laboratoire) }}"
                                       required>
                                @error('nom_laboratoire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-globe"></i>
                                    Pays d'Origine
                                </label>
                                <select name="pays_origine" 
                                        class="form-control @error('pays_origine') is-invalid @enderror"
                                        required>
                                    <option value="">Sélectionner...</option>
                                    <option value="France" {{ old('pays_origine', $produit->pays_origine) == 'France' ? 'selected' : '' }}>France</option>
                                    <option value="Belgique" {{ old('pays_origine', $produit->pays_origine) == 'Belgique' ? 'selected' : '' }}>Belgique</option>
                                    <option value="Allemagne" {{ old('pays_origine', $produit->pays_origine) == 'Allemagne' ? 'selected' : '' }}>Allemagne</option>
                                    <option value="Inde" {{ old('pays_origine', $produit->pays_origine) == 'Inde' ? 'selected' : '' }}>Inde</option>
                                    <option value="Chine" {{ old('pays_origine', $produit->pays_origine) == 'Chine' ? 'selected' : '' }}>Chine</option>
                                    <option value="Suisse" {{ old('pays_origine', $produit->pays_origine) == 'Suisse' ? 'selected' : '' }}>Suisse</option>
                                    <option value="États-Unis" {{ old('pays_origine', $produit->pays_origine) == 'États-Unis' ? 'selected' : '' }}>États-Unis</option>
                                    <option value="Royaume-Uni" {{ old('pays_origine', $produit->pays_origine) == 'Royaume-Uni' ? 'selected' : '' }}>Royaume-Uni</option>
                                </select>
                                @error('pays_origine')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-user-tie"></i>
                                    Titulaire AMM
                                </label>
                                <input type="text" 
                                       name="titulaire_amm" 
                                       class="form-control @error('titulaire_amm') is-invalid @enderror"
                                       value="{{ old('titulaire_amm', $produit->titulaire_amm) }}"
                                       required>
                                @error('titulaire_amm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group span-2">
                                <label class="form-label required">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Pays du Titulaire AMM
                                </label>
                                <input type="text" 
                                       name="pays_titulaire_amm" 
                                       class="form-control @error('pays_titulaire_amm') is-invalid @enderror"
                                       value="{{ old('pays_titulaire_amm', $produit->pays_titulaire_amm) }}"
                                       required>
                                @error('pays_titulaire_amm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations AMM -->
                <div class="card form-card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="card-title">Autorisation de Mise sur le Marché (AMM)</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label required">
                                    <i class="fas fa-hashtag"></i>
                                    Numéro d'Enregistrement
                                </label>
                                <input type="number" 
                                       name="num_enregistrement" 
                                       class="form-control @error('num_enregistrement') is-invalid @enderror"
                                       value="{{ old('num_enregistrement', $produit->num_enregistrement) }}"
                                       required>
                                @error('num_enregistrement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text">Numéro unique d'identification</small>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-calendar"></i>
                                    Date d'AMM
                                </label>
                                <input type="date" 
                                       name="date_amm" 
                                       class="form-control @error('date_amm') is-invalid @enderror"
                                       value="{{ old('date_amm', $produit->date_amm ? \Carbon\Carbon::parse($produit->date_amm)->format('Y-m-d') : '') }}">
                                @error('date_amm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group span-2">
                                <label class="form-label">
                                    <i class="fas fa-check-circle"></i>
                                    Statut AMM
                                </label>
                                <select name="statut_amm" 
                                        class="form-control @error('statut_amm') is-invalid @enderror">
                                    <option value="">Sélectionner...</option>
                                    <option value="Validé" {{ old('statut_amm', $produit->statut_amm) == 'Validé' ? 'selected' : '' }}>Validé</option>
                                    <option value="En cours" {{ old('statut_amm', $produit->statut_amm) == 'En cours' ? 'selected' : '' }}>En cours d'examen</option>
                                    <option value="Suspendu" {{ old('statut_amm', $produit->statut_amm) == 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                                    <option value="Retiré" {{ old('statut_amm', $produit->statut_amm) == 'Retiré' ? 'selected' : '' }}>Retiré</option>
                                </select>
                                @error('statut_amm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Historique -->
                <div class="card form-card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h3 class="card-title">Informations Système</h3>
                    </div>
                    <div class="card-body">
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-calendar-plus"></i>
                                <div>
                                    <div class="info-label">Créé le</div>
                                    <div class="info-value">{{ $produit->created_at->format('d/m/Y à H:i') }}</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-calendar-check"></i>
                                <div>
                                    <div class="info-label">Modifié le</div>
                                    <div class="info-value">{{ $produit->updated_at->format('d/m/Y à H:i') }}</div>
                                </div>
                            </div>
                            @if($produit->user_id)
                            <div class="info-item">
                                <i class="fas fa-user"></i>
                                <div>
                                    <div class="info-label">Créé par</div>
                                    <div class="info-value">{{ $produit->user->name ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="form-sidebar">
                <!-- Actions -->
                <div class="card sticky-card">
                    <div class="card-header">
                        <h3 class="card-title">Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="action-buttons-vertical">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-save"></i>
                                Enregistrer les Modifications
                            </button>
                            <a href="{{ route('admin.produits.show', $produit->id) }}" class="btn btn-info btn-block">
                                <i class="fas fa-eye"></i>
                                Voir le Produit
                            </a>
                            <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary btn-block">
                                <i class="fas fa-arrow-left"></i>
                                Retour à la Liste
                            </a>
                            <button type="button" onclick="confirmDelete()" class="btn btn-danger btn-block">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Statut -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-info-circle"></i>
                            Statut Actuel
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="status-display">
                            @php
                                $statut = $produit->statut_amm ?? 'Non défini';
                                $badgeClass = match($statut) {
                                    'Validé' => 'badge-success',
                                    'En cours' => 'badge-warning',
                                    'Suspendu' => 'badge-danger',
                                    'Retiré' => 'badge-secondary',
                                    default => 'badge-secondary'
                                };
                            @endphp
                            <div class="status-badge-large {{ $badgeClass }}">
                                {{ $statut }}
                            </div>
                            @if($produit->date_amm)
                            <div class="status-info">
                                <i class="fas fa-calendar"></i>
                                AMM depuis le {{ \Carbon\Carbon::parse($produit->date_amm)->format('d/m/Y') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Aide -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-question-circle"></i>
                            Aide
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="help-content">
                            <div class="help-item">
                                <i class="fas fa-info-circle"></i>
                                <p>Vérifiez toutes les modifications avant d'enregistrer.</p>
                            </div>
                            <div class="help-item">
                                <i class="fas fa-exclamation-triangle"></i>
                                <p>La suppression est irréversible.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete Form (hidden) -->
    <form id="deleteForm" action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>

<style>
.badge-info {
    background: #D1ECF1;
    color: #0C5460;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 15px;
}

.info-item {
    display: flex;
    gap: 12px;
    padding: 15px;
    background: var(--light-bg);
    border-radius: 8px;
    align-items: center;
}

.info-item i {
    font-size: 20px;
    color: var(--primary-color);
}

.info-label {
    font-size: 12px;
    color: var(--text-light);
    margin-bottom: 4px;
}

.info-value {
    font-size: 14px;
    font-weight: 600;
    color: var(--text-dark);
}

.status-display {
    text-align: center;
}

.status-badge-large {
    display: inline-block;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
}

.status-info {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 13px;
    color: var(--text-light);
}

.btn-info {
    background: var(--info-color);
    color: white;
}

.btn-info:hover {
    background: #2980B9;
}
</style>

@push('scripts')
<script>
function confirmDelete() {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.')) {
        document.getElementById('deleteForm').submit();
    }
}

// Form validation
document.querySelector('.product-form')?.addEventListener('submit', function(e) {
    const requiredFields = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Veuillez remplir tous les champs obligatoires');
    }
});
</script>
@endpush
@endsection