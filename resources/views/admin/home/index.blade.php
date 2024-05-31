<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Home</title>
</head>
<body>
    <div style="display: flex; align-items: center;">
        <p style="margin-right: auto;">Welcome, Admin</p>
        <form action="{{route('admin.home.create')}}" method="GET" style="margin-right: 20px;">
            <button type="submit" class="btn btn-primary">create Product</button>
        </form>
        <form action="{{route('admin.home.logout')}}" method="GET" style="margin-right: 10px;">
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
    <table border="" style="width: 100%; margin:100px 0 0 0">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Product id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr style="text-align: center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('img/product_image/' . $product->image) }}" alt="Product Image" width="60px" height="60px"></td>
                <td>
                    <button onclick="window.location='{{ route('admin.home.edit', ['id' => $product->id]) }}'" style="margin-right: 20px">Update</button>
                    <button onclick="window.location='{{ route('admin.home.delete', ['id' => $product->id]) }}'">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
