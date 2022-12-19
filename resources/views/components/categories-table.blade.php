<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Categoria</th>
                <th scope="col">Articoli</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $acetory)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ count($category->articles) }}</td>
                <td>
                    <form action="{{ route('category.edit', $category) }}" method="POST" class="w-">
                        @csrf
                        <input type="text" placeholder="nuovo nome" name="name" class="form-control">
                        <button class="btn btn-info" type="submit">Salva</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('category.delete', $category) }}" method="POST" class="w-50">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Elimina</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
