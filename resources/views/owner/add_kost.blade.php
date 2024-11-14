<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Owner</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<body>
    <header class="py-5"><span class=" text-teal-600 font-bold text-2xl ml-10 my-10">KostCuy</span> </header>
    <main class="flex">
    <aside class="pt-4">
        <ul>
            <li class="pb-2.5 "><a class="bg-gray-800 rounded-r-full text-white flex gap-6 pl-10 pr-20 py-2.5" href=""><x-ionicon-home-outline class="w-7"/>Home</a></li>
            <li class=""><a class="flex gap-6 pl-10 pr-20 py-2.5 hover:text-red-600" href="../logout"><x-ionicon-log-in-outline class="w-7 [stroke-width:1.5]"/>Keluar</a></li>
        </ul>
    </aside>

    <form action="/store" method="POST" enctype="multipart/form-data" class="w-full mx-5">
        @csrf
        <div class="mb-6">
            <label for="nama_kost" class="block mb-2 text-sm font-medium text-gray-900">Nama Kost</label>
            <input type="text" id="nama_kost" name="nama_kost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div> 
    
        <div class="mb-6">
            <label for="deskripsi_kost" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
            <textarea id="deskripsi_kost" name="deskripsi_kost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
        </div> 
    
        <div class="mb-6">
            <label for="peraturan_kost" class="block mb-2 text-sm font-medium text-gray-900">Peraturan Kost</label>
            <textarea id="peraturan_kost" name="peraturan_kost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
        </div> 
        
        <div class="mb-6">
            <label for="fasilitas_kost" class="block mb-2 text-sm font-medium text-gray-900">Fasilitas</label>
            <textarea id="fasilitas_kost" name="fasilitas_kost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
        </div> 

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nama_pemilik" class="block mb-2 text-sm font-medium text-gray-900">Nama Pemilik</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                value="{{ auth()->user()->name }}" 
                required readonly />
            </div>
            <div>
                <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900">No Telepon</label>
                <input type="tel" id="no_telepon" name="no_telepon" 
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                       required 
                       placeholder="Contoh: 082283458815" 
                       title="Nomor telepon harus diawali dengan 08 dan diikuti 10 hingga 13 digit angka." 
                />
            </div>            
            <div>
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                <input type="text" id="harga" name="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>  
            <div>
                <label for="jumlah_kamar" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Kamar</label>
                <input type="number" id="jumlah_kamar" name="jumlah_kamar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
        </div>
        <div class="mb-6">
            <label for="images" class="block mb-2 text-sm font-medium text-gray-900">Upload Gambar</label>
            <input type="file" id="images" name="images[]" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="previewImages()" />
            <!-- Tempat untuk menampilkan preview gambar -->
            <div id="preview" class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4"></div>
        </div> 
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>        
    </form>
    </main>
</body>

<script>
    function previewImages() {
         const input = document.getElementById('images');
         const preview = document.getElementById('preview');
         preview.innerHTML = ""; // Reset tampilan sebelumnya
 
         const files = input.files;
 
         // Cek apakah ada file yang dipilih
         if (files.length === 0) {
             preview.innerHTML = "<p class='text-red-500'>No images selected for preview</p>";
             return;
         }
 
         // Loop melalui setiap file yang diunggah
         Array.from(files).forEach((file, index) => {
             if (file && file.type.startsWith('image/')) {
                 const reader = new FileReader();
 
                 reader.onload = function(e) {
                     // Buat container div untuk gambar dan tombol hapus
                     const imageContainer = document.createElement("div");
                     imageContainer.classList.add("relative", "mb-2");
 
                     // Buat elemen img baru dan atur src-nya dengan data gambar
                     const img = document.createElement("img");
                     img.src = e.target.result;
                     img.classList.add("object-cover", "h-24", "w-full", "rounded-lg"); // Styling menggunakan Tailwind
                     
                     // Buat tombol hapus
                     const deleteButton = document.createElement("button");
                     deleteButton.innerText = "Hapus";
                     deleteButton.classList.add("absolute", "top-1", "right-1", "bg-red-500", "text-white", "rounded-full", "px-2", "py-1", "text-xs");
                     deleteButton.onclick = () => removeImage(index); // Panggil fungsi removeImage dengan index gambar
                     
                     // Tambahkan gambar dan tombol hapus ke dalam container
                     imageContainer.appendChild(img);
                     imageContainer.appendChild(deleteButton);
 
                     // Tambahkan container ke elemen preview
                     preview.appendChild(imageContainer);
                 };
 
                 reader.readAsDataURL(file); // Membaca file sebagai URL data
             }
         });
     }
 
     // Fungsi untuk menghapus gambar yang dipilih
     function removeImage(index) {
         const input = document.getElementById('images');
         const dataTransfer = new DataTransfer();
 
         // Buat ulang file list tanpa file yang dihapus
         const files = Array.from(input.files).filter((_, i) => i !== index);
         files.forEach(file => dataTransfer.items.add(file));
 
         // Perbarui file input dengan file list yang baru
         input.files = dataTransfer.files;
 
         // Perbarui pratinjau gambar setelah penghapusan
         previewImages();
     }
</script>
 
</html>