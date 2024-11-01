<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        @vite('resources/css/app.css')
</head>
<body>
    <div class="max-w-lg mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-indigo-600 mb-6">Form Tambah Data Kost</h2>
        <!-- resources/views/dashboard/tambah_kost_step2.blade.php -->
<form action="{{ route('dashboard.submitStep2') }}" method="POST">
    @csrf
    
    
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Submit</button>
</form>
 </div>
</body>
</html>