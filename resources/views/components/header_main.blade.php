<!-- resources/views/components/header.blade.php -->
<header class='border-b bg-white font-sans min-h-[60px] px-4 py-3 mx-5 relative tracking-wide z-50'>
    <div class='flex flex-wrap items-center max-lg:gap-y-6'>
        <a href='/' class='hover:text-[#007bff] text-sm md:text-xl text-teal-600 block font-extrabold'>NgekostCuy</a>
        
        <div class="flex-grow flex justify-center items-center max-lg:flex-col">
            <div class="flex items-center hidden md:flex">
                <form action="/search" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Search..." class="border rounded-md px-4 py-2 w-full max-w-[250px]" />
                    <button type="submit" class="ml-2 bg-teal-600 text-white px-4 py-2 rounded-md">Search</button>
                </form>
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

                @auth
                    @if(auth()->user()->role == 'owner')
                        <li class='max-lg:border-b max-lg:py-3 flex justify-center'>
                            <button class="bg-teal-600 px-5 py-2 rounded">
                                <a href='/dashboard/owner' class='hover:text-[#007bff] text-white font-bold text-[15px] block'>Promosikan Kost Anda</a>
                            </button>
                        </li>
                    @endif
                @endauth
                
                @auth
                    <li class='max-lg:border-b max-lg:py-3 flex justify-center'>
                        <button class="bg-teal-600 px-5 py-2 rounded">
                            <a href='/logout' class='hover:text-[#007bff] text-white font-bold text-[15px] block'>Logout</a>
                        </button>
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