@extends('layouts.home')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Crea articolo</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-form :tags="$tags" :categories="$categories"/>
            </div>
        </div>
    </div>

@endsection
