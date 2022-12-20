@extends('layouts.home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            {{-- @dd($article) --}}
            @foreach($articles as $article)
            <h1>{{ $article->title }}</h1>
            <h3>{{$article->description}}</h3>
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
    @endforeach
    <div class="d-flex">
        <p class="h5">Tag: </p>

        @foreach ($articles_tags as $tag)
            @foreach($tag->tags as $item)
                {{-- @dd($item->name) --}}
                <span>#{{ $item->name }}</span>
            @endforeach
        @endforeach
    </div>

</div>
@endsection
