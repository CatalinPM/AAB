@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h5>Bentornato, {{ Auth::user()->name }}</h5>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="">
            @if(count(Auth::user()->articles) > 0)
            <div class="cal-12">
                <h6>Tutti i tuoi articoli</h6>
                <a href="{{ route('articles.create') }}" class="btn btn-info">Nuovo articolo</a>
            </div>
            <div class="col-12 my-3">
                <x-articles-table :articles="Auth::user()->articles"/>
            </div>
            @else
            <div class="col-12 my-3">
                <h6>Non hai scritto alcun articolo</h6>
                <a href="{{ route('articles.create') }}" class="btn btn-info">Crea il tuo primo articolo</a>
            </div>
            @endif
        </div>
    </div>
@endsection
