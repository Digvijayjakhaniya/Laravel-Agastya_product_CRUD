<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <H1 style="text-align: center">Admin Login</H1>
    <form action="{{route('admin.login.check')}}" method="POST" style="text-align: center;">
        @csrf
        <label for="email">Email</label>
        <input type="text" name="email">
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
