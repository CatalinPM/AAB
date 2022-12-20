<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiloto</th>
                <th scope="col">Create il</th>
                <th scope="col">Status</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at->format("d/m/Y") }}</td>
                <td>
                    {{ $article->is_accepted ? "Pubblicato" : "Non pubblicato" }}
                </td>
                <td>
                    <a href="{{ route('article.edit', $article) }}" class="btn btn-info">Modifica</a>
                </td>
                <td>
                    <form action="{{ route('article.delete', $article) }}" class="w-50" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
