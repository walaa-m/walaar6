<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="bg-light p-5 rounded">
            <h2 class="fw-bold fs-2 mb-5 pb-2">All Classes</h2>
            <a href="{{ route('stuclasses.create') }}" class="btn btn-primary mb-3">Add Class</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Credits</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stuclasses as $stuclass)
                    <tr>
                        <td>{{ $stuclass->title }}</td>
                        <td>{{ $stuclass->description }}</td>
                        <td>{{ $stuclass->credits }}</td>
                        <td>
                            <a href="{{ route('stuclasses.edit', $stuclass->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('stuclasses.destroy', $stuclass->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
