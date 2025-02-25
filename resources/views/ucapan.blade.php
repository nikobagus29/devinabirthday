@extends('layouts')

@section('style')
    <style>
        /* Animasi Umum */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Efek Animasi */
        .animate-fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        .animate-slide-up {
            animation: slideUp 1s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Efek Hover pada Gambar */
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection

@section('content')
    <section id="wishes" class="py-20 bg-gradient-to-b from-gray-100 via-gray-50 to-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12 animate-fade-in">Special Cake 🎂</h2>
            <div class="grid md:grid-cols-2 gap-10">
                <!-- Kolom Pertama -->
                <div class="bg-white p-8 rounded-xl shadow-lg animate-slide-up">
                    <p class="text-gray-700 mb-6 animate-fade-in text-lg leading-relaxed">
                        Hari ini "Panda" bawa kue spesial lo buat kamu. Sebelum kamu meniup lilinnya, pejamkan mata sebentar
                        dan sebutkan semua hal yang kamu inginkan yaa. 
                        <br>Sudah? Okeyy lanjuttt 🎈
                    </p>
                    <img src="{{ asset('images/p1.PNG') }}" alt="Birthday cake"
                        class="w-full h-96 object-cover rounded-lg hover-scale animate-float">
                </div>

                <!-- Kolom Kedua -->
                <div class="flex flex-col items-center justify-center bg-white p-8 rounded-xl shadow-lg animate-slide-up">
                    <img src="{{ asset('images/p4.png') }}" alt="Birthday balloons"
                        class="w-80 h-80 object-cover rounded-lg mb-6 hover-scale animate-float">
                    <p class="text-gray-700 text-center animate-fade-in text-lg leading-relaxed">
                        Semoga apapun yang kamu sebutkan tadi segera terwujud yaaa. Btw "Pinguin" juga bawa hadiah kecil
                        lo buat kamu. Penasaran ga apa isinya? 🎁
                    </p>
                </div>
            </div>

            <!-- Container untuk Tombol -->
            <div class="flex flex-row justify-center gap-4 md:gap-6 mt-8 md:mt-10">
                <a href="{{ route('perkenalan') }}"
                    class="hover-button bg-gradient-to-r from-gray-800 to-gray-600 text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('gallery') }}"
                    class="hover-button bg-gradient-to-r from-slate-600 to-slate-800 text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    Lanjutkan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
