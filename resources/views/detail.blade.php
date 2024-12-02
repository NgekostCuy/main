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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    
    <title>Detail</title>
</head>
<body>
    <x-header_main />

    <div class="flex grid gap-4 m-5">       
        <div class="flex">
            <div class="flex">
                @if(isset($kost->images[0]))
                <img class=" max-w-[50%] rounded-lg mx-2" src="{{ asset('images/' . $kost->images[0]->image) }}" alt="">
                @endif
                <div class="grid grid-cols-2 gap-2">
                    @foreach($kost->images->slice(1)->take(4) as $image)
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('images/' . $image->image) }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <section class="content flex flex-row justify-between items-start">
        <div class="mx-10 border-b-2 py-3 flex justify-between items-center">
            <div>
                <h2 class="lg:text-2xl md:text-xl sm:text-lg font-semibold" >{{ $kost->nama_kost }}</h2>
                <div class="flex items-center">
                    <a type="button" class="rounded-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center me-2">Kost Putra</a>
                    <span class="text-sm text-gray-700 underline font-medium">Nusa Ceningan, Indonesia</span>
                </div>
    
                <h2 class="mt-5 lg:text-2xl md:text-xl sm:text-lg font-semibold">Kost dikelola oleh {{ $kost->nama_pemilik }}</h2>
                <div class="mt-2 text-gray-700">
                    <h2 class="lg:text-2xl md:text-xl sm:text-lg font-semibold mt-10">
                        Fasilitas Umum
                    </h2>

                    <div class="flex flex-row gap-2 justify-between">
                        <div>
                            <ul class="list-disc list-inside">
                               <li> {{ $kost->fasilitas_kost }} </li> 
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-2 text-gray-700">
                    <h2 class="lg:text-2xl md:text-xl sm:text-lg font-semibold mt-10">
                        Peraturan Kost
                    </h2>

                    <div class="flex flex-row gap-2 justify-between">
                        <div>
                            <ul class="list-disc list-inside">
                               <li> {{ $kost->peraturan_kost }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-2 text-gray-700">
                    <h2 class="lg:text-2xl md:text-xl sm:text-lg font-semibold mt-10">
                        Lokasi
                    </h2>

                    <div id="map" style="width:600px; height: 400px"></div>
                </div>

                <a href="https://www.google.com/maps?q={{ $kost->latitude }},{{ $kost->longitude }}" target="_blank">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
                        Rute
                    </button>
                </a>
            </div>
        </div>
    
        <div class="sticky top-0 right-0 mx-10 py-3 flex justify-between items-center z-10">
            <div class="max-w-sm p-6 bg-white border rounded-lg shadow">
                <div class="flex flex-row items-center mb-4 pb-3 border-b-2">
                    <div class="flex items-center">
                        <div>
                            <span class="bg-teal-200 text-teal-700 py-1 px-4 rounded-full text-xs inline-block font-semibold">Sisa 7 Kamar</span>
                        </div>
                        <div class="ml-3 flex flex-col justify-center">
                            {{-- <span class="text-xs text-gray-700 font-semibold">Terakhir update 27 September 2024</span> --}}
                            <span class="text-xs text-gray-500">Data dapat berubah kapanpun</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <div>
                        <p class="mb-3 font-normal text-gray-700">Harga</p>
                    </div>
                    <div>
                        <p class="mb-3 font-normal text-gray-700">Rp {{ $kost->harga }}</p>
                    </div>
                </div>
    
                <a href="https://api.whatsapp.com/send/?phone=%2B62{{$kost->no_telepon}}" class="w-full inline-flex items-center px-3 py-2 text-sm font-medium text-center justify-center text-white bg-teal-600 rounded-full hover:bg-teal-900 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Chat Owner
                </a>
            </div>
        </div>
    </section>

    <footer class="mt-5 relative bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 ">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Ngekost Cuy</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#" class="hover:underline me-4 md:me-6">About</a>
            </li>
            <li>
                <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
    </footer>
    

    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });

        // Get the latitude and longitude from your PHP backend (or set them manually for testing)
var latitude = parseFloat("{{ $kost->latitude ?? '0.0' }}");  // Use server-side data or default to '0.0' if not available
var longitude = parseFloat("{{ $kost->longitude ?? '0.0' }}");

// Initialize the map with the provided latitude and longitude
var map = L.map('map').setView([latitude, longitude], 12);  // Use provided latitude, longitude, and zoom level

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 100,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Automatically place a marker at the given coordinates
var marker = L.marker([latitude, longitude]).addTo(map);

// Function to update coordinates display and hidden input fields
function updateCoordinates(lat, lng) {
    document.getElementById('coords').innerText = lat.toFixed(5) + ', ' + lng.toFixed(5);  // Show coordinates on the page
    document.getElementById('latitude').value = lat;  // Set hidden latitude input
    document.getElementById('longitude').value = lng;  // Set hidden longitude input
}

// Initially update the coordinates on page load
updateCoordinates(latitude, longitude);

// Optionally, add event listener to update coordinates when marker is dragged
marker.on('dragend', function(event) {
    var position = marker.getLatLng();
    updateCoordinates(position.lat, position.lng);  // Update coordinates on drag
});

// Delete the marker when the delete button is clicked
document.getElementById('deleteButton').addEventListener('click', function() {
    map.removeLayer(marker);  // Remove the marker
    marker = null;  // Reset the marker
    document.getElementById('coords').innerText = 'N/A';  // Reset coordinates display
    document.getElementById('latitude').value = '';  // Clear latitude value
    document.getElementById('longitude').value = '';  // Clear longitude value
});

    </script>
</body> 
</script>
</html>
