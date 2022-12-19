<div>
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($revisorRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.makeUserRevisor', $user) }}" class="btn btn-primary">Rendi revisore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


