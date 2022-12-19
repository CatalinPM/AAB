@extends('layouts.home')
@section('content')

@endsection
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <h1>{{ $article->title }}</h1>
            <h3>{{$srticle->description}}</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-md-6">
            <p>{{ $article->body }}</p>
            <a href="{{ route('articles.category', $article->category) }}" class="card-text">
                {{ $article->category->name }}
            </a>
            <p>Pubblicato da: {{ $article->user->name }}</p>
            <p>Pubblicato il: {{ $article->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <div class="d-flex">
        <p class="h5">Tag: </p>
        @foreach ($article->tags as $tag)
        <span>#{{ $tag->name }}</span>
        @endforeach
    </div>

</div>
@endsection
