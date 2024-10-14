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
    <title>Detail</title>
</head>
<body>
    <header class='border-b bg-white font-sans min-h-[60px] px-4 py-3 relative tracking-wide z-50'>
        <div class='flex flex-wrap items-center max-lg:gap-y-6'>
            <a href='/' class='hover:text-[#007bff] text-[15px] text-teal-600 block font-extrabold text-lg'>NgekostCuy</a>
            
            <div class="flex-grow flex justify-center items-center max-lg:flex-col">
                <div class="flex items-center">
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
                        <a href='/' class='hover:text-[#007bff] text-[15px] text-teal-600 block font-extrabold text-lg'>NgekostCuy</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-3 flex items-center justify-center'>
                        <a href='javascript:void(0)' class='hover:text-[#007bff] text-[15px] text-gray-700 block font-bold'>Promosikan Kosmu Disini</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-3 flex items-center justify-center'>
                        <a href='/favorit' class='hover:text-[#007bff] text-[15px] text-gray-700 block font-bold'>Favorit</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-3 flex justify-center'>
                        <button class="bg-teal-600 px-5 py-2 rounded">
                            <a href='/login' class='hover:text-[#007bff] text-white font-bold text-[15px] block'>Login</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    
    <section class="image-gallery m-10">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-4">
            <div class="lg:col-span-2">
                <div class="relative">
                    <img class="h-72 w-full object-cover rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8 md:gap-y-8 lg:col-span-3">
                <div>
                    <div class="relative">
                        <img class="h-32 w-full object-cover rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <img class="h-32 w-full object-cover rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <img class="h-32 w-full object-cover rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <img class="h-32 w-full object-cover rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <section class="content flex flex-row justify-between items-start">
        <div class="mx-10 border-b-2 py-3 flex justify-between items-center">
            <div>
                <h2 class="lg:text-2xl md:text-xl sm:text-lg font-semibold">Kost Putra Alghifari Bangau Sakti Panam</h2>
                <div class="flex items-center">
                    <a type="button" class="rounded-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center me-2">Kost Putra</a>
                    <span class="text-sm text-gray-700 underline font-medium">Nusa Ceningan, Indonesia</span>
                </div>

                <h2 class="mt-5 lg:text-2xl md:text-xl sm:text-lg font-semibold">Kost dikelola oleh Habib</h2>
                <span class="text-sm text-gray-700 underline font-medium">5 orang/kamar |</span>
                <span class="text-sm text-gray-700 underline font-medium">5 orang/kamar |</span>
                <span class="text-sm text-gray-700 underline font-medium">5 orang/kamar </span>

            </div>
            
        </div>
    
        <div class="mx-10 py-3 flex justify-between items-center">
            <div class="max-w-sm p-6 bg-white border  rounded-lg shadow">
                <div class="flex flex-row items-center mb-4 pb-3 border-b-2">
                    <div class="flex items-center">
                        <div>
                            <span class="bg-teal-200 text-teal-700 py-1 px-4 rounded-full text-xs inline-block font-semibold">Sisa 7 Kamar</span>
                        </div>
                        <div class="ml-3 flex flex-col justify-center">
                            <span class="text-xs text-gray-700 font-semibold">Terakhir update 27 September 2024</span>
                            <span class="text-xs text-gray-500">Data dapat berubah kapanpun</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <div class="">
                        <p class="mb-3 font-normal text-gray-700">Harga</p>  
                        <p class="mb-3 font-normal text-gray-700">Harga</p>   
                        <p class="mb-3 font-normal text-gray-700">Harga</p>   
                    </div>
                    <div class="">
                        <p class="mb-3 font-normal text-gray-700">Rp. 200.000</p>   
                        <p class="mb-3 font-normal text-gray-700">Rp. 200.000</p>   
                        <p class="mb-3 font-normal text-gray-700">Rp. 200.000</p>   
                    </div>
                </div>

                <p class="underline text-sm textea">lihat harga lainnya</p>
                
                <a href="#" class="w-full inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-teal-600 rounded-full hover:bg-teal-900 focus:ring-4 focus:outline-none focus:ring-blue-300 justify-center">
                    Tanya Pemilik
                    </svg>
                </a>
            </div>
        </div>
        

    </section>
    
    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
   


</script>
</html>
