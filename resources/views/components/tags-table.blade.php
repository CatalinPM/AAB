<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tag</th>
                <th scope="col">Articoli</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->name }}</td>
                <td>{{ count($tag->articles) }}</td>
                <td>
                    <form action="{{ route('tag.edit', $tag) }}" method="POST" class="w-50">
                        @csrf
                        <input type="text" placeholder="nuovo nome" name="name" class="form-control">
                        <button class="btn btn-info" type="submit">Salva</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('tag.delete', $tag) }}" class="w-50" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
