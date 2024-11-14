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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <title>NgekostCuy</title>

    <style>
        @media (min-width: 768px) {
            .overflow-x-auto {
                overflow-x: visible; /* No horizontal scroll on desktop */
            }
        }

        /* Set height for the parent section to make vertical centering effective */
        .carousel {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Set height for the carousel */
        .swiper-container {
            width: auto; /* Sesuaikan lebar agar responsif */
        }

        /* Center the images inside the slide */
        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Set the image to fill the slide while maintaining aspect ratio */
        .swiper-slide img {
            width: 1000px;
            height: 720px;
            object-fit: cover; /* Mengisi slide dan menjaga rasio aspek */
            border-radius: 200px;
        }

        .text-overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Warna latar belakang semi-transparan */
            padding: 8px 12px;
            border-radius: 8px;
            text-align: right;
        }

        .aspect-ratio {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Untuk rasio 16:9 */
        }

        .aspect-ratio img {
            position: relative;
            object-fit: cover; /* Memastikan gambar terisi dengan baik */
        }

        .universitas-card {
            position: relative;
            overflow: hidden; /* Memastikan teks tidak terlihat di luar area kartu */
            display: flex; /* Menggunakan flexbox */
            flex-direction: column; /* Mengatur arah kolom */
            align-items: center; /* Memusatkan item secara horizontal */
            justify-content: center; /* Memusatkan item secara vertikal */
            height: 100%; /* Mengatur tinggi penuh */
        }

        .universitas-card img {
            transition: opacity 0.5s ease; /* Transisi untuk opacity gambar */
            max-height: 100%; /* Menjaga agar gambar tidak lebih tinggi dari kontainer */
        }

        .universitas-card:hover img {
            opacity: 0; /* Menyembunyikan gambar saat di-hover */
        }

        .universitas-card .text-overlay {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8); /* Latar belakang semi-transparan */
            text-align: center;
            opacity: 0; /* Teks tidak terlihat secara default */
            transition: opacity 0.5s ease; /* Transisi saat teks muncul */
            padding: 10px; /* Ruang dalam untuk teks */
            display: flex; /* Menggunakan flexbox untuk tata letak */
            flex-direction: column; /* Mengatur arah vertikal */
            justify-content: center; /* Menyelaraskan secara vertikal */
            align-items: center; /* Menyelaraskan secara horizontal */
            height: 100%; /* Memastikan overlay memenuhi area */
        }

        .universitas-card:hover .text-overlay {
            opacity: 1; /* Teks muncul saat di-hover */
        }




        </style>
    
