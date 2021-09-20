<table class="table table-striped table-bordered w-100 dataTable" id="dataTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr data-id="{{$user['id']}}">
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['username']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['created_at']}}</td>
                <td>{{$user['updated_at']}}</td>
                <td>
                    <p class="text-center">
                        -<a href="/admin/users/{{$user['id']}}/edit">Edit</a>
                        - - -
                        <a class="text text-danger" href="#" title="click to delete" onclick="destroy({{$user['id']}})">Delete</a>-
                    </p>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
