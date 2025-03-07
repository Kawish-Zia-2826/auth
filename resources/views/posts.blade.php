<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">CRUD Table</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($users as $data )
          <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->title}}</td>
            <td>
                <a href="{{route('UpdatePost',$data->id)}}" class="btn btn-primary btn-sm">Update</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
          @endforeach
          
        </tbody>
    </table>

    <!-- Back Button -->
    <a href="/" class="btn btn-dark">Back</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
