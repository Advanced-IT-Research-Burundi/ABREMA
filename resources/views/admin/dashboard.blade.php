@extends('layouts.admin')

@section('title', 'Tableau de bord')
@section('page-title', 'Tableau de bord')

@section('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: transform 0.2s, box-shadow 0.2s;
        border-left: 4px solid;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        opacity: 0.1;
        transform: translate(30%, -30%);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .stat-card.primary { border-left-color: var(--primary); }
    .stat-card.success { border-left-color: var(--success); }
    .stat-card.info { border-left-color: var(--info); }
    .stat-card.warning { border-left-color: var(--warning); }
    .stat-card.danger { border-left-color: var(--danger); }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }

    .stat-card.primary .stat-icon { background: var(--primary); }
    .stat-card.success .stat-icon { background: var(--success); }
    .stat-card.info .stat-icon { background: var(--info); }
    .stat-card.warning .stat-icon { background: var(--warning); }
    .stat-card.danger .stat-icon { background: var(--danger); }

    .stat-value {
        font-size: 32px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 5px;
    }

    .stat-label {
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }

    .stat-change {
        font-size: 12px;
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .stat-change.positive {
        color: var(--success);
    }

    .stat-change.negative {
        color: var(--danger);
    }

    .chart-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .recent-table {
        width: 100%;
        border-collapse: collapse;
    }

    .recent-table th {
        background: var(--light);
        padding: 12px;
        text-align: left;
        font-weight: 600;
        font-size: 13px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .recent-table td {
        padding: 15px 12px;
        border-bottom: 1px solid var(--border);
    }

    .recent-table tr:hover {
        background: #f8f9fa;
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-success { background: #d4edda; color: #155724; }
    .badge-warning { background: #fff3cd; color: #856404; }
    .badge-danger { background: #f8d7da; color: #721c24; }
    .badge-info { background: #d1ecf1; color: #0c5460; }

    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .quick-action-btn {
        padding: 20px;
        border-radius: 10px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.2s;
        background: white;
        border: 2px solid var(--border);
    }

    .quick-action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-color: var(--primary);
    }

    .quick-action-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }

    .quick-action-text h4 {
        font-size: 16px;
        margin-bottom: 5px;
        color: var(--dark);
    }

    .quick-action-text p {
        font-size: 12px;
        color: #666;
        margin: 0;
    }

    .welcome-banner {
        background: linear-gradient(135deg, var(--primary) 0%, #1e5738 100%);
        color: white;
        padding: 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .welcome-text h2 {
        font-size: 28px;
        margin-bottom: 8px;
    }

    .welcome-text p {
        opacity: 0.9;
        font-size: 16px;
    }

    .welcome-icon {
        font-size: 80px;
        opacity: 0.2;
    }
</style>
@endsection

@section('content')
<!-- Statistics Cards -->
<div class="stats-grid">
    <div class="stat-card primary">
        <div class="stat-header">
            <div>
                <div class="stat-value">{{ $stats['produits'] ?? 0 }}</div>
                <div class="stat-label">Produits enregistrés</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+12% ce mois</span>
                </div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-pills"></i>
            </div>
        </div>
    </div>

    <div class="stat-card success">
        <div class="stat-header">
            <div>
                <div class="stat-value">{{ $stats['actualites'] ?? 0 }}</div>
                <div class="stat-label">Actualités publiées</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+8% ce mois</span>
                </div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
    </div>

    <div class="stat-card info">
        <div class="stat-header">
            <div>
                <div class="stat-value">{{ $stats['partenaires'] ?? 0 }}</div>
                <div class="stat-label">Partenaires actifs</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>+3 nouveaux</span>
                </div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-handshake"></i>
            </div>
        </div>
    </div>

    <div class="stat-card warning">
        <div class="stat-header">
            <div>
                <div class="stat-value">{{ $stats['colis'] ?? 0 }}</div>
                <div class="stat-label">Colis en attente</div>
                <div class="stat-change">
                    <i class="fas fa-clock"></i>
                    <span>À traiter</span>
                </div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>

    <div class="stat-card danger">
        <div class="stat-header">
            <div>
                <div class="stat-value">{{ $stats['publications'] ?? 0 }}</div>
                <div class="stat-label">Publications</div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-book"></i>
            </div>
        </div>
    </div>

    <div class="stat-card info">
        <div class="stat-header">
            <div>
                <div class="stat-value">{{ $stats['clients'] ?? 0 }}</div>
                <div class="stat-label">Clients</div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="chart-grid">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-newspaper"></i> Dernières actualités
            <a href="{{ route('admin.actualites.index') }}" class="btn btn-sm btn-secondary">
                Voir tout
            </a>
        </div>
        <div class="card-body">
            <table class="recent-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentActualites ?? [] as $actualite)
                    <tr>
                        <td>{{ Str::limit($actualite->title, 40) }}</td>
                        <td>{{ $actualite->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.actualites.edit', $actualite) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: #999; padding: 30px;">
                            Aucune actualité récente
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-pills"></i> Produits récents
            <a href="{{ route('admin.produits.index') }}" class="btn btn-sm btn-secondary">
                Voir tout
            </a>
        </div>
        <div class="card-body">
            <table class="recent-table">
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentProduits ?? [] as $produit)
                    <tr>
                        <td>{{ Str::limit($produit->designation_commerciale, 30) }}</td>
                        <td>
                            <span class="badge badge-{{ $produit->statut_amm == 'Valide' ? 'success' : 'warning' }}">
                                {{ $produit->statut_amm ?? 'N/A' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.produits.edit', $produit) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: #999; padding: 30px;">
                            Aucun produit récent
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card">
    <div class="card-header">
        <i class="fas fa-bolt"></i> Actions rapides
    </div>
    <div class="card-body">
        <div class="quick-actions">
            <a href="{{ route('admin.produits.create') }}" class="quick-action-btn">
                <div class="quick-action-icon" style="background: var(--primary);">
                    <i class="fas fa-pills"></i>
                </div>
                <div class="quick-action-text">
                    <h4>Nouveau produit</h4>
                    <p>Ajouter un médicament</p>
                </div>
            </a>

            <a href="{{ route('admin.actualites.create') }}" class="quick-action-btn">
                <div class="quick-action-icon" style="background: var(--success);">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="quick-action-text">
                    <h4>Nouvelle actualité</h4>
                    <p>Publier une news</p>
                </div>
            </a>

            <a href="{{ route('admin.partenaires.create') }}" class="quick-action-btn">
                <div class="quick-action-icon" style="background: var(--info);">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="quick-action-text">
                    <h4>Nouveau partenaire</h4>
                    <p>Ajouter un partenaire</p>
                </div>
            </a>

            <a href="{{ route('admin.publications.create') }}" class="quick-action-btn">
                <div class="quick-action-icon" style="background: var(--warning);">
                    <i class="fas fa-book"></i>
                </div>
                <div class="quick-action-text">
                    <h4>Publication</h4>
                    <p>Nouvelle publication</p>
                </div>
            </a>

            <a href="{{ route('admin.colis.index') }}" class="quick-action-btn">
                <div class="quick-action-icon" style="background: var(--danger);">
                    <i class="fas fa-box"></i>
                </div>
                <div class="quick-action-text">
                    <h4>Colis en attente</h4>
                    <p>Gérer les demandes</p>
                </div>
            </a>

            <a href="{{ route('admin.equipe-directions.create') }}" class="quick-action-btn">
                <div class="quick-action-icon" style="background: #6c757d;">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="quick-action-text">
                    <h4>Membre équipe</h4>
                    <p>Ajouter un membre</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection