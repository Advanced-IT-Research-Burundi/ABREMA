@extends('layouts.base')
@section('title', 'ABREMA - Organigramme')
@css('css/pages.css')

@section('content')
    <div class="container">
        <h1>Organigramme de l'ABREMA</h1>
        <div class='mb-6'>
            <img src="{{ asset('images/abrema_organigramme.jpg') }}" alt="ABREMA Organigramme" style="max-width:100%; height:auto;">
        </div>
    </div>
@endsection