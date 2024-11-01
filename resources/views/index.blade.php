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
    <header class='border-b bg-white font-sans min-h-[60px] px-4 py-3 mx-5 relative tracking-wide z-50'>
        <div class='flex flex-wrap items-center max-lg:gap-y-6'>
            <a href='/' class='hover:text-[#007bff] text-sm md:text-xl text-teal-600 block font-extrabold'>NgekostCuy</a>
            
            <div class="flex-grow flex justify-center items-center max-lg:flex-col">
                <div class="flex items-center hidden md:flex">
                    <input type="text" placeholder="Search..." class="border rounded-md px-4 py-2 w-full max-w-[250px]" />
                    <button class="ml-2 bg-teal-600 text-white px-4 py-2 rounded-md">Search</button>
                </div>
            </div>

            <button id="hamburger" class="lg:hidden flex items-center p-2 ml-auto">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div id="menu" class='hidden lg:flex lg:items-center md:justify-center ml-auto space-x-4'>
                <ul class='lg:flex lg:gap-x-10 max-lg:flex-col max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-2/3 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:px-10 max-lg:py-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
                    <li class='mb-6 hidden max-lg:block md:text-center'>
                        <a href='/index.html' class='hover:text-[#007bff] text-[15px] text-teal-600 block font-extrabold text-lg'>NgekostCuy</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-3 flex items-center justify-center'>
                        <a href='dashboard/owner' class='hover:text-[#007bff] text-[15px] text-gray-700 block font-bold'>Promosikan Kosmu Disini</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-3 flex items-center justify-center'>
                        <a href='favorit' class='hover:text-[#007bff] text-[15px] text-gray-700 block font-bold'>Favorit</a>
                    </li>
                    @auth
                        <li class='max-lg:border-b max-lg:py-3 flex justify-center'>
                            <button class="bg-teal-600 px-5 py-2 rounded">
                                <a href='logout' class='hover:text-[#007bff] text-white font-bold text-[15px] block'>Logout</a>
                            </button>
                            {{-- <p>{{ Auth::user()->name }}</p> --}}
                        </li>

                    @endauth
                    @guest     
                    <li class='max-lg:border-b max-lg:py-3 flex justify-center'>
                        <button class="bg-teal-600 px-5 py-2 rounded">
                            <a href='login' class='hover:text-[#007bff] text-white font-bold text-[15px] block'>Login</a>
                        </button>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </header>
    
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

    {{-- <section class="rekomendasi m-5">
        <h2 class="font-medium text-xl mb-5">Rekomendasi Kost</h2>
        <div class="overflow-x-auto">
            <div class="flex gap-5">
                <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow inline-block">
                    <a href="detail">
                        <img class="p-2 rounded-t-xl" src="img/room-1.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <div class="flex items-center mt-2.5 mb-5">
                            <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">Putra</span>
                            <span class="ml-auto text-blue-800 text-md font-semibold">5.0</span>
                        </div>
                        <a href="detail.html">
                            <h5 class="text-xl font-medium tracking-tight text-gray-900">Kost Anggun Citra Elok Nirwana Residence</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-md font-semibold text-gray-900">Rp.750.000 (perbulan)</span>
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
    
                <!-- Repeat for additional cards -->
                <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow inline-block">
                    <a href="detail.html">
                        <img class="p-2 rounded-t-xl" src="img/room-2.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <div class="flex items-center mt-2.5 mb-5">
                            <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">Putra</span>
                            <span class="ml-auto text-blue-800 text-md font-semibold">5.0</span>
                        </div>
                        <a href="detail.html">
                            <h5 class="text-xl font-medium tracking-tight text-gray-900">Kost Harmoni Indah Sejahtera Residence</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-md font-semibold text-gray-900">Rp.750.000 (perbulan)</span>
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
                <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow inline-block">
                    <a href="detail.html">
                        <img class="p-2 rounded-t-xl" src="img/room-3.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <div class="flex items-center mt-2.5 mb-5">
                            <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">Putra</span>
                            <span class="ml-auto text-blue-800 text-md font-semibold">5.0</span>
                        </div>
                        <a href="detail.html">
                            <h5 class="text-xl font-medium tracking-tight text-gray-900">Kost Griya Sakinah Asri Taman Surya</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-md font-semibold text-gray-900">Rp.750.000 (perbulan)</span>
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
                <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow inline-block">
                    <a href="detail.html">
                        <img class="p-2 rounded-t-xl" src="img/room-4.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <div class="flex items-center mt-2.5 mb-5">
                            <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">Putra</span>
                            <span class="ml-auto text-blue-800 text-md font-semibold">5.0</span>
                        </div>
                        <a href="detail.html">
                            <h5 class="text-xl font-medium tracking-tight text-gray-900">Kost Mentari Ceria Purnama Permata</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-md font-semibold text-gray-900">Rp.750.000 (perbulan)</span>
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
            </div>
        </div>
    </section> --}}

    <section class="rekomendasi m-5">
        <h2 class="font-medium text-xl mb-5">Rekomendasi Kost</h2>
        <div class="overflow-x-auto">
            <div class="flex gap-5">
                @php
                // $kosts = $kosts->sortByDesc('harga');
                @endphp
                @foreach($kosts as $kost)
                    <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow inline-block">
                        <a href="{{ url('detail', $kost->id) }}">
                            {{-- Cek apakah kost memiliki gambar --}}
                            @if ($kost->images->isNotEmpty())
                                {{-- Ambil gambar terbaru berdasarkan waktu upload --}}
                                @php
                                    $latestImage = $kost->images->sortByDesc('created_at')->first();
                                @endphp
                                <img src="{{ asset('storage/' . $latestImage->file_path) }}" class="p-2 rounded-t-xl object-cover h-24 md:h-48" alt="{{ $kost->name }}">
                            @else
                                {{-- Gambar default jika tidak ada --}}
                                <img src="{{ asset('public/img/default.jpg') }}" class="p-2 rounded-t-xl object-cover h-24 md:h-48" alt="Default Image">
                            @endif
                        </a>
                        <div class="px-5 pb-5">
                            <div class="flex items-center mt-2.5 mb-5">
                                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">{{ $kost->nama_pemilik }}</span>
                                <span class="ml-auto text-blue-800 text-md font-semibold">{{ $kost->rating }}</span>
                            </div>
                            <a href="{{ url('detail', $kost->id) }}">
                                <h5 class="text-xl font-medium tracking-tight text-gray-900">{{ $kost->nama }}</h5>
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
                            {{-- Cek apakah kost memiliki gambar --}}
                            @if ($kost->images->isNotEmpty())
                                {{-- Ambil gambar terbaru berdasarkan waktu upload --}}
                                @php
                                    $latestImage = $kost->images->sortByDesc('created_at')->first();
                                @endphp
                                <img src="{{ asset('storage/' . $latestImage->file_path) }}" class="p-2 rounded-t-xl object-cover h-24 md:h-48" alt="{{ $kost->name }}">
                            @else
                                {{-- Gambar default jika tidak ada --}}
                                <img src="{{ asset('public/img/default.jpg') }}" class="p-2 rounded-t-xl object-cover h-24 md:h-48" alt="Default Image">
                            @endif
                        </a>
                        <div class="px-5 pb-5">
                            <div class="flex items-center mt-2.5 mb-5">
                                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2.5 py-0.5 rounded">{{ $kost->nama_pemilik }}</span>
                                <span class="ml-auto text-blue-800 text-md font-semibold">{{ $kost->rating }}</span>
                            </div>
                            <a href="{{ url('detail', $kost->id) }}">
                                <h5 class="text-xl font-medium tracking-tight text-gray-900">{{ $kost->nama }}</h5>
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


