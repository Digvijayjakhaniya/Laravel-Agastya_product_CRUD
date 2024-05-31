<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h1 style="text-align: center">Create Product</h1>
    <form action="{{route('admin.home.store')}}" method="POST" enctype="multipart/form-data" style="text-align: center">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <br><br>
        <label for="description">Description</label>
        <input type="text" name="description" required>
        <br><br>
        <label for="image">Product Image : - </label>
        <input type="file" name="image" accept="image/*" required>
        <br><br><br>
        <button type="submit">Create</button>

    </form>
</body>
</html>
