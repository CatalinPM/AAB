@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col my-3">
            <h5 class="my-4">Tutti i articoli della categoria {{ $category->name }}:</h5>
            <x-show_articles :articles="$articles"/>
        </div>
    </div>
</div>

@endsection
