<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bg-[url('img/login-bg.png')] bg-no-repeat m-0 h-max bg-cover">
    <div class="flex items-center justify-center h-screen">
        @if(session()->has('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              {{ session('success') }}
            </div>
          </div>
        @endif
        

        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-xl text-teal-600 font-bold mb-4">NgekosCuy
                <span class="text-gray-600 font-bold">
                    Login
                </span>
             </h2>
        @if ($errors->any())<div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="mt-1 p-2 w-full border rounded-md" placeholder="Contoh: johndoe@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Password">
            </div>

            <div class="mb-4 flex justify-end text-xs text-red-500 hover:underline">
               <a href="/forgot-password">Lupa Kata Sandi?</a>
            </div>

            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="bg-teal-600 text-white p-3 w-full rounded-md mb-4">Login</button>
            </div>

            <p class="flex justify-end text-xs text-gray-600"> Belum punya akun?
                <a href="/register" :active="request()->is('register')" class="ms-1 mb-4 flex justify-end text-xs text-red-500 hover:underline">Daftar disini</a></p>
        </form>
    </div> 
    </div>
</body>
</html>