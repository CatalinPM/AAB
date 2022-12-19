<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('article.update', compact('article')) }}" class="card p-5 shadow" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione:</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{ $article->description }}">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Categoria:</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $article->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags:</label>
                    <select name="tag[]" class="form-control" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $article->tags->contains($tag) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Copertina:</label>
                    <input type="file" name="img" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Corpo del testo:</label>
                    <textarea name="body" id="body" cols="30" rows="6" class="form-control">{{ $article->body }}</textarea>
                </div>

                <div class="mt-2">
                    <button class="btn bg-main">Pubblica articolo</button>
                </div>
            </form>
        </div>
    </div>
</div>
