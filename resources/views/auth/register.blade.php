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
    <title>Register</title>
</head>
<body class="bg-[url('img/login-bg.png')] bg-no-repeat m-0 h-max bg-cover">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-xl text-teal-600 font-bold mb-4">NgekosCuy
                <span class="text-gray-600 font-bold">
                    Register
                </span>
             </h2>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="mt-1 p-2 w-full border rounded-md"  @error('name') is-invalid @enderror placeholder="Bapak Ganteng" >
                @error('name')
                <div class="bg-red-100 border border-red-400 text-red-700 my-1 px-3 py-2 rounded relative text-sm" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="mt-1 p-2 w-full border rounded-md"  @error('email') is-invalid @enderror placeholder="bapak_ganteng@gmail.com">
                @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 my-1 px-3 py-2 rounded relative text-sm" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="mt-1 p-2 w-full border rounded-md"  @error('password') is-invalid @enderror placeholder="*********">
                @error('password')
                <div class="bg-red-100 border border-red-400 text-red-700 my-1 px-3 py-2 rounded relative text-sm" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="block text-sm font-medium text-gray-600">Register as</label>
                <select name="role" class="mt-1 p-2 w-full border rounded-md @error('role') is-invalid @enderror">
                    <option value="">Select Role</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Pencari Kost</option>
                    <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Pemilik Kost</option>
                </select>
                @error('role')
                <div class="bg-red-100 border border-red-400 text-red-700 my-1 px-3 py-2 rounded relative text-sm" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="bg-teal-600 text-white p-3 w-full rounded-md mb-4">Register</button>
            </div>
            <p class="flex justify-end text-xs text-gray-600"> Sudah punya akun?
                <a href="/" :active="request()->is('login')" class="ms-1 mb-4 flex justify-end text-xs text-red-500 hover:underline">Login disini</a></p>
        </form>
    </div> 
    </div>
</body>
</html>
