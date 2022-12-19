<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1>Articoli per : {{$key}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-12">
                <div class="card" style="width: 18ren;">
                    <img src="{{ Storage::url($article->img) }}" alt="{{ $article->title }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <a href="{{ route('artiicle.show', $article) }}" class="btn btn-primary">Leggi</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
