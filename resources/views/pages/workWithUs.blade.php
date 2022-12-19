<div class="container my-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Lavora con noi</h3>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Lavora come scrittore</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

            <h3>Lavora come revisore</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

            <h3>Lavora come amministratore</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

        </div>
        <div class="col-12 col-md-6">
            <form action="{{ rout('user.role.request') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label h3">Per quale posizione vuoi candidarti?</label>
                    <select class="form-control" name="role" id="">
                        <option value="admin">Amministratore</option>
                        <option value="revisor">Revisore</option>
                        <option value="writer">Scrittore</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label h5">Inviaci la tua email</label>
                    <input type="email" class="form-control" name="email" @auth value="{{ Auth::user()->email }}" @endauth>
                </div>
                <div class="mb-3">
                    <label class="form-label h5">Perche dovremmo assumerti?</label>
                    <textarea name="presentation" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Invia candidatura</button>
            </form>
        </div>
    </div>
</div>
