@extends('layouts.home')

@section('content')

{{-- @dd($adminRequests, $revisorRequests, $revisorRequests) --}}
<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h6>Richieste di amministratore</h6>
            <x-admin-request-table :adminRequests="$adminRequests"/>
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h6>Richieste di revisore</h6>
            <x-revisor-request-table :revisorRequests="$revisorRequests"/>
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-12">
            <h6>Richieste di Articolista</h6>
            <x-writer-request-table :writerRequests="$writerRequests"/>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-12 my-2">
            <h5>Crea tag</h5>
            <x-tags-form/>
        </div>
        <div class="col-12">
            <h5>Gestisci i tag</h5>
            <x-tags-table :tags="$tags"/>
        </div>
    </div>
</div>

@endsection
