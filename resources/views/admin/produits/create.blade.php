@extends('layouts.admin')

@section('title', 'Nouveau Produit')
@section('page-title', 'Nouveau Produit Pharmaceutique')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('admin.produits.index') }}">Produits</a>
    <span>/</span>
    <span>Nouveau</span>
@endsection

@section('content')
<div class="form-page">
    <form action="{{ route('admin.produits.store') }}" method="POST" class="product-form">
        @csrf
        
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
                                       value="{{ old('designation_commerciale') }}"
                                       placeholder="Ex: PARACETAMOL MYLAN"
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
                                       value="{{ old('dci') }}"
                                       placeholder="Ex: Paracétamol"
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
                                       value="{{ old('dosage') }}"
                                       placeholder="Ex: 500 mg"
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
                                    <option value="Comprimé" {{ old('forme') == 'Comprimé' ? 'selected' : '' }}>Comprimé</option>
                                    <option value="Gélule" {{ old('forme') == 'Gélule' ? 'selected' : '' }}>Gélule</option>
                                    <option value="Sirop" {{ old('forme') == 'Sirop' ? 'selected' : '' }}>Sirop</option>
                                    <option value="Suspension" {{ old('forme') == 'Suspension' ? 'selected' : '' }}>Suspension</option>
                                    <option value="Solution injectable" {{ old('forme') == 'Solution injectable' ? 'selected' : '' }}>Solution injectable</option>
                                    <option value="Crème" {{ old('forme') == 'Crème' ? 'selected' : '' }}>Crème</option>
                                    <option value="Pommade" {{ old('forme') == 'Pommade' ? 'selected' : '' }}>Pommade</option>
                                    <option value="Suppositoire" {{ old('forme') == 'Suppositoire' ? 'selected' : '' }}>Suppositoire</option>
                                    <option value="Poudre" {{ old('forme') == 'Poudre' ? 'selected' : '' }}>Poudre</option>
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
                                       value="{{ old('conditionnement') }}"
                                       placeholder="Ex: Boîte de 30 comprimés"
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
                                    <option value="Générique" {{ old('category') == 'Générique' ? 'selected' : '' }}>Générique</option>
                                    <option value="Princeps" {{ old('category') == 'Princeps' ? 'selected' : '' }}>Princeps</option>
                                    <option value="OTC" {{ old('category') == 'OTC' ? 'selected' : '' }}>OTC (Vente Libre)</option>
                                    <option value="Phytothérapie" {{ old('category') == 'Phytothérapie' ? 'selected' : '' }}>Phytothérapie</option>
                                    <option value="Homéopathie" {{ old('category') == 'Homéopathie' ? 'selected' : '' }}>Homéopathie</option>
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
                                       value="{{ old('nom_laboratoire') }}"
                                       placeholder="Ex: Laboratoire MYLAN"
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
                                    <option value="France" {{ old('pays_origine') == 'France' ? 'selected' : '' }}>France</option>
                                    <option value="Belgique" {{ old('pays_origine') == 'Belgique' ? 'selected' : '' }}>Belgique</option>
                                    <option value="Allemagne" {{ old('pays_origine') == 'Allemagne' ? 'selected' : '' }}>Allemagne</option>
                                    <option value="Inde" {{ old('pays_origine') == 'Inde' ? 'selected' : '' }}>Inde</option>
                                    <option value="Chine" {{ old('pays_origine') == 'Chine' ? 'selected' : '' }}>Chine</option>
                                    <option value="Suisse" {{ old('pays_origine') == 'Suisse' ? 'selected' : '' }}>Suisse</option>
                                    <option value="États-Unis" {{ old('pays_origine') == 'États-Unis' ? 'selected' : '' }}>États-Unis</option>
                                    <option value="Royaume-Uni" {{ old('pays_origine') == 'Royaume-Uni' ? 'selected' : '' }}>Royaume-Uni</option>
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
                                       value="{{ old('titulaire_amm') }}"
                                       placeholder="Nom du titulaire"
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
                                       value="{{ old('pays_titulaire_amm') }}"
                                       placeholder="Pays du titulaire"
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
                                       value="{{ old('num_enregistrement') }}"
                                       placeholder="Ex: 2024001234"
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
                                       value="{{ old('date_amm') }}">
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
                                    <option value="Validé" {{ old('statut_amm') == 'Validé' ? 'selected' : '' }}>Validé</option>
                                    <option value="En cours" {{ old('statut_amm') == 'En cours' ? 'selected' : '' }}>En cours d'examen</option>
                                    <option value="Suspendu" {{ old('statut_amm') == 'Suspendu' ? 'selected' : '' }}>Suspendu</option>
                                    <option value="Retiré" {{ old('statut_amm') == 'Retiré' ? 'selected' : '' }}>Retiré</option>
                                </select>
                                @error('statut_amm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                                Enregistrer le Produit
                            </button>
                            <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary btn-block">
                                <i class="fas fa-times"></i>
                                Annuler
                            </a>
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
                                <p>Tous les champs marqués d'un <span class="text-danger">*</span> sont obligatoires.</p>
                            </div>
                            <div class="help-item">
                                <i class="fas fa-lightbulb"></i>
                                <p>Assurez-vous que le numéro d'enregistrement est unique.</p>
                            </div>
                            <div class="help-item">
                                <i class="fas fa-shield-alt"></i>
                                <p>Les informations seront vérifiées avant publication.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-bar"></i>
                            Statistiques
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="stats-list">
                            <div class="stat-item">
                                <span class="stat-label">Total produits</span>
                                <span class="stat-value">{{ \App\Models\Produit::count() }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">AMM validées</span>
                                <span class="stat-value text-success">{{ \App\Models\Produit::where('statut_amm', 'Validé')->count() }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">En attente</span>
                                <span class="stat-value text-warning">{{ \App\Models\Produit::where('statut_amm', 'En cours')->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
.form-page {
    max-width: 1600px;
}

.form-layout {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 25px;
}

.form-main {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.form-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    overflow: hidden;
}

.card-header {
    padding: 20px 25px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, #F8F9FA 0%, #FFFFFF 100%);
}

.card-header-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    font-size: 18px;
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-dark);
    flex: 1;
}

.card-body {
    padding: 25px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.span-2 {
    grid-column: span 2;
}

.form-label {
    font-size: 14px;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-label.required::after {
    content: '*';
    color: var(--danger-color);
    margin-left: 4px;
}

.form-label i {
    color: var(--primary-color);
    font-size: 14px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    background: white;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(46,204,113,0.1);
}

.form-control.is-invalid {
    border-color: var(--danger-color);
}

.form-control.is-invalid:focus {
    box-shadow: 0 0 0 3px rgba(231,76,60,0.1);
}

.invalid-feedback {
    display: block;
    color: var(--danger-color);
    font-size: 13px;
    margin-top: 6px;
}

.form-text {
    display: block;
    font-size: 12px;
    color: var(--text-light);
    margin-top: 6px;
}

select.form-control {
    cursor: pointer;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 35px;
    appearance: none;
}

/* Sidebar */
.form-sidebar {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.sticky-card {
    position: sticky;
    top: 90px;
}

.action-buttons-vertical {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.btn-block {
    width: 100%;
    justify-content: center;
}

.help-content {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.help-item {
    display: flex;
    gap: 12px;
    padding: 12px;
    background: var(--light-bg);
    border-radius: 8px;
    align-items: start;
}

.help-item i {
    color: var(--primary-color);
    margin-top: 2px;
    flex-shrink: 0;
}

.help-item p {
    font-size: 13px;
    color: var(--text-dark);
    line-height: 1.5;
    margin: 0;
}

.stats-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.stat-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px;
    background: var(--light-bg);
    border-radius: 8px;
}

.stat-label {
    font-size: 13px;
    color: var(--text-dark);
}

.stat-value {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary-color);
}

.text-success {
    color: var(--success-color) !important;
}

.text-warning {
    color: var(--warning-color) !important;
}

.text-danger {
    color: var(--danger-color) !important;
}

@media (max-width: 1200px) {
    .form-layout {
        grid-template-columns: 1fr;
    }
    
    .form-sidebar {
        order: -1;
    }
    
    .sticky-card {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-group.span-2 {
        grid-column: span 1;
    }
}
</style>

@push('scripts')
<script>
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

// Auto-format number
document.querySelector('[name="num_enregistrement"]')?.addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
</script>
@endpush
@endsection