@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <span>Dashboard</span>
@endsection

@section('content')
<div class="dashboard">
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-icon">
                <i class="fas fa-pills"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ $stats['produits'] ?? 0 }}</div>
                <div class="stat-label">Produits Enregistrés</div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>+12% ce mois</span>
                </div>
            </div>
        </div>

        <div class="stat-card stat-success">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ $stats['amm_valides'] ?? 0 }}</div>
                <div class="stat-label">AMM Validées</div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>+8% ce mois</span>
                </div>
            </div>
        </div>

        <div class="stat-card stat-warning">
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ $stats['colis_pending'] ?? 0 }}</div>
                <div class="stat-label">Colis en Attente</div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-down"></i>
                    <span>-5% ce mois</span>
                </div>
            </div>
        </div>

        <div class="stat-card stat-info">
            <div class="stat-icon">
                <i class="fas fa-handshake"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ $stats['partenaires'] ?? 0 }}</div>
                <div class="stat-label">Partenaires Actifs</div>
                <div class="stat-trend">
                    <i class="fas fa-arrow-up"></i>
                    <span>+3 nouveaux</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="charts-row">
        <div class="chart-card">
            <div class="card-header">
                <h3 class="card-title">Enregistrements AMM par Mois</h3>
                <select class="select-sm">
                    <option>2024</option>
                    <option>2023</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="ammChart" height="80"></canvas>
            </div>
        </div>

        <div class="chart-card">
            <div class="card-header">
                <h3 class="card-title">Catégories de Produits</h3>
            </div>
            <div class="card-body">
                <canvas id="categoryChart" height="80"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="activity-row">
        <div class="card activity-card">
            <div class="card-header">
                <h3 class="card-title">Activités Récentes</h3>
                <a href="#" class="btn btn-sm btn-secondary">Voir tout</a>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon activity-icon-success">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nouveau produit ajouté</div>
                            <div class="activity-description">Paracétamol 500mg a été enregistré</div>
                            <div class="activity-time">Il y a 2 heures</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon activity-icon-info">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Publication modifiée</div>
                            <div class="activity-description">Article "Nouvelles réglementations" mis à jour</div>
                            <div class="activity-time">Il y a 4 heures</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon activity-icon-warning">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nouveau colis reçu</div>
                            <div class="activity-description">Demande de contrôle #C-2024-045</div>
                            <div class="activity-time">Il y a 6 heures</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon activity-icon-primary">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nouveau partenaire</div>
                            <div class="activity-description">Laboratoire PharmaBurundi ajouté</div>
                            <div class="activity-time">Hier</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon activity-icon-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">AMM expirée</div>
                            <div class="activity-description">3 autorisations nécessitent un renouvellement</div>
                            <div class="activity-time">Il y a 2 jours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="quick-actions-card">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actions Rapides</h3>
                </div>
                <div class="card-body">
                    <div class="quick-actions">
                        <a href="{{ route('admin.produits.create') }}" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: #3498DB;">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Nouveau Produit</div>
                                <div class="quick-action-desc">Enregistrer un médicament</div>
                            </div>
                        </a>

                        <a href="{{ route('admin.publications.create') }}" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: #2ECC71;">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Nouvelle Publication</div>
                                <div class="quick-action-desc">Créer un article</div>
                            </div>
                        </a>

                        <a href="{{ route('admin.notifications.create') }}" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: #F39C12;">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Notification</div>
                                <div class="quick-action-desc">Publier une alerte</div>
                            </div>
                        </a>

                        {{-- <a href="{{ route('admin.colis.index') }}" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: #E74C3C;">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Gérer Colis</div>
                                <div class="quick-action-desc">{{ $stats['colis_pending'] ?? 0 }} en attente</div>
                            </div>
                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                    <h3 class="card-title">Statistiques du Jour</h3>
                </div>
                <div class="card-body">
                    <div class="daily-stats">
                        <div class="daily-stat-item">
                            <i class="fas fa-eye"></i>
                            <div>
                                <div class="daily-stat-value">1,234</div>
                                <div class="daily-stat-label">Visiteurs</div>
                            </div>
                        </div>
                        <div class="daily-stat-item">
                            <i class="fas fa-download"></i>
                            <div>
                                <div class="daily-stat-value">89</div>
                                <div class="daily-stat-label">Téléchargements</div>
                            </div>
                        </div>
                        <div class="daily-stat-item">
                            <i class="fas fa-search"></i>
                            <div>
                                <div class="daily-stat-value">156</div>
                                <div class="daily-stat-label">Recherches</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products Table -->
</div>

<style>
.dashboard {
    max-width: 1600px;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    border-radius: 12px;
    padding: 25px;
    display: flex;
    gap: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
}

.stat-primary .stat-icon {
    background: linear-gradient(135deg, #667EEA 0%, #764BA2 100%);
}

.stat-success .stat-icon {
    background: linear-gradient(135deg, #2ECC71 0%, #27AE60 100%);
}

.stat-warning .stat-icon {
    background: linear-gradient(135deg, #F39C12 0%, #E67E22 100%);
}

.stat-info .stat-icon {
    background: linear-gradient(135deg, #3498DB 0%, #2980B9 100%);
}

.stat-content {
    flex: 1;
}

.stat-value {
    font-size: 32px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 5px;
}

.stat-label {
    font-size: 14px;
    color: var(--text-light);
    margin-bottom: 8px;
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    color: var(--success-color);
}

.stat-trend i {
    font-size: 10px;
}

/* Charts Row */
.charts-row {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    margin-bottom: 30px;
}

.chart-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.select-sm {
    padding: 6px 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    font-size: 13px;
}

/* Activity Row */
.activity-row {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
}

.activity-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.activity-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.activity-item {
    display: flex;
    gap: 15px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
}

.activity-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.activity-icon-success {
    background: var(--success-color);
}

.activity-icon-info {
    background: var(--info-color);
}

.activity-icon-warning {
    background: var(--warning-color);
}

.activity-icon-primary {
    background: var(--primary-color);
}

.activity-icon-danger {
    background: var(--danger-color);
}

.activity-content {
    flex: 1;
}

.activity-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 4px;
}

.activity-description {
    font-size: 13px;
    color: var(--text-light);
    margin-bottom: 4px;
}

.activity-time {
    font-size: 12px;
    color: var(--text-light);
}

/* Quick Actions */
.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.quick-action-btn {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border-radius: 10px;
    background: var(--light-bg);
    text-decoration: none;
    transition: all 0.3s ease;
}

.quick-action-btn:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.quick-action-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}

.quick-action-text {
    flex: 1;
}

.quick-action-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 2px;
}

.quick-action-desc {
    font-size: 12px;
    color: var(--text-light);
}

/* Daily Stats */
.daily-stats {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.daily-stat-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: var(--light-bg);
    border-radius: 10px;
}

.daily-stat-item i {
    font-size: 24px;
    color: var(--primary-color);
}

.daily-stat-value {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-dark);
}

.daily-stat-label {
    font-size: 13px;
    color: var(--text-light);
}

/* Table */
.table-responsive {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table th {
    text-align: left;
    padding: 12px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-light);
    border-bottom: 2px solid var(--border-color);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.data-table td {
    padding: 15px 12px;
    border-bottom: 1px solid var(--border-color);
}

.data-table tbody tr {
    transition: all 0.3s ease;
}

.data-table tbody tr:hover {
    background: var(--light-bg);
}

.product-cell {
    display: flex;
    flex-direction: column;
}

.product-name {
    font-weight: 600;
    color: var(--text-dark);
}

.product-dosage {
    font-size: 12px;
    color: var(--text-light);
}

.badge {
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
}

.badge-success {
    background: #D4EDDA;
    color: #155724;
}

.badge-secondary {
    background: #E9ECEF;
    color: #495057;
}

.action-buttons {
    display: flex;
    gap: 8px;
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

.btn-action-primary {
    background: #EBF5FF;
    color: #3498DB;
}

.btn-action-primary:hover {
    background: #3498DB;
    color: white;
}

.btn-action-info {
    background: #E8F5E9;
    color: #2ECC71;
}

.btn-action-info:hover {
    background: #2ECC71;
    color: white;
}

@media (max-width: 1200px) {
    .charts-row,
    .activity-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
// AMM Chart
const ammCtx = document.getElementById('ammChart');
if (ammCtx) {
    new Chart(ammCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
            datasets: [{
                label: 'Enregistrements',
                data: [12, 19, 15, 25, 22, 30, 28, 35, 32, 40, 38, 45],
                borderColor: '#2ECC71',
                backgroundColor: 'rgba(46, 204, 113, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Category Chart
const categoryCtx = document.getElementById('categoryChart');
if (categoryCtx) {
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Génériques', 'Princeps', 'OTC', 'Phytothérapie'],
            datasets: [{
                data: [45, 30, 15, 10],
                backgroundColor: ['#2ECC71', '#3498DB', '#F39C12', '#E74C3C']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}
</script>
@endpush
@endsection