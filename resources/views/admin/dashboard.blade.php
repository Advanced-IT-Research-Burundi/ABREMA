@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Tableau de Bord')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <span>Dashboard</span>
@endsection

@push('styles')
<style>
    .dashboard {
        max-width: 100%;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: var(--radius-md);
        padding: 40px;
        margin-bottom: 30px;
        color: var(--white);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(248, 183, 57, 0.2) 0%, transparent 70%);
    }

    .welcome-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 30px;
    }

    .welcome-text h1 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .welcome-text p {
        font-size: 16px;
        opacity: 0.95;
        margin-bottom: 20px;
    }

    .welcome-meta {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .meta-item i {
        width: 36px;
        height: 36px;
        background: rgba(255,255,255,0.2);
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .welcome-actions {
        display: flex;
        gap: 12px;
    }

    .btn-welcome {
        padding: 12px 24px;
        border-radius: var(--radius-sm);
        font-weight: 600;
        font-size: 14px;
        border: none;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-welcome-primary {
        background: var(--secondary);
        color: var(--dark);
    }

    .btn-welcome-primary:hover {
        background: var(--secondary-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(248, 183, 57, 0.3);
    }

    .btn-welcome-outline {
        background: transparent;
        color: var(--white);
        border: 2px solid rgba(255,255,255,0.3);
    }

    .btn-welcome-outline:hover {
        background: rgba(255,255,255,0.1);
        border-color: rgba(255,255,255,0.5);
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--white);
        border-radius: var(--radius-md);
        padding: 28px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border);
        transition: var(--transition);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        transition: var(--transition);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .stat-card.stat-primary::before { background: var(--primary); }
    .stat-card.stat-success::before { background: var(--success); }
    .stat-card.stat-warning::before { background: var(--warning); }
    .stat-card.stat-info::before { background: var(--info); }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--white);
        box-shadow: var(--shadow-sm);
    }

    .stat-primary .stat-icon { background: linear-gradient(135deg, var(--primary), var(--primary-light)); }
    .stat-success .stat-icon { background: linear-gradient(135deg, var(--success), #27AE60); }
    .stat-warning .stat-icon { background: linear-gradient(135deg, var(--warning), #E67E22); }
    .stat-info .stat-icon { background: linear-gradient(135deg, var(--info), #2980B9); }

    .stat-value {
        font-size: 36px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 14px;
        color: var(--gray-600);
        font-weight: 500;
    }

    .stat-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 16px;
        border-top: 1px solid var(--border);
        margin-top: 16px;
    }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
    }

    .stat-trend.up { color: var(--success); }
    .stat-trend.down { color: var(--danger); }

    .stat-link {
        font-size: 13px;
        color: var(--primary);
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: var(--transition);
    }

    .stat-link:hover {
        gap: 8px;
        color: var(--primary-dark);
    }

    /* Charts Row */
    .charts-row {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 30px;
    }

    .chart-container {
        position: relative;
        height: 300px;
    }

    /* Activity Row */
    .activity-row {
        display: grid;
        grid-template-columns: 1.8fr 1.2fr;
        gap: 24px;
        margin-bottom: 30px;
    }

    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .activity-item {
        display: flex;
        gap: 16px;
        padding: 18px;
        background: var(--gray-100);
        border-radius: var(--radius-md);
        transition: var(--transition);
        border: 1px solid transparent;
    }

    .activity-item:hover {
        background: var(--white);
        border-color: var(--border);
        transform: translateX(4px);
        box-shadow: var(--shadow-sm);
    }

    .activity-icon {
        width: 44px;
        height: 44px;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        flex-shrink: 0;
        box-shadow: var(--shadow-sm);
    }

    .activity-icon-success { background: linear-gradient(135deg, var(--success), #27AE60); }
    .activity-icon-info { background: linear-gradient(135deg, var(--info), #2980B9); }
    .activity-icon-warning { background: linear-gradient(135deg, var(--warning), #E67E22); }
    .activity-icon-primary { background: linear-gradient(135deg, var(--primary), var(--primary-light)); }
    .activity-icon-danger { background: linear-gradient(135deg, var(--danger), #C0392B); }

    .activity-content {
        flex: 1;
        min-width: 0;
    }

    .activity-title {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 4px;
        font-size: 14px;
    }

    .activity-description {
        font-size: 13px;
        color: var(--gray-600);
        margin-bottom: 6px;
        line-height: 1.4;
    }

    .activity-time {
        font-size: 12px;
        color: var(--gray-500);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* Quick Actions */
    .quick-actions {
        display: grid;
        gap: 12px;
    }

    .quick-action-btn {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 18px;
        border-radius: var(--radius-md);
        background: var(--white);
        text-decoration: none;
        transition: var(--transition);
        border: 2px solid var(--border);
        position: relative;
        overflow: hidden;
    }

    .quick-action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        transition: var(--transition);
        transform: scaleY(0);
    }

    .quick-action-btn:hover::before {
        transform: scaleY(1);
    }

    .quick-action-btn:hover {
        transform: translateX(4px);
        border-color: currentColor;
        box-shadow: var(--shadow-md);
    }

    .quick-action-btn:nth-child(1)::before { background: var(--primary); }
    .quick-action-btn:nth-child(2)::before { background: var(--success); }
    .quick-action-btn:nth-child(3)::before { background: var(--warning); }
    .quick-action-btn:nth-child(4)::before { background: var(--danger); }

    .quick-action-icon {
        width: 52px;
        height: 52px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 22px;
        flex-shrink: 0;
        box-shadow: var(--shadow-sm);
    }

    .quick-action-text {
        flex: 1;
    }

    .quick-action-title {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 4px;
        font-size: 15px;
    }

    .quick-action-desc {
        font-size: 13px;
        color: var(--gray-600);
    }

    /* Recent Table */
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        text-align: left;
        padding: 12px;
        font-size: 13px;
        font-weight: 600;
        color: var(--gray-600);
        border-bottom: 2px solid var(--border);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .data-table td {
        padding: 15px 12px;
        border-bottom: 1px solid var(--border);
    }

    .data-table tbody tr {
        transition: var(--transition);
    }

    .data-table tbody tr:hover {
        background: var(--gray-100);
    }

    .product-cell {
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-weight: 600;
        color: var(--dark);
    }

    .product-dosage {
        font-size: 12px;
        color: var(--gray-600);
    }

    .badge {
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }

    .badge-success {
        background: #D4EDDA;
        color: #155724;
    }

    .badge-warning {
        background: #FFF3CD;
        color: #856404;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        border: none;
    }

    .btn-action-primary {
        background: #EBF5FF;
        color: var(--primary);
    }

    .btn-action-primary:hover {
        background: var(--primary);
        color: var(--white);
    }

    /* Responsive */
    @media (max-width: 1400px) {
        .charts-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 1200px) {
        .activity-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .welcome-content {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .welcome-actions {
            width: 100%;
            flex-direction: column;
        }
        
        .btn-welcome {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard">
    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div class="welcome-content">
            <div class="welcome-text">
                <h1>👋 Bonjour, {{ auth()->user()->name ?? 'Administrateur' }} !</h1>
                <p>Bienvenue sur votre tableau de bord ABREMA. Voici un aperçu de vos activités.</p>
                <div class="welcome-meta">
                    <div class="meta-item">
                        <i class="fas fa-calendar-day"></i>
                        <span>{{ \Carbon\Carbon::now()->isoFormat('dddd D MMMM YYYY') }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ \Carbon\Carbon::now()->format('H:i') }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Bujumbura, Burundi</span>
                    </div>
                </div>
            </div>
            <div class="welcome-actions">
                <a href="{{ route('admin.produits.create') }}" class="btn-welcome btn-welcome-primary">
                    <i class="fas fa-plus"></i>
                    Nouveau Produit
                </a>
                <a href="{{ route('home') }}" target="_blank" class="btn-welcome btn-welcome-outline">
                    <i class="fas fa-globe"></i>
                    Voir le Site
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-primary">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-pills"></i>
                </div>
            </div>
            <div class="stat-value">{{ \App\Models\Produit::count() }}</div>
            <div class="stat-label">Produits Enregistrés</div>
            <div class="stat-footer">
                <div class="stat-trend up">
                    <i class="fas fa-arrow-up"></i>
                    <span>+12% ce mois</span>
                </div>
                <a href="{{ route('admin.produits.index') }}" class="stat-link">
                    Voir tout <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card stat-success">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="stat-value">{{ \App\Models\Produit::where('statut_amm', 'Validé')->count() }}</div>
            <div class="stat-label">AMM Validées</div>
            <div class="stat-footer">
                <div class="stat-trend up">
                    <i class="fas fa-arrow-up"></i>
                    <span>+8% ce mois</span>
                </div>
                <a href="#" class="stat-link">
                    Détails <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card stat-warning">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-box-open"></i>
                </div>
            </div>
            <div class="stat-value">{{ \App\Models\Colis::count() }}</div>
            <div class="stat-label">Demandes de Contrôle</div>
            <div class="stat-footer">
                <div class="stat-trend down">
                    <i class="fas fa-arrow-down"></i>
                    <span>-5% cette semaine</span>
                </div>
                <a href="{{ route('admin.colis.index') }}" class="stat-link">
                    Gérer <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card stat-info">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="fas fa-handshake"></i>
                </div>
            </div>
            <div class="stat-value">{{ \App\Models\Partenaire::count() }}</div>
            <div class="stat-label">Partenaires Actifs</div>
            <div class="stat-footer">
                <div class="stat-trend up">
                    <i class="fas fa-arrow-up"></i>
                    <span>+3 nouveaux</span>
                </div>
                <a href="{{ route('admin.partenaires.index') }}" class="stat-link">
                    Voir tout <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-row">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line"></i>
                    Enregistrements par Mois
                </h3>
                <select class="btn btn-sm btn-secondary">
                    <option>2024</option>
                    <option>2023</option>
                </select>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie"></i>
                    Catégories
                </h3>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity & Quick Actions -->
    <div class="activity-row">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-history"></i>
                    Activités Récentes
                </h3>
                <a href="#" class="stat-link">Voir tout <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon activity-icon-success">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nouveau produit ajouté</div>
                            <div class="activity-description">Paracétamol 500mg enregistré avec succès</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i>
                                Il y a 2 heures
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon activity-icon-info">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Publication modifiée</div>
                            <div class="activity-description">Article "Nouvelles réglementations" mis à jour</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i>
                                Il y a 4 heures
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon activity-icon-warning">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nouveau colis reçu</div>
                            <div class="activity-description">Demande de contrôle qualité</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i>
                                Il y a 6 heures
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon activity-icon-primary">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Nouveau partenaire</div>
                            <div class="activity-description">Laboratoire PharmaBurundi ajouté</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i>
                                Hier
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Actions Rapides
                    </h3>
                </div>
                <div class="card-body">
                    <div class="quick-actions">
                        <a href="{{ route('admin.produits.create') }}" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: linear-gradient(135deg, var(--primary), var(--primary-light));">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Nouveau Produit</div>
                                <div class="quick-action-desc">Enregistrer un médicament</div>
                            </div>
                        </a>

                        <a href="{{ route('admin.publications.create') }}" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: linear-gradient(135deg, var(--success), #27AE60);">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Publication</div>
                                <div class="quick-action-desc">Créer un article</div>
                            </div>
                        </a>

                        <a href="{{ route('admin.notifications.create') }}" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: linear-gradient(135deg, var(--warning), #E67E22);">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Notification</div>
                                <div class="quick-action-desc">Publier une alerte</div>
                            </div>
                        </a>

                        <a href="#" class="quick-action-btn">
                            <div class="quick-action-icon" style="background: linear-gradient(135deg, var(--danger), #C0392B);">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="quick-action-text">
                                <div class="quick-action-title">Rapport</div>
                                <div class="quick-action-desc">Générer un rapport</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-pills"></i>
                Produits Récents
            </h3>
            <a href="{{ route('admin.produits.index') }}" class="btn btn-sm btn-primary">
                Voir tout
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>DCI</th>
                            <th>Laboratoire</th>
                            <th>Catégorie</th>
                            <th>Statut AMM</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Produit::latest()->take(5)->get() as $produit)
                        <tr>
                            <td>
                                <div class="product-cell">
                                    <div class="product-name">{{ $produit->designation_commerciale }}</div>
                                    <div class="product-dosage">{{ $produit->dosage }} - {{ $produit->forme }}</div>
                                </div>
                            </td>
                            <td>{{ $produit->dci }}</td>
                            <td>{{ $produit->nom_laboratoire }}</td>
                            <td>{{ $produit->category }}</td>
                            <td>
                                <span class="badge {{ $produit->statut_amm == 'Validé' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $produit->statut_amm ?? 'En cours' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.produits.edit', $produit) }}" class="btn-action btn-action-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: var(--gray-500);">
                                <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 10px; display: block;"></i>
                                Aucun produit enregistré
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
Chart.defaults.font.family = "'Inter', sans-serif";
Chart.defaults.color = '#6C757D';

// Monthly Chart
const monthlyCtx = document.getElementById('monthlyChart');
if (monthlyCtx) {
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
            datasets: [{
                label: 'Enregistrements',
                data: [45, 52, 48, 65, 59, 72, 68, 78, 85, 92, 88, 95],
                borderColor: '#2C5AA0',
                backgroundColor: 'rgba(44, 90, 160, 0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 3,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointBackgroundColor: '#2C5AA0',
                pointBorderColor: '#fff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(44, 62, 80, 0.95)',
                    padding: 12,
                    borderRadius: 8,
                    titleFont: {
                        size: 13,
                        weight: '600'
                    },
                    bodyFont: {
                        size: 13
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#E0E6ED',
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        padding: 10
                    }
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
                backgroundColor: [
                    '#2C5AA0',
                    '#2ECC71',
                    '#F39C12',
                    '#E74C3C'
                ],
                borderWidth: 3,
                borderColor: '#fff',
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        boxHeight: 12,
                        borderRadius: 6,
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 13,
                            weight: '600'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(44, 62, 80, 0.95)',
                    padding: 12,
                    borderRadius: 8,
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${percentage}%`;
                        }
                    }
                }
            },
            cutout: '65%'
        }
    });
}
</script>
@endpush