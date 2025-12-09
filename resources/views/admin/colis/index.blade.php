@extends('layouts.admin')

@section('title', 'Demandes de Colis')
@section('page-title', 'Gestion des Demandes de Colis')

@section('styles')
<style>
    .table-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .table-header {
        padding: 20px;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        background: var(--light);
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 13px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--border);
    }

    .data-table td {
        padding: 15px;
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
    }

    .data-table tbody tr:hover {
        background: #f8f9fa;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .file-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 10px;
        background: #e3f2fd;
        color: #1976d2;
        border-radius: 4px;
        font-size: 12px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .file-badge:hover {
        background: #1976d2;
        color: white;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 2000;
        align-items: center;
        justify-content: center;
    }

    .modal.show {
        display: flex;
    }

    .modal-content {
        background: white;
        border-radius: 10px;
        max-width: 600px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
    }

    .modal-header {
        padding: 20px;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header h3 {
        font-size: 20px;
        font-weight: 600;
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #999;
    }

    .modal-body {
        padding: 20px;
    }

    .detail-row {
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border);
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: #666;
    }

    .detail-value {
        color: #333;
    }

    .pagination {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Demandes de colis</h2>
        <p style="color: #666; margin-top: 5px;">Gérer les demandes de récupération de colis</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <button class="btn btn-success" onclick="window.print()">
            <i class="fas fa-print"></i> Imprimer
        </button>
    </div>
</div>

<div class="table-container">
    <div class="table-header">
        <h3 style="margin: 0; font-size: 18px;">
            <i class="fas fa-box"></i> Liste des demandes ({{ $colis->total() }})
        </h3>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom & Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Fichier</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($colis as $coli)
            <tr>
                <td><strong>#{{ $coli->id }}</strong></td>
                <td>{{ $coli->nom_prenom }}</td>
                <td>{{ $coli->email }}</td>
                <td>{{ $coli->phone ?? 'N/A' }}</td>
                <td>
                    @if($coli->pathfile)
                        <a href="{{ Storage::url($coli->pathfile) }}" class="file-badge" target="_blank">
                            <i class="fas fa-file-pdf"></i>
                            Télécharger
                        </a>
                    @else
                        <span style="color: #999;">Aucun fichier</span>
                    @endif
                </td>
                <td>{{ $coli->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <div class="action-buttons">
                        <button onclick="showDetails({{ $coli->id }})" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </button>
                        <form action="{{ route('admin.colis.destroy', $coli) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                    <i class="fas fa-box" style="font-size: 48px; margin-bottom: 15px; opacity: 0.3;"></i>
                    <p>Aucune demande de colis</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($colis->hasPages())
    <div class="pagination">
        <div class="pagination-info">
            Affichage de {{ $colis->firstItem() }} à {{ $colis->lastItem() }} sur {{ $colis->total() }} demandes
        </div>
        <div class="pagination-links">
            {{ $colis->links() }}
        </div>
    </div>
    @endif
</div>

<!-- Modal pour détails -->
<div class="modal" id="detailsModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-info-circle"></i> Détails de la demande</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Contenu dynamique -->
        </div>
    </div>
</div>

<script>
const colisData = @json($colis->items());

function showDetails(id) {
    const coli = colisData.find(c => c.id === id);
    if (!coli) return;

    const modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
        <div class="detail-row">
            <div class="detail-label">Nom & Prénom:</div>
            <div class="detail-value">${coli.nom_prenom}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Email:</div>
            <div class="detail-value">${coli.email}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Téléphone:</div>
            <div class="detail-value">${coli.phone || 'Non renseigné'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Date de demande:</div>
            <div class="detail-value">${new Date(coli.created_at).toLocaleString('fr-FR')}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Message:</div>
            <div class="detail-value">${coli.message || 'Aucun message'}</div>
        </div>
        ${coli.pathfile ? `
        <div class="detail-row">
            <div class="detail-label">Fichier joint:</div>
            <div class="detail-value">
                <a href="/storage/${coli.pathfile}" class="file-badge" target="_blank">
                    <i class="fas fa-file-pdf"></i>
                    Télécharger le fichier
                </a>
            </div>
        </div>
        ` : ''}
    `;

    document.getElementById('detailsModal').classList.add('show');
}

function closeModal() {
    document.getElementById('detailsModal').classList.remove('show');
}

// Fermer le modal en cliquant à l'extérieur
document.getElementById('detailsModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>
@endsection