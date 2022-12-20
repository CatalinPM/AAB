@extends('layouts.home')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>Bentornato {{ Auth::user()->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{-- @dd($articles) --}}
                <x-revisor-table :articles="$articles" />
            </div>
        </div>
    </div>
@endsection
