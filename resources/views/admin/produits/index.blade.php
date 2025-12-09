@extends('layouts.admin')

@section('title', 'Produits')
@section('page-title', 'Gestion des Produits')

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

    .search-box {
        display: flex;
        gap: 10px;
        flex: 1;
        max-width: 400px;
    }

    .search-box input {
        flex: 1;
        padding: 10px 15px;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-size: 14px;
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

    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-success { background: #d4edda; color: #155724; }
    .badge-warning { background: #fff3cd; color: #856404; }
    .badge-danger { background: #f8d7da; color: #721c24; }
    .badge-info { background: #d1ecf1; color: #0c5460; }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .pagination {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination-info {
        color: #666;
        font-size: 14px;
    }

    .pagination-links {
        display: flex;
        gap: 5px;
    }

    .pagination-links a,
    .pagination-links span {
        padding: 8px 12px;
        border: 1px solid var(--border);
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        font-size: 14px;
    }

    .pagination-links a:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .pagination-links .active {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Produits pharmaceutiques</h2>
        <p style="color: #666; margin-top: 5px;">Gérer les médicaments enregistrés</p>
    </div>
    <a href="{{ route('admin.produits.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouveau produit
    </a>
</div>

<div class="table-container">
    <div class="table-header">
        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Rechercher un produit..." onkeyup="searchTable()">
            <button class="btn btn-secondary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div>
            <a href="{{ route('admin.produits.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Exporter
            </a>
        </div>
    </div>

    <table class="data-table" id="productsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Désignation commerciale</th>
                <th>DCI</th>
                <th>Forme</th>
                <th>Laboratoire</th>
                <th>Statut AMM</th>
                <th>Date AMM</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produits as $produit)
            <tr>
                <td><strong>#{{ $produit->id }}</strong></td>
                <td>{{ $produit->designation_commerciale }}</td>
                <td>{{ $produit->dci }}</td>
                <td>{{ $produit->forme }}</td>
                <td>{{ $produit->nom_laboratoire }}</td>
                <td>
                    <span class="badge badge-{{ $produit->statut_amm == 'Valide' ? 'success' : ($produit->statut_amm == 'En attente' ? 'warning' : 'danger') }}">
                        {{ $produit->statut_amm ?? 'N/A' }}
                    </span>
                </td>
                {{-- <td>{{ $produit->date_amm ? $produit->date_amm->format('d/m/Y') : 'N/A' }}</td> --}}
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.produits.edit', $produit) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.produits.destroy', $produit) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
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
                <td colspan="8" style="text-align: center; padding: 40px; color: #999;">
                    <i class="fas fa-pills" style="font-size: 48px; margin-bottom: 15px; opacity: 0.3;"></i>
                    <p>Aucun produit enregistré</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($produits->hasPages())
    <div class="pagination">
        <div class="pagination-info">
            Affichage de {{ $produits->firstItem() }} à {{ $produits->lastItem() }} sur {{ $produits->total() }} produits
        </div>
        <div class="pagination-links">
            {{ $produits->links() }}
        </div>
    </div>
    @endif
</div>

<script>
function searchTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toUpperCase();
    const table = document.getElementById('productsTable');
    const tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        let found = false;
        const td = tr[i].getElementsByTagName('td');
        
        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                const txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }
        
        tr[i].style.display = found ? '' : 'none';
    }
}
</script>
@endsection