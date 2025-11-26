@extends('layouts.admin')

@section('title', 'Détails du produit')
@section('page-title', 'Détails du Produit')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a> /
    <a href="{{ route('admin.produits.index') }}">Produits</a> /
    <span>Détails</span>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $produit->nom }}</h3>
        <a href="{{ route('admin.produits.edit', $produit->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Modifier
        </a>
    </div>

    <div class="card-body">
        <div style="display: flex; gap: 30px;">
            @if($produit->image)
                <img src="{{ asset('storage/'.$produit->image) }}" width="200" style="border-radius: 8px;">
            @else
                <div style="width:200px;height:200px;background:#EEE;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-image" style="font-size:40px;color:#AAA;"></i>
                </div>
            @endif

            <div style="flex:1;">
                <p><strong>Nom :</strong> {{ $produit->nom }}</p>
                <p><strong>Description :</strong> {{ $produit->description }}</p>
                <p><strong>Prix :</strong> {{ number_format($produit->prix, 2, ',', ' ') }} FBU</p>
                <p><strong>Créé le :</strong> {{ $produit->created_at->format('d/m/Y H:i') }}</p>

                <a href="{{ route('admin.produits.index') }}" class="btn btn-secondary" style="margin-top:20px;">
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
