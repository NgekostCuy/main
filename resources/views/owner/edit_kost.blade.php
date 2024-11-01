<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Kost</title>
</head>
<body>
    <header class="py-5"><span class=" text-teal-600 font-bold text-2xl ml-10 my-10">KostCuy</span> </header>
    <main class="flex">
    <aside class="pt-4">
        <ul>
            <li class="pb-2.5 "><a class="bg-gray-800 rounded-r-full text-white flex gap-6 pl-10 pr-20 py-2.5" href="/dashboard/owner"><x-ionicon-home-outline class="w-7"/>Home</a></li>
            <li class=""><a class="flex gap-6 pl-10 pr-20 py-2.5 hover:text-red-600" href="../logout"><x-heroicon-o-arrow-right-start-on-rectangle class="w-7 [stroke-width:1.5]"/>Keluar</a></li>
        </ul>
    </aside>

    <form action="{{ route('kost.update', $kost->id) }}" method="POST" enctype="multipart/form-data" class="w-full mx-5">
        @csrf
        <div class="mb-6">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Kost</label>
            <input type="text" id="nama" name="nama" value="{{ $kost->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div> 
    
        <div class="mb-6">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{ $kost->deskripsi }}</textarea>
        </div> 
    
        <div class="mb-6">
            <label for="peraturan" class="block mb-2 text-sm font-medium text-gray-900">Peraturan Kost</label>
            <textarea id="peraturan" name="peraturan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{ $kost->peraturan }}</textarea>
        </div> 
        
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nama_pemilik" class="block mb-2 text-sm font-medium text-gray-900">Nama Pemilik</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" value="{{ $kost->nama_pemilik }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900">No Telepon</label>
                <input type="tel" id="telepon" name="telepon" value="{{ $kost->nomor_hp }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                <input type="text" id="harga" name="harga" value="{{ $kost->harga }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>  
            <div>
                <label for="total_kamar" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Kamar</label>
                <input type="number" id="total _kamar" name="total_kamar" value="{{ $kost->total_kamar }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
        </div>
        
        <div class="mb-6">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Upload Gambar (Kosongkan jika tidak ingin mengubah)</label>
            @if($kost->image)
                <img src="{{ asset('path/to/images/' . $kost->image) }}" alt="Gambar Kost" class="mb-2 w-32 h-32 object-cover">
            @endif
            <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan Perubahan</button>
    </form>
    </main>
</body>
</html>