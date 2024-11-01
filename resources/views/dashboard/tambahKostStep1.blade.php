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

        <form action="{{ route('dashboard.submitStep1') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label   label for="nama_kost" class="block text-gray-700">Nama Kost</label>
                <input type="text" name="nama_kost" id="nama_kost" required class="w-full px-4 py-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="jenis_kost" class="block text-gray-700">Jenis Kost</label>
                <select name="jenis_kost" id="jenis_kost" required class="w-full px-4 py-2 border rounded-md">
                    <option value="kost putra">Kost Putra</option>
                    <option value="kost putri">Kost Putri</option>
                    <option value="kost campur">Kost Campur</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="deskripsi_kost" class="block text-gray-700">Deskripsi Kost</label>
                <textarea name="deskripsi_kost" id="deskripsi_kost" required class="w-full px-4 py-2 border rounded-md"></textarea>
            </div>
            <div class="mb-4">
                <label for="peraturan_kost" class="block text-gray-700">Peraturan Kost</label>
                <div class="flex flex-col">
                    <label><input type="checkbox" name="peraturan_kost[]" value="jam malam"> Jam Malam</label>
                    <label><input type="checkbox" name="peraturan_kost[]" value="dilarang pasangan suami istri"> Dilarang Pasangan Suami Istri</label>
                    <label><input type="checkbox" name="peraturan_kost[]" value="dilarang bawa hewan"> Dilarang Bawa Hewan</label>
                    <label><input type="checkbox" name="peraturan_kost[]" value="dilarang merokok"> Dilarang Merokok</label>                        <label><input type="checkbox" name="peraturan_kost[]" value="dilarang bertamu melebihi jam 10 malam"> Dilarang Bertamu Melebihi Jam 10 Malam</label>
                </div>
            </div>
            <div class="mb-4">
                <label for="dibangun_tahun" class="block text-gray-700">Tahun Dibangun</label>
                <input type="date" name="dibangun_tahun" id="dibangun_tahun" required class="w-full px-4 py-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="nama_pengelola" class="block text-gray-700">Nama Pengelola</label>
                <textarea name="nama_pengelola" id="nama_pengelola" required class="w-full px-4 py-2 border rounded-md"></textarea>
            </div>
            <div class="mb-4">
                <label for="nomor_hp_pemilik" class="block text-gray-700">Nomor HP pemilik</label>
                <textarea name="nomor_hp_pemilik" id="nomor_hp_pemilik" required class="w-full px-4 py-2 border rounded-md"></textarea>
            </div>
            <div class="mb-4">
                <label for="alamat_kost" class="block text-gray-700">Alamat Kost</label>
                <textarea name="alamat_kost" id="alamat_kost" required class="w-full px-4 py-2 border rounded-md"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Next</button>
        </form>
        
    </div>

</body>

</html>
