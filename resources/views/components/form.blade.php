<form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data" >
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" >
    </div>
    <div class="mb-3">
        <label class="form-label">Description</Label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" id="" class="form-control">
        @foreach($categories as $category)
        @endforeach
        <option VaLue=wl Scategory-id wykk scategory-name BiAoption>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="img" class="form-control" >
    </div>
    <div class="mb-3">
        <label class="form-label">Body</Label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<hr />

@if($errors->any())
    @foreach ( $errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
@endif
