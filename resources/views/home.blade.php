<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Users</h2>
            <a class="btn btn-success" href="{{url('/')}}/create">Create New User</a>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="280px">Action</th>
            </tr>
            <!-- This is where you would dynamically generate rows with your data -->
            <!-- Example static data for illustration -->
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="#" method="POST">
                       
                        <a class="btn btn-primary" href="{{ url('/') }}/edit/{{ $user->id }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <a class="btn btn-danger" href="{{ url('/') }}/delete/{{ $user->id }}">Delete</a>

                    </form>
                </td>
            </tr>
            @endforeach
            <!-- Repeat for more rows as necessary -->
        </table>
    </div>
</body>
</html>
