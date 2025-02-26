@extends('layouts')

@section('styles')
    <style>
        /* Animasi bounce */
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        /* Gradient background */
        .birthday-gradient {
            background: linear-gradient(180deg, #fffafd 0%, #f5f3ff 100%);
        }

        /* Transisi untuk gambar */
        .gallery-card {
            transition: all 0.3s ease;
        }

        .gallery-card:hover {
            transform: scale(1.02);
        }

        /* Overlay gradien untuk text */
        .image-overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .image-overlay {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-[#f1ece3] to-[#f0ede9]">
        {{-- Header Section --}}
        <div class="py-8 px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-[#756763] mb-2">
                Devina's Gallery
            </h1>
            <p class="text-lg font-semibold text-[#756763] max-w-md mx-auto">
                Selanjutnya kita akan melihat apapun itu asal tentang Devina
            </p>
        </div>

        {{-- Gallery Grid --}}
        <div class="container mx-auto px-4 pb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($images as $image)
                    <div class="gallery-card relative overflow-hidden rounded-xl shadow-md bg-white">
                        <div class="aspect-[3/4] relative overflow-hidden">
                            <img src="{{ asset($image['src']) }}" alt="Birthday Memory {{ $image['id'] }}"
                                class="w-full h-full object-cover object-center transition-transform duration-500">
                            <div class="image-overlay absolute inset-0">
                                <div class="absolute bottom-0 left-0 right-0 p-4 text-[#f2eade]">
                                    <p class="text-sm font-medium">{{ $image['message'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center gap-6 mt-10">
                <a href="{{ route('ucapan') }}"
                    class="hover-button bg-gradient-to-l from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('pesan') }}"
                    class="hover-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    Lanjutkan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
