<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>Revisione Articolo</h1>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 col-md-6">
                <img src="{{ Storage::url($article->img)}}" alt="{{ $article->title }}" class="img-fluid">
            </div>
            <div class="col-12 col-md-6">
                <h3 class="my-3"> <span class="h5">Titolo :</span>{{ $article->title }}</h3>
                <h3 class="my-3"> <span class="h5">Titolo :</span>{{ $article->description }}</h3>
                <h3 class="my-3"> <span class="h5">Titolo :</span>{{ $article->user->name }}</h3>
                <h3 class="my-3"> <span class="h5">Titolo :</span>{{ $article->category->name }}</h3>
                <h3 class="my-3"> <span class="h5">Titolo :</span>{{ $article->created_at->diffForHumans() }}</h3>
                <div class="d-flex">
                    <a href="{{ route('revisor.accept', $article) }}" class="btn btn-success mx-5">Accetta</a>
                    <a href="{{ route('revisor.reject', $article) }}" class="btn btn-danger mx-5">Rifiuta</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
