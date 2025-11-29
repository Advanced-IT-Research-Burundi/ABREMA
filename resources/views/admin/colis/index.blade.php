@extends('layouts.admin')

@section('title', 'Gestion des Colis')
@section('page-title', 'Gestion des Colis')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fas fa-chevron-right"></i>
    <span>Colis</span>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des Colis</h3>
        <a href="{{ route('admin.colis.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Nouveau Colis
        </a>
    </div>
    <div class="card-body">
        @if($colis->count() > 0)
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: var(--light-bg); border-bottom: 2px solid var(--border-color);">
                        <th style="padding: 15px; text-align: left; font-weight: 600; color: var(--text-dark);">#</th>
                        <th style="padding: 15px; text-align: left; font-weight: 600; color: var(--text-dark);">Nom & Prénom</th>
                        <th style="padding: 15px; text-align: left; font-weight: 600; color: var(--text-dark);">Téléphone</th>
                        <th style="padding: 15px; text-align: left; font-weight: 600; color: var(--text-dark);">Email</th>
                        <th style="padding: 15px; text-align: left; font-weight: 600; color: var(--text-dark);">Statut</th>
                        <th style="padding: 15px; text-align: left; font-weight: 600; color: var(--text-dark);">Date</th>
                        <th style="padding: 15px; text-align: center; font-weight: 600; color: var(--text-dark);">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colis as $item)
                    <tr style="border-bottom: 1px solid var(--border-color); transition: background 0.3s ease;" 
                        onmouseover="this.style.background='var(--light-bg)'" 
                        onmouseout="this.style.background='white'">
                        <td style="padding: 15px; color: var(--text-dark);">{{ $item->id }}</td>
                        <td style="padding: 15px;">
                            <div style="font-weight: 600; color: var(--text-dark);">{{ $item->nom_prenom }}</div>
                        </td>
                        <td style="padding: 15px; color: var(--text-dark);">
                            <i class="fas fa-phone" style="color: var(--primary-color); margin-right: 5px;"></i>
                            {{ $item->phone }}
                        </td>
                        <td style="padding: 15px; color: var(--text-dark);">
                            <i class="fas fa-envelope" style="color: var(--primary-color); margin-right: 5px;"></i>
                            {{ $item->email }}
                        </td>
                        <td style="padding: 15px;">
                            @if($item->user_id)
                                <span style="background: var(--success-color); color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                    <i class="fas fa-check"></i> Traité
                                </span>
                            @else
                                <span style="background: var(--warning-color); color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                    <i class="fas fa-clock"></i> En attente
                                </span>
                            @endif
                        </td>
                        <td style="padding: 15px; color: var(--text-light); font-size: 13px;">
                            {{ $item->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td style="padding: 15px;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <a href="{{ route('admin.colis.show', $item->id) }}" 
                                   class="btn btn-sm" 
                                   style="background: var(--info-color); color: white;"
                                   title="Voir les détails">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.colis.edit', $item->id) }}" 
                                   class="btn btn-sm" 
                                   style="background: var(--warning-color); color: white;"
                                   title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.colis.destroy', $item->id) }}" 
                                      method="POST" 
                                      style="display: inline;"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce colis ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">
            {{ $colis->links() }}
        </div>
        @else
        <div style="text-align: center; padding: 50px 20px;">
            <i class="fas fa-box" style="font-size: 64px; color: var(--border-color); margin-bottom: 20px;"></i>
            <h3 style="color: var(--text-light); margin-bottom: 10px;">Aucun colis trouvé</h3>
            <p style="color: var(--text-light); margin-bottom: 20px;">Commencez par ajouter votre premier colis</p>
            <a href="{{ route('admin.colis.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Ajouter un Colis
            </a>
        </div>
        @endif
    </div>
</div>
@endsection