<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Home</h1>
    
    @guest
        <button><a href="/login">login</a></button>
        <button><a href="/register">register</a></button>
    @endguest

    @auth
        <p>Selamat datang, {{ Auth::user()->name }}!</p>
        <!-- Anda bisa menambahkan tombol lain di sini jika diperlukan -->
    @endauth

</body>
</html>
