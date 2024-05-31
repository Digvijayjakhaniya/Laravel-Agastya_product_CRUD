<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
</head>
<body>
    <h1 style="text-align: center">Create Product</h1>
    <form action="{{route('admin.home.update', ['id' => $products->id])}}" method="POST" enctype="multipart/form-data" style="text-align: center">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" value="{{$products->title}}">
        <br><br>
        <label for="description">Description</label>
        <input type="text" name="description" value="{{$products->description}}">
        <br><br>
        <label for="current_image">Current Image:</label>
        <br>
        @if($products->image)
        <img src="{{ asset('img/product_image/' . $products->image) }}" alt="Product Image" width="100px" height="100px">
        <br><br>
        @else
        <span>No image available</span>
        <br><br>
        @endif
        <label for="image">Product Image : - </label>
        <input type="file" name="image" value="{{$products->image}}" accept="image/*">
        <br><br><br>
        <button type="submit">Update</button>

    </form>
</body>
</html>
