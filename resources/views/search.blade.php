<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Halaman Search</title>
</head>
<body>

    <x-header_main />

    <div class="gap-5 m-5">
        @if($kosts->isEmpty())
            <p>Tidak ada hasil yang ditemukan untuk: {{ $query }}</p>
        @else
        
        @foreach($kosts as $kost)
        <div class="block">
            <p>Hasil yang ditemukan untuk: {{ $query }}</p>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow m-2">
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
        </div>
         @endforeach
        @endif
    </div>
    
</body>
</html>