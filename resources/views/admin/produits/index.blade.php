@extends('layouts.admin')

@section('title', 'Gestion des Produits')
@section('page-title', 'Produits Pharmaceutiques')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <span>Produits</span>
@endsection

@section('content')
<div class="products-page">
    <!-- Filter Section -->
    <div class="card filter-card">
        <div class="card-body">
            <form action="{{ route('admin.produits.index') }}" method="GET" class="filter-form">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label>Recherche</label>
                        <input type="text" name="search" class="form-control" placeholder="Nom, DCI, laboratoire..." value="{{ request('search') }}">
                    </div>
                    <div class="filter-group">
                        <label>Catégorie</label>
                        <select name="category" class="form-control">
                            <option value="">Toutes</option>
                            <option value="generique" {{ request('category') == 'generique' ? 'selected' : '' }}>Générique</option>
                            <option value="princeps" {{ request('category') == 'princeps' ? 'selected' : '' }}>Princeps</option>
                            <option value="otc" {{ request('category') == 'otc' ? 'selected' : '' }}>OTC</option>
                            <option value="phytotherapie" {{ request('category') == 'phytotherapie' ? 'selected' : '' }}>Phytothérapie</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Forme</label>
                        <select name="forme" class="form-control">
                            <option value="">Toutes</option>
                            <option value="comprime" {{ request('forme') == 'comprime' ? 'selected' : '' }}>Comprimé</option>
                            <option value="gelule" {{ request('forme') == 'gelule' ? 'selected' : '' }}>Gélule</option>
                            <option value="sirop" {{ request('forme') == 'sirop' ? 'selected' : '' }}>Sirop</option>
                            <option value="injection" {{ request('forme') == 'injection' ? 'selected' : '' }}>Injectable</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Statut AMM</label>
                        <select name="statut" class="form-control">
                            <option value="">Tous</option>
                            <option value="valide" {{ request('statut') == 'valide' ? 'selected' : '' }}>Validé</option>
                            <option value="en_cours" {{ request('statut') == 'en_cours' ? 'selected' : '' }}>En cours</option>
                            <option value="expire" {{ request('statut') == 'expire' ? 'selected' : '' }}>Expiré</option>
                        </select>
                    </div>
                </div>
                <div class="filter-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Filtrer
                    </button>
                    <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Réinitialiser
                    </a>
                    <a href="{{ route('admin.produits.create') }}" class="btn btn-success" style="margin-left: auto;">
                        <i class="fas fa-plus"></i> Nouveau Produit
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Stats Summary -->
    <div class="summary-cards">
        <div class="summary-card">
            <div class="summary-icon" style="background: #3498DB;">
                <i class="fas fa-pills"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $produits->total() }}</div>
                <div class="summary-label">Total Produits</div>
            </div>
        </div>
        <div class="summary-card">
            <div class="summary-icon" style="background: #2ECC71;">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $stats['valides'] ?? 0 }}</div>
                <div class="summary-label">AMM Validées</div>
            </div>
        </div>
        <div class="summary-card">
            <div class="summary-icon" style="background: #F39C12;">
                <i class="fas fa-clock"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $stats['en_cours'] ?? 0 }}</div>
                <div class="summary-label">En Cours</div>
            </div>
        </div>
        <div class="summary-card">
            <div class="summary-icon" style="background: #E74C3C;">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $stats['expires'] ?? 0 }}</div>
                <div class="summary-label">Expirés</div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des Produits ({{ $produits->total() }})</h3>
            <div class="card-actions">
                <button class="btn btn-sm btn-secondary" onclick="exportData()">
                    <i class="fas fa-download"></i> Exporter
                </button>
                <button class="btn btn-sm btn-secondary" onclick="printTable()">
                    <i class="fas fa-print"></i> Imprimer
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="data-table" id="productsTable">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll">
                            </th>
                            <th>N° Enreg.</th>
                            <th>Désignation Commerciale</th>
                            <th>DCI</th>
                            <th>Forme / Dosage</th>
                            <th>Laboratoire</th>
                            <th>Pays Origine</th>
                            <th>Date AMM</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produits as $produit)
                        <tr>
                            <td>
                                <input type="checkbox" class="select-item" value="{{ $produit->id }}">
                            </td>
                            <td>
                                <span class="product-number">{{ $produit->num_enregistrement }}</span>
                            </td>
                            <td>
                                <div class="product-info">
                                    <div class="product-name">{{ $produit->designation_commerciale }}</div>
                                    <div class="product-meta">
                                        <span class="badge badge-category">{{ $produit->category }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>{{ $produit->dci }}</strong>
                            </td>
                            <td>
                                <div class="product-form">
                                    <div>{{ $produit->forme }}</div>
                                    <small class="text-muted">{{ $produit->dosage }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="lab-info">
                                    <div>{{ $produit->nom_laboratoire }}</div>
                                    <small class="text-muted">{{ $produit->titulaire_amm }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="country-badge">
                                    {{ $produit->pays_origine }}
                                </span>
                            </td>
                            <td>
                                @if($produit->date_amm)
                                    <div class="date-cell">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($produit->date_amm)->format('d/m/Y') }}
                                    </div>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statut = $produit->statut_amm ?? 'valide';
                                    $badgeClass = match($statut) {
                                        'valide' => 'badge-success',
                                        'en_cours' => 'badge-warning',
                                        'expire' => 'badge-danger',
                                        default => 'badge-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">
                                    {{ ucfirst($statut) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.produits.show', $produit->id) }}" 
                                       class="btn-action btn-action-info" 
                                       title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.produits.edit', $produit->id) }}" 
                                       class="btn-action btn-action-primary" 
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="confirmDelete({{ $produit->id }})" 
                                            class="btn-action btn-action-danger" 
                                            title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                <div class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <p>Aucun produit trouvé</p>
                                    <a href="{{ route('admin.produits.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Ajouter un produit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($produits->hasPages())
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    Affichage {{ $produits->firstItem() }} à {{ $produits->lastItem() }} sur {{ $produits->total() }} résultats
                </div>
                <div class="pagination">
                    {{ $produits->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Bulk Actions (when items selected) -->
    <div class="bulk-actions" id="bulkActions" style="display: none;">
        <div class="bulk-actions-content">
            <span class="bulk-count"><span id="selectedCount">0</span> élément(s) sélectionné(s)</span>
            <div class="bulk-buttons">
                <button class="btn btn-sm btn-secondary" onclick="bulkExport()">
                    <i class="fas fa-download"></i> Exporter
                </button>
                <button class="btn btn-sm btn-danger" onclick="bulkDelete()">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Confirmer la suppression</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <p>Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal()">Annuler</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>

<style>
.products-page {
    max-width: 1800px;
}

/* Filter Card */
.filter-card {
    margin-bottom: 25px;
}

.filter-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.filter-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(46,204,113,0.1);
}

.filter-actions {
    display: flex;
    gap: 10px;
    padding-top: 10px;
    border-top: 1px solid var(--border-color);
}

/* Summary Cards */
.summary-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
    margin-bottom: 25px;
}

.summary-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    display: flex;
    gap: 15px;
    align-items: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.summary-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 22px;
}

.summary-value {
    font-size: 26px;
    font-weight: 700;
    color: var(--text-dark);
}

.summary-label {
    font-size: 13px;
    color: var(--text-light);
}

/* Card Actions */
.card-actions {
    display: flex;
    gap: 10px;
}

/* Table Styles */
.data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.data-table th {
    text-align: left;
    padding: 12px;
    font-size: 12px;
    font-weight: 600;
    color: var(--text-light);
    border-bottom: 2px solid var(--border-color);
    text-transform: uppercase;
    background: #F8F9FA;
}

.data-table td {
    padding: 15px 12px;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
}

.data-table tbody tr {
    transition: all 0.2s ease;
}

.data-table tbody tr:hover {
    background: #F8F9FA;
}

.product-number {
    font-weight: 600;
    color: var(--primary-color);
    font-family: 'Courier New', monospace;
}

.product-info {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.product-name {
    font-weight: 600;
    color: var(--text-dark);
}

.product-meta {
    display: flex;
    gap: 6px;
}

.badge-category {
    font-size: 11px;
    padding: 2px 8px;
}

.product-form {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.lab-info {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.country-badge {
    display: inline-block;
    padding: 4px 10px;
    background: #E9ECEF;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
}

.date-cell {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
}

.date-cell i {
    color: var(--text-light);
}

.badge {
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    display: inline-block;
}

.badge-success {
    background: #D4EDDA;
    color: #155724;
}

.badge-warning {
    background: #FFF3CD;
    color: #856404;
}

.badge-danger {
    background: #F8D7DA;
    color: #721C24;
}

.badge-secondary {
    background: #E9ECEF;
    color: #495057;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 6px;
}

.btn-action {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
}

.btn-action-info {
    background: #E8F5E9;
    color: #2ECC71;
}

.btn-action-info:hover {
    background: #2ECC71;
    color: white;
}

.btn-action-primary {
    background: #EBF5FF;
    color: #3498DB;
}

.btn-action-primary:hover {
    background: #3498DB;
    color: white;
}

.btn-action-danger {
    background: #FFEBEE;
    color: #E74C3C;
}

.btn-action-danger:hover {
    background: #E74C3C;
    color: white;
}

/* Bulk Actions */
.bulk-actions {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    background: white;
    padding: 15px 25px;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    z-index: 1000;
    animation: slideUp 0.3s ease;
}

@keyframes slideUp {
    from {
        transform: translateX(-50%) translateY(100px);
        opacity: 0;
    }
    to {
        transform: translateX(-50%) translateY(0);
        opacity: 1;
    }
}

.bulk-actions-content {
    display: flex;
    align-items: center;
    gap: 20px;
}

.bulk-count {
    font-weight: 600;
    color: var(--text-dark);
}

.bulk-buttons {
    display: flex;
    gap: 10px;
}

/* Empty State */
.empty-state {
    padding: 60px 20px;
    text-align: center;
}

.empty-state i {
    font-size: 64px;
    color: var(--text-light);
    margin-bottom: 20px;
}

.empty-state p {
    font-size: 16px;
    color: var(--text-light);
    margin-bottom: 20px;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
    margin-top: 20px;
}

.pagination-info {
    font-size: 14px;
    color: var(--text-light);
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 10000;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: white;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    animation: modalSlide 0.3s ease;
}

@keyframes modalSlide {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    padding: 20px 25px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    font-size: 18px;
    font-weight: 600;
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: var(--text-light);
}

.modal-body {
    padding: 25px;
}

.modal-footer {
    padding: 20px 25px;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

@media (max-width: 768px) {
    .filter-grid {
        grid-template-columns: 1fr;
    }
    
    .summary-cards {
        grid-template-columns: 1fr;
    }
    
    .filter-actions {
        flex-direction: column;
    }
    
    .filter-actions .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

@push('scripts')
<script>
// Select All
document.getElementById('selectAll')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.select-item');
    checkboxes.forEach(cb => cb.checked = this.checked);
    updateBulkActions();
});

// Update bulk actions visibility
document.querySelectorAll('.select-item').forEach(cb => {
    cb.addEventListener('change', updateBulkActions);
});

function updateBulkActions() {
    const selected = document.querySelectorAll('.select-item:checked');
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    
    if (selected.length > 0) {
        bulkActions.style.display = 'block';
        selectedCount.textContent = selected.length;
    } else {
        bulkActions.style.display = 'none';
    }
}

// Delete confirmation
function confirmDelete(id) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    form.action = `/admin/produits/${id}`;
    modal.classList.add('active');
}

function closeModal() {
    document.getElementById('deleteModal').classList.remove('active');
}

// Export function
function exportData() {
    alert('Fonction d\'export en cours de développement');
}

// Print function
function printTable() {
    window.print();
}

// Bulk operations
function bulkExport() {
    const selected = Array.from(document.querySelectorAll('.select-item:checked'))
        .map(cb => cb.value);
    console.log('Export items:', selected);
    alert('Export de ' + selected.length + ' produits');
}

function bulkDelete() {
    if (confirm('Êtes-vous sûr de vouloir supprimer les éléments sélectionnés ?')) {
        const selected = Array.from(document.querySelectorAll('.select-item:checked'))
            .map(cb => cb.value);
        console.log('Delete items:', selected);
        alert('Suppression de ' + selected.length + ' produits');
    }
}
</script>
@endpush
@endsection