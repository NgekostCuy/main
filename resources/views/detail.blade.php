<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Detail</h1>

    @auth
        <p>Detail, {{ Auth::user()->name }}!</p>
        <button><a href="/detail">detail</a></button>
        <button><a href="/home">back</a></button>
        <button><a href="/dashboard/admin">dashboard</a></button>
    @endauth

    <p>Status autentikasi: {{ Auth::check() ? 'Logged in' : 'Not logged in' }}</p>

</body>
</html>
