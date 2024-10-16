<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<body>
    <header class="py-5"><span class=" text-teal-600 font-bold text-2xl ml-10 my-10">KostCuy</span> </header>
    <main class="flex">
    <aside class="pt-4">
        <ul>
            <li class="pb-2.5 "><a class="bg-gray-800 rounded-r-full text-white flex gap-6 pl-10 pr-20 py-2.5" href=""><x-ionicon-home-outline class="w-7"/>Home</a></li>
            <li class=""><a class="flex gap-6 pl-10 pr-20 py-2.5 text-red-600" href=""><x-heroicon-o-arrow-right-start-on-rectangle class="w-7 [stroke-width:1.5]"/>Keluar</a></li>
        </ul> 
    </aside>
    <div class="bg-gray-50 ">
        <div class="py-8 px-10">
            <div class="flex border-b mb-8">
                <div class="mr-28 pb-9">
                    <p class="mb-5 font-medium">Data Kost</p>
                    <Button class="text-sm border-teal-600 bg-teal-600 text-white border-2 rounded py-1.5 px-8">Tambah Data Kost</Button>
                </div>
                <div class=" pl-8 border-l pb-9">
                    <p class="mb-5 font-medium">Pusat Bantuan</p>
                    <Button class="text-sm border-teal-600 text-teal-600 rounded border-2 py-1.5 px-14">Chat CS</Button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="flex justify-between flex-col bg-gray-50/5 shadow-lg border rounded-md p-4">
                    <div class="flex gap-5 mb-4">
                        <div class="basis-2/3 ">
                            <p class="text-teal-600 font-semibold mb-3">Kost Putra</p>
                            <p class="font-semibold mb-2">kost Alghifari Jalan Bangau Sakti Kampung Baru</p>
                            <p class="text-xs">Jl. Sosrowijayan No.76, Sosromenduran, Gedong Tengen</p>
                        </div>
                        <div class=""><img src="/img/kost_1.jpg" class="object-cover h-24 md:h-16" alt=""></div>
                    </div>
                    <div class="flex gap-4">
                        <button class="basis-1/2 border-gray-900/50 text-gray-900/90 rounded border py-1.5">Hapus Kost</button>
                        <button class="basis-1/2 border-teal-600 text-teal-600 rounded border py-1.5">Edit Kost</button>
                    </div>
                </div>
                <div class="flex justify-between flex-col bg-gray-50/5 shadow-lg border rounded-md p-4">
                    <div class="flex gap-5 mb-4">
                        <div class="basis-2/3 ">
                            <p class="text-teal-600 font-semibold mb-3">Kost Putra</p>
                            <p class="font-semibold mb-2">kost Alghifari Jalan Bangau Sakti Kampung Baru</p>
                            <p class="text-xs">Jl. Sosrowijayan No.76, Sosromenduran, Gedong Tengen</p>
                        </div>
                        <div class=""><img src="/img/kost_1.jpg" class="object-cover h-24 md:h-16" alt=""></div>
                    </div>
                    <div class="flex gap-4">
                        <button class="basis-1/2 border-gray-900/50 text-gray-900/90 rounded border py-1.5">Hapus Kost</button>
                        <button class="basis-1/2 border-teal-600 text-teal-600 rounded border py-1.5">Edit Kost</button>
                    </div>
                </div>
                <div class="flex justify-between flex-col bg-gray-50/5 shadow-lg border rounded-md p-4">
                    <div class="flex gap-5 mb-4">
                        <div class="basis-2/3 ">
                            <p class="text-teal-600 font-semibold mb-3">Kost Putra</p>
                            <p class="font-semibold mb-2">kost Alghifari Jalan Bangau Sakti Kampung Baru</p>
                            <p class="text-xs">Jl. Sosrowijayan No.76, Sosromenduran, Gedong Tengen</p>
                        </div>
                        <div class=""><img src="/img/kost_1.jpg" class="object-cover h-24 md:h-16" alt=""></div>
                    </div>
                    <div class="flex gap-4">
                        <button class="basis-1/2 border-gray-900/50 text-gray-900/90 rounded border py-1.5">Hapus Kost</button>
                        <button class="basis-1/2 border-teal-600 text-teal-600 rounded border py-1.5">Edit Kost</button>
                    </div>
                </div>
                <div class="flex justify-between flex-col bg-gray-50/5 shadow-lg border rounded-md p-4">
                    <div class="flex gap-5 mb-4">
                        <div class="basis-2/3 ">
                            <p class="text-teal-600 font-semibold mb-3">Kost Putra</p>
                            <p class="font-semibold mb-2">kost Alghifari Jalan Bangau Sakti Kampung Baru</p>
                            <p class="text-xs">Jl. Sosrowijayan No.76, Sosromenduran, Gedong Tengen</p>
                        </div>
                        <div class=""><img src="/img/kost_1.jpg" class="object-cover h-24 md:h-16" alt=""></div>
                    </div>
                    <div class="flex gap-4">
                        <button class="basis-1/2 border-gray-900/50 text-gray-900/90 rounded border py-1.5">Hapus Kost</button>
                        <button class="basis-1/2 border-teal-600 text-teal-600 rounded border py-1.5">Edit Kost</button>
                    </div>
                </div>
                <div class="flex justify-between flex-col bg-gray-50/5 shadow-lg border rounded-md p-4">
                    <div class="flex gap-5 mb-4">
                        <div class="basis-2/3 ">
                            <p class="text-teal-600 font-semibold mb-3">Kost Putra</p>
                            <p class="font-semibold mb-2">kost Alghifari Jalan Bangau Sakti Kampung Baru</p>
                            <p class="text-xs">Jl. Sosrowijayan No.76, Sosromenduran, Gedong Tengen</p>
                        </div>
                        <div class=""><img src="/img/kost_1.jpg" class="object-cover h-24 md:h-16" alt=""></div>
                    </div>
                    <div class="flex gap-4">
                        <button class="basis-1/2 border-gray-900/50 text-gray-900/90 rounded border py-1.5">Hapus Kost</button>
                        <button class="basis-1/2 border-teal-600 text-teal-600 rounded border py-1.5">Edit Kost</button>
                    </div>
                </div>
                <div class="flex justify-between flex-col bg-gray-50/5 shadow-lg border rounded-md p-4">
                    <div class="flex gap-5 mb-4">
                        <div class="basis-2/3 ">
                            <p class="text-teal-600 font-semibold mb-3">Kost Putra</p>
                            <p class="font-semibold mb-2">kost Alghifari Jalan Bangau Sakti Kampung Baru</p>
                            <p class="text-xs">Jl. Sosrowijayan No.76, Sosromenduran, Gedong Tengen</p>
                        </div>
                        <div class=""><img src="/img/kost_1.jpg" class="object-cover h-24 md:h-16" alt=""></div>
                    </div>
                    <div class="flex gap-4">
                        <button class="basis-1/2 border-gray-900/50 text-gray-900/90 rounded border py-1.5">Hapus Kost</button>
                        <button class="basis-1/2 border-teal-600 text-teal-600 rounded border py-1.5">Edit Kost</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    </main>
</body>
</html>