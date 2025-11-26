@extends('layouts.base')
@section('title', 'Text reglementaire sur la vigilance et Publicité')
@section('content')

    <div class="page-wrapper">

    <div class="page-section">
        <h2 class="page-section-title">
            Text réglementaire sur la vigilance et Publicité
        </h2>

          <div class="pdf-container" style="width: 100%; height: 800px; margin-top: 20px;">
    <embed src="{{ asset('files/texte_vigilance_publicite.pdf') }}" 
           type="application/pdf" 
           width="100%" 
           height="100%">
</div>
    </div>

</div>

@endsection
