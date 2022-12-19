<div>
    <form action="{{ route('category.store') }}" method="POST" class="w-50">
        @csrf
        <label>Inserisci una nuova categoria </label>
        <div class="d-flex d-inline">
            <input type="text" class="form-control w-50" placeholder="nome categoria" name="name">
            <button class="btn btn-info mx-2" type="submit">Salva</button>
        </div>
    </form>
</div>
