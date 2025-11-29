@extends('layouts.base')
@section('title', 'ABREMA - Organigramme')
@css('css/pages.css')

@section('content')
    <div class="page-wrapper">
        <h1 class="page-title" style="text-align: center;">Organigramme de l'ABREMA</h1>
        <div class='mb-6'>
            <img src="{{ asset('assets/images/organigramme.png') }}" alt="ABREMA Organigramme" style="max-width:100%; height:auto;">
        </div>
    </div>
@endsection