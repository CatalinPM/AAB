@extends('layouts.home')

@section('content')

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richieste di amministratore</h2>
            <x-admin-request-table :adminRequests="adminRequests" />
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richieste di revisore</h2>
            <x-revisor-request-table :revisorRequests="revisorRequests" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2>Richieste di Articolista</h2>
            <x-writer-request-table :writerRequests="writerRequests" />
        </div>
    </div>
</div>

@stop
