<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Owner</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <style>
        #map { 
            height: 400px;
            display: flex;
            justify-content: start;
            align-items: flex-end
         }
        #coordinates { 
            background-color: white; 
            padding: 8px; 
            z-index: 1000; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
            display: flex;
            align-items: center;
        }
        #saveButton, #deleteButton {
            z-index: 1000;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 10px;
        }
        #saveButton:hover, #deleteButton:hover {
            background-color: #45a049;
        }
        </style>
</head>
<body>
    <header class="py-5"><span class=" text-teal-600 font-bold text-2xl ml-10 my-10">
        KostCuy</span> 
    </header>
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

        <div id="map">
            <div id="coordinates">Coordinates: 
                <span id="coords" value=''>N/A</span>
                <button id="saveButton">Save Coordinates</button>
                <button id="deleteButton">Delete Marker</button>

                <input type="text" id="latitude" name="latitude" >
                <input type="text" id="longitude" name="longitude" >
            </div>
        </div>
        

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>        
    </form>
    </main>
</body>



<script>
   
   var map = L.map('map').setView([0.5, 101.5], 12); // Initial map view

// Tile layer from OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 100,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = null; // Variable to store the marker

// Function to update coordinates in the display and hidden input
function updateCoordinates(lat, lng) {
    // Update the display
    document.getElementById('coords').innerText = lat.toFixed(5) + ', ' + lng.toFixed(5);

    // Update hidden input values
    document.getElementById('latitude').value = lat.toFixed(5);
    document.getElementById('longitude').value = lng.toFixed(5);
}

// Function to add a marker
function addMarker(lat, lng) {
    // Remove existing marker if any
    if (marker) {
        map.removeLayer(marker);
    }

    // Create new marker and add it to the map
    marker = L.marker([lat, lng], { draggable: true }).addTo(map);

    // Update coordinates in the display and hidden inputs
    updateCoordinates(lat, lng);

    // Handle marker click to update coordinates
    marker.on('click', function() {
        updateCoordinates(lat, lng);
    });

    // Handle marker drag event to update coordinates
    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        updateCoordinates(position.lat, position.lng);
    });
}

// Add a marker when the map is clicked
map.on('click', function(e) {
    addMarker(e.latlng.lat, e.latlng.lng);
});

// Save button event to send coordinates to the server
document.getElementById('saveButton').addEventListener('click', function() {
    var lat = document.getElementById('latitude').value;
    var lng = document.getElementById('longitude').value;

    if (lat && lng) {
        // Send the coordinates to the server (via AJAX or form submission)
        fetch('/kosts', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                nama_kost: "Sample Kost Name",  // Replace with actual form data
                deskripsi_kost: "Sample Description",  // Replace with actual form data
                peraturan_kost: "Sample Rules",  // Replace with actual form data
                fasilitas_kost: "Sample Facilities",  // Replace with actual form data
                nama_pemilik: "Sample Owner",  // Replace with actual form data
                no_telepon: "1234567890",  // Replace with actual form data
                harga: 1000000,  // Replace with actual form data
                jumlah_kamar: 10,  // Replace with actual form data
                cover: "sample-cover.jpg",  // Replace with actual form data
                latitude: lat,  // Send the latitude
                longitude: lng,  // Send the longitude
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Coordinates saved successfully!");
            } else {
                alert("There was an error saving the coordinates.");
            }
        })
        .catch(error => {
            console.error("Error saving coordinates:", error);
            alert("Error saving coordinates.");
        });
    } else {
        alert("No coordinates set. Please add a marker.");
    }
});

// Delete marker button event
document.getElementById('deleteButton').addEventListener('click', function() {
    if (marker) {
        map.removeLayer(marker);
        marker = null;
        document.getElementById('latitude').value = '';
        document.getElementById('longitude').value = '';
        document.getElementById('coords').innerText = 'N/A';
    }
});

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