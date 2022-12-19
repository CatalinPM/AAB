<form method="post" action="{{ route('login') }}">

  @csrf

  <div class="mb-3">
    <label for="InputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="InputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>

<hr />

@if($errors->any())
    @foreach ( $errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
@endif

