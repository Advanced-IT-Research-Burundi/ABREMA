{{-- CLIENTS INDEX: admin/clients/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Clients')
@section('page-title', 'Gestion des Clients')

@section('styles')
<style>
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .client-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: all 0.3s;
    }

    .client-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.12);
    }

    .client-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 15px;
        object-fit: cover;
        border: 4px solid var(--light);
    }

    .client-name {
        font-size: 18px;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .client-description {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }

    .client-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Clients</h2>
        <p style="color: #666; margin-top: 5px;">Gérer la liste des clients</p>
    </div>
    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouveau client
    </a>
</div>

@if($clients->count() > 0)
<div class="clients-grid">
    @foreach($clients as $client)
    <div class="client-card">
        @if($client->image)
            <img src="{{ Storage::url($client->image) }}" alt="{{ $client->name }}" class="client-image">
        @else
            <div class="client-image" style="background: var(--light); display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-user" style="font-size: 40px; color: #ccc;"></i>
            </div>
        @endif
        <div class="client-name">{{ $client->name }}</div>
        <div class="client-description">{{ $client->description }}</div>
        <div class="client-actions">
            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-info btn-sm">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Supprimer ce client ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="empty-state" style="text-align: center; padding: 60px; background: white; border-radius: 10px;">
    <i class="fas fa-users" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
    <h3>Aucun client</h3>
    <p style="color: #666; margin: 10px 0 20px;">Ajoutez votre premier client</p>
    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Ajouter un client
    </a>
</div>
@endif
@endsection