</head>
<body>
    <x-header_main />
    
    <section class="m-10 flex items-center py-20 relative">
        <div class="z-10 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 relative">
            <form class="space-y-6" action="#">
                <h5 class="text-xl font-medium text-gray-900">Temukan Kost Pilihan Anda</h5>
                <div>
                    <div class="relative">
                        <input type="text" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-none peer" placeholder="" />
                        <label for="floating_outlined" class="absolute text-sm text-black duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-focus:text-teal-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">Lokasi</label>
                    </div>
                </div>
                <div>
                    <label for="price" class="block mb-2 text-sm font-normal text-green-700">Range Harga</label>
                    <div class="relative mb-6">
                        <label for="labels-range-input" class="sr-only">Labels range</label>
                        <input id="labels-range-input" type="range" value="1000" min="100" step="200" max="1500" class="w-full h-2 bg-teal-600 rounded-lg appearance-none cursor-pointer" />
                        <span class="text-sm text-gray-500 absolute left-0 -bottom-6">Min (Rp.100.000)</span>
                        <span class="text-sm text-gray-500 absolute right-0 -bottom-6">Max (Rp.1.500.000)</span>
                    </div>
                </div>
                <button type="submit" class="w-full text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cari</button>
            </form>
        </div>
    
        <!-- Swiper section -->
        <div class="swiper z-0 absolute inset-0 ms-40">
            <div class="progress-slide-carousel swiper-container relative h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center relative">
                            <img src="img/room-1.jpg" alt="" class="w-full h-full object-cover rounded-2xl">
                            <div class="text-overlay absolute bottom-4 right-4 text-white">
                                <h1 class="text-lg font-bold">Room 1</h1>
                                <span class="text-sm">Cozy and Comfortable</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center relative">
                            <img src="img/room-2.jpg" alt="" class="w-full h-full object-cover rounded-2xl">
                            <div class="text-overlay absolute bottom-4 right-4 text-white">
                                <h1 class="text-lg font-bold">Room 2</h1>
                                <span class="text-sm">Modern and Stylish</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center relative">
                            <img src="img/room-3.jpg" alt="" class="w-full h-full object-cover rounded-2xl">
                            <div class="text-overlay absolute bottom-4 right-4 text-white">
                                <h1 class="text-lg font-bold">Room 3</h1>
                                <span class="text-sm">Spacious and Bright</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center relative">
                            <img src="img/room-4.jpg" alt="" class="w-full h-full object-cover rounded-2xl">
                            <div class="text-overlay absolute bottom-4 right-4 text-white">
                                <h1 class="text-lg font-bold">Room 4</h1>
                                <span class="text-sm">Luxury and Comfort</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto bg-gray-100"></div>
            </div>
        </div>        
    </section>    

    <section class="rekomendasi m-5">
        <h2 class="font-medium text-xl mb-5">Rekomendasi Kost</h2>
        <div class="overflow-x-auto">
            <div class="flex gap-5">
                @php
                
                @endphp
                @foreach($kosts as $kost)
                    <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow inline-block">
                        <a href="{{ url('detail', $kost->id) }}">
                            @if ($kost->cover)
                                <img src="{{ asset('images/' . $kost->cover->image) }}" class="object-cover h-24 md:h-full" alt="{{ $kost->nama_kost }}">
                                @elseif ($kost->images->isNotEmpty())
                                <img src="{{ asset('images/' . $kost->images->first()->image) }}" class="object-cover h-24 md:h-auto" alt="{{ $kost->nama_kost }}">
                                @else
                                <p>No image available</p>
                            @endif
                        </a>
                        <div class="px-5 pb-5">
                            <div class="flex items-center mt-2.5 mb-5">
                                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">{{ $kost->nama_pemilik }}</span>
                                <span class="ml-auto text-blue-800 text-md font-semibold">{{ $kost->rating }}</span>
                            </div>
                            <a href="{{ url('detail', $kost->id) }}">
                                <h5 class="text-xl font-medium tracking-tight text-gray-900">{{ $kost->nama_kost }}</h5>
                            </a>
                            <div class="flex items-center justify-between">
                                <span class="text-md font-semibold text-gray-900">Rp.{{ number_format($kost->harga, 0, ',', '.') }} (perbulan)</span>
                            </div>
                            <div class="flex items-center mt-3">
                                <span class="flex items-center mx-2">
                                    <i class="fas fa-car text-gray-600 mr-1"></i>
                                </span>
                                <span class="flex items-center mx-2">
                                    <i class="fas fa-wifi text-gray-600 mr-1"></i>
                                </span>
                                <span class="flex items-center mx-2">
                                    <i class="fa-solid fa-toilet text-gray-600 mr-1"></i>
                                </span>
                                <span class="flex items-center mx-2">
                                    <i class="fa-solid fa-shower text-gray-600 mr-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    


    <section class="rekomendasi m-5">
        <h2 class="font-medium text-xl mb-5">Termurah</h2>
        
        <div class="overflow-x-auto">
            <div class="flex gap-5">
                @php
                $kosts = $kosts->sortBy('harga');
                @endphp
                @foreach($kosts as $kost)
                    <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow inline-block">
                        <a href="{{ url('detail', $kost->id) }}">
                            @if ($kost->cover)
                                <img src="{{ asset('images/' . $kost->cover->image) }}" class="object-cover h-24 md:h-full" alt="{{ $kost->nama_kost }}">
                                @elseif ($kost->images->isNotEmpty())
                                <img src="{{ asset('images/' . $kost->images->first()->image) }}" class="object-cover h-24 md:h-auto" alt="{{ $kost->nama_kost }}">
                                @else
                                <p>No image available</p>
                            @endif
                        </a>
                        <div class="px-5 pb-5">
                            <div class="flex items-center mt-2.5 mb-5">
                                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">{{ $kost->nama_pemilik }}</span>
                                <span class="ml-auto text-blue-800 text-md font-semibold">{{ $kost->rating }}</span>
                            </div>
                            <a href="{{ url('detail', $kost->id) }}">
                                <h5 class="text-xl font-medium tracking-tight text-gray-900">{{ $kost->nama_kost }}</h5>
                            </a>
                            <div class="flex items-center justify-between">
                                <span class="text-md font-semibold text-gray-900">Rp.{{ number_format($kost->harga, 0, ',', '.') }} (perbulan)</span>
                            </div>
                            <div class="flex items-center mt-3">
                                <span class="flex items-center mx-2">
                                    <i class="fas fa-car text-gray-600 mr-1"></i>
                                </span>
                                <span class="flex items-center mx-2">
                                    <i class="fas fa-wifi text-gray-600 mr-1"></i>
                                </span>
                                <span class="flex items-center mx-2">
                                    <i class="fa-solid fa-toilet text-gray-600 mr-1"></i>
                                </span>
                                <span class="flex items-center mx-2">
                                    <i class="fa-solid fa-shower text-gray-600 mr-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="category-kampus m-10">
        <h2 class="font-medium text-xl mb-5">Berdasarkan Area Kampus</h2>
        <div class="grid gap-4 grid-cols-1">
            <div class="container-universitas grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"> <!-- Gunakan grid untuk kolom -->
                <a href="#" class="universitas-card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex justify-center items-center w-full md:w-1/4">
                        <img class="object-cover h-48 md:h-auto md:rounded-none md:rounded-s-lg md:my-10" src="img/logo-unri.png" alt="">
                    </div>
                    <div class="text-overlay w-full flex flex-col justify-center items-center leading-normal md:w-3/4">
                        <h5 class="mb-2 text-lg md:text-2xl font-bold tracking-tight text-gray-900">Universitas Riau</h5>
                        <p class="mb-3 text-sm md:text-xl font-normal text-gray-700 dark:text-gray-400">Bina Widya</p>
                    </div>
                </a>
            
                <a href="#" class="universitas-card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex justify-center items-center w-full md:w-1/4">
                        <img class="object-cover h-48 md:h-auto md:rounded-none md:rounded-s-lg md:my-10" src="img/uin.png" alt="">
                    </div>
                    <div class="text-overlay w-full flex flex-col justify-center items-center leading-normal md:w-3/4">
                        <h5 class="mb-2 text-lg md:text-2xl font-bold tracking-tight text-gray-900">Universitas Islam Negeri SSQ</h5>
                        <p class="mb-3 text-sm md:text-xl font-normal text-gray-700 dark:text-gray-400">Rimbo Panjang</p>
                    </div>
                </a>
            
                <a href="#" class="universitas-card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex justify-center items-center w-full md:w-1/4">
                        <img class="object-cover h-48 md:h-auto md:rounded-none md:rounded-s-lg md:my-10" src="img/uir.png" alt="">
                    </div>
                    <div class="text-overlay w-full flex flex-col justify-center items-center leading-normal md:w-3/4">
                        <h5 class="mb-2 text-lg md:text-2xl font-bold tracking-tight text-gray-900">Universitas Pahlawan</h5>
                        <p class="mb-3 text-sm md:text-xl font-normal text-gray-700 dark:text-gray-400">Tuanku Tambusai</p>
                    </div>
                </a>
            </div>
            <div class="container-universitas grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"> <!-- Gunakan grid untuk kolom -->
                <a href="#" class="universitas-card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex justify-center items-center w-full md:w-1/4">
                        <img class="object-cover h-48 md:h-auto md:rounded-none md:rounded-s-lg md:my-10" src="img/logo-up.png" alt="">
                    </div>
                    <div class="text-overlay w-full flex flex-col justify-center items-center leading-normal md:w-3/4">
                        <h5 class="mb-2 text-lg md:text-2xl font-bold tracking-tight text-gray-900">Universitas Lacang Kuning</h5>
                        <p class="mb-3 text-sm md:text-xl font-normal text-gray-700 dark:text-gray-400">Rumbai</p>
                    </div>
                </a>
            
                <a href="#" class="universitas-card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex justify-center items-center w-full md:w-1/4">
                        <img class="object-cover h-48 md:h-auto md:rounded-none md:rounded-s-lg md:my-10" src="img/pcr.png" alt="">
                    </div>
                    <div class="text-overlay w-full flex flex-col justify-center items-center leading-normal md:w-3/4">
                        <h5 class="mb-2 text-lg md:text-2xl font-bold tracking-tight text-gray-900">Politeknik Caltex Riau</h5>
                        <p class="mb-3 text-sm md:text-xl font-normal text-gray-700 dark:text-gray-400">Rumbai</p>
                    </div>
                </a>
            
                <a href="#" class="universitas-card flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <div class="flex justify-center items-center w-full md:w-1/4">
                        <img class="object-cover h-48 md:h-auto md:rounded-none md:rounded-s-lg md:my-10" src="img/logo-up.png" alt="">
                    </div>
                    <div class="text-overlay w-full flex flex-col justify-center items-center leading-normal md:w-3/4">
                        <h5 class="mb-2 text-lg md:text-2xl font-bold tracking-tight text-gray-900">Universitas Pahlawan</h5>
                        <p class="mb-3 text-sm md:text-xl font-normal text-gray-700 dark:text-gray-400">Tuanku Tambusai</p>
                    </div>
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

</body>

<script>
    document.getElementById('hamburger').addEventListener('click', function() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('hidden');
    });

    var swiper = new Swiper(".progress-slide-carousel", {
      loop: true,
      fraction: true,
      autoplay: {
        delay: 2400,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".progress-slide-carousel .swiper-pagination",
        type: "progressbar",
      },
      });
</script>
</html>


