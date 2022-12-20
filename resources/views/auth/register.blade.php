<form method="post" action="{{ route('register') }}">

  @csrf

  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="name" class="form-control">
  </div>

  <div class="mb-3">
    <label for="InputEmail" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="InputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword1">
  </div>

  <div class="mb-3">
    <label for="InputPassword2" class="form-label">Password confirmation</label>
    <input type="password" name="password_confirmation" id="InputPassword2" class="form-control">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>

</form>

<hr />

@if($errors->any())
    @foreach ( $errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
@endif
