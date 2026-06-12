<!DOCTYPE html>

<html>
<head>
    <title>User Management</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
```

</head>
<body>

<div class="container mt-4">

```
<div class="mb-3 d-flex gap-2">

    <a href="{{ route('dashboard') }}"
       class="btn btn-dark">
        🏠 Dashboard
    </a>

    <a href="{{ route('persons.index') }}"
       class="btn btn-primary">
        👥 People Management
    </a>

</div>

<h2 class="mb-4">User Management</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Change Role</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

    @foreach($users as $user)

        <tr>

            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>

            <td>

                <form action="{{ route('users.role', $user->id) }}"
                      method="POST">

                    @csrf

                    <select name="role"
                            class="form-select">

                        <option value="user"
                            {{ $user->role == 'user' ? 'selected' : '' }}>
                            User
                        </option>

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                    </select>

                    <button class="btn btn-primary btn-sm mt-2">
                        Update
                    </button>

                </form>

            </td>

            <td>

                <form action="{{ route('users.destroy', $user->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this user?')">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

{{ $users->links() }}
```

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
