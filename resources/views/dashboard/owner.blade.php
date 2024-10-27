<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Owner</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<body>
    <header class="py-5"><span class=" text-teal-600 font-bold text-2xl ml-10 my-10">KostCuy</span> </header>
    <main class="flex">
    <aside class="pt-4">
        <ul>
            <li class="pb-2.5 "><a class="bg-gray-800 rounded-r-full text-white flex gap-6 pl-10 pr-20 py-2.5" href=""><x-ionicon-home-outline class="w-7"/>Home</a></li>
            <li class=""><a class="flex gap-6 pl-10 pr-20 py-2.5 hover:text-red-600" href="../logout"><x-heroicon-o-arrow-right-start-on-rectangle class="w-7 [stroke-width:1.5]"/>Keluar</a></li>
        </ul>
    </aside>
    <div class="bg-gray-50 ">
        <div class="py-8 px-10">
            <div class="flex border-b mb-8">
                <div class="mr-28 pb-9">
                    <p class="mb-5 font-medium">Data Kost</p>
                    <Button class=" bg-teal-600 text-white rounded py-2.5 px-8"> 
                        <a href="/add_kost">Tambah Data Kost</a>
                        </Button>
                </div>
                <div class=" pl-8 border-l pb-9">
                    <p class="mb-5 font-medium">Pusat Bantuan</p>
                    <Button class=" border-teal-600 text-teal-600 rounded border-2 py-2 px-14">Chat CS</Button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($kosti as $kost) <!-- Looping untuk setiap kost -->
                <div class="flex justify-between flex-col bg-gray-50/5 shadow-lg border rounded-md p-4">
                    <div class="flex gap-5 mb-4">
                        <div class="basis-2/3 ">
                            <p class="text-teal-600 font-semibold mb-3">{{ $kost->nama }}</p> <!-- Menampilkan nama kost -->
                            <p class="font-semibold mb-2">{{ $kost->deskripsi }}</p> <!-- Menampilkan deskripsi kost -->
                            <p class="text-xs">{{ $kost->alamat }}</p> <!-- Jika ada kolom alamat, sesuaikan nama kolomnya -->
                        </div>
                        <div class="">
                            <img src="{{ asset('public/img/kost_1.jpg') }}" class="object-cover h-24 md:h-16" alt=""> <!-- Gambar bisa disesuaikan -->
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <form id="deleteForm" action="{{ route('kost.destroy', $kost->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE') <!-- Metode DELETE untuk menghapus -->
                            <button type="button" onclick="openModal()" class="w-full bg-red-600 hover:bg-red-700 text-white rounded py-2 transition duration-150 ease-in-out">Hapus Kost</button>
                        </form>
                        <a href="{{ url('/edit_kost/' . $kost->id) }}" class="flex-1 bg-teal-600 hover:bg-teal-700 text-white rounded py-2 text-center transition duration-150 ease-in-out">Edit Kost</a>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center z-50 hidden bg-gray-800 bg-opacity-50">
                <div class="bg-white rounded-lg p-6 w-1/3">
                    <h2 class="text-lg font-bold mb-4">Konfirmasi Penghapusan</h2>
                    <p>Apakah Anda yakin ingin menghapus kost ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <div class="flex justify-end mt-4">
                        <button onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 rounded py-1 px-3 mr-2">Batal</button>
                        <button onclick="document.getElementById('deleteForm').submit();" class="bg-red-600 hover:bg-red-700 text-white rounded py-1 px-3">Hapus</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>    
    </main>
</body>

<script>
function openModal() {
    document.getElementById('confirmationModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('confirmationModal').classList.add('hidden');
}
</script>
</html>