@extends('admin.layouts.app')

@section('title', 'Détails du Colis')
@section('page-title', 'Détails du Colis #' . $colis->id)

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.colis.index') }}">Colis</a>
    <i class="fas fa-chevron-right"></i>
    <span>Colis #{{ $colis->id }}</span>
@endsection

@push('styles')
<style>
    .detail-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .status-header {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .status-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .status-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .status-icon.pending {
        background: rgba(243,156,18,0.1);
        color: var(--warning-color);
    }

    .status-icon.processed {
        background: rgba(46,204,113,0.1);
        color: var(--success-color);
    }

    .status-content h2 {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-badge.pending {
        background: rgba(243,156,18,0.1);
        color: var(--warning-color);
        border: 1px solid var(--warning-color);
    }

    .status-badge.processed {
        background: rgba(46,204,113,0.1);
        color: var(--success-color);
        border: 1px solid var(--success-color);
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }

    .info-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .info-section-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
    }

    .info-section-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: rgba(46,204,113,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 18px;
    }

    .info-section-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .info-row {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 15px;
    }

    .info-row:last-child {
        margin-bottom: 0;
    }

    .info-icon {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        background: var(--light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        flex-shrink: 0;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 12px;
        color: var(--text-light);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .info-value {
        font-size: 15px;
        color: var(--text-dark);
        font-weight: 500;
        word-break: break-word;
    }

    .info-value a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .info-value a:hover {
        text-decoration: underline;
    }

    .message-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .message-content {
        background: var(--light-bg);
        border-left: 4px solid var(--primary-color);
        padding: 20px;
        border-radius: 8px;
        line-height: 1.8;
        color: var(--text-dark);
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .file-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .file-preview {
        background: linear-gradient(135deg, rgba(46,204,113,0.05) 0%, rgba(39,174,96,0.05) 100%);
        border: 2px dashed rgba(46,204,113,0.3);
        border-radius: 12px;
        padding: 40px;
        text-align: center;
    }

    .file-icon-large {
        width: 80px;
        height: 80px;
        background: var(--primary-color);
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 40px;
        margin-bottom: 20px;
    }

    .file-name {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .file-meta {
        font-size: 13px;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    .file-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .timeline-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .timeline {
        position: relative;
        padding-left: 35px;
        margin-top: 20px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 12px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(180deg, var(--primary-color) 0%, rgba(46,204,113,0.2) 100%);
        border-radius: 3px;
    }

    .timeline-item {
        position: relative;
        padding-bottom: 25px;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -28px;
        top: 8px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: white;
        border: 3px solid var(--primary-color);
        box-shadow: 0 0 0 4px white, 0 0 0 6px rgba(46,204,113,0.2);
        z-index: 1;
    }

    .timeline-date {
        font-size: 12px;
        color: var(--text-light);
        font-weight: 600;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .timeline-content {
        background: var(--light-bg);
        padding: 12px 15px;
        border-radius: 8px;
        font-size: 14px;
        color: var(--text-dark);
    }

    .timeline-content strong {
        color: var(--primary-color);
    }

    .action-bar {
        background: white;
        border-radius: 12px;
        padding: 20px 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .no-data {
        text-align: center;
        padding: 30px;
        color: var(--text-light);
        font-style: italic;
    }

    @media print {
        .action-bar,
        .header,
        .sidebar {
            display: none !important;
        }

        .detail-container {
            max-width: 100%;
        }
    }
</style>
@endpush

@section('content')
    <div class="page-wrapper">

    <h1 class="page-title">Service en ligne de colis</h1>

    <div class="page-section">
        <h3 class="page-section-title"><strong>Avant de compléter le formulaire de demande d'inspection des colis en ligne, veuillez :</strong></h3>
        <ol class="page-list">
            <li>Télécharger le formulaire ci-joint;</li>
            <li>Le remplir et le signer;</li>
            <li>Puis le téléverser sur notre plateforme.</li>
        </ol>
    </div>

    <div class="page-section page-form">
       <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <label for="name">Nom et Prénom</label>
            <input class="form-control" type="text" id="name" name="name" required>

            <label for="phone">Téléphone</label>
            <input class="form-control" type="text" id="phone" name="phone" required>

            <label for="email">E-mail</label>
            <input class="form-control" type="email" id="email" name="email" required>

            <label for="file">Téléverser le formulaire signé (PDF)</label>
            <input class="form-control" type="file" id="file" name="file" accept=".pdf" required>

            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4"></textarea>

            <button type="submit">Soumettre la demande</button>
       </form>
    </div>

</div>

@endsection