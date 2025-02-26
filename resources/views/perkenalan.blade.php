@extends('layouts')

@section('style')
    <style>
        /* Background Animation */
        .animated-bg {
            background: linear-gradient(45deg, #fee9e1, #f8e1fd, #e1f1fe);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        /* Animasi Pinguin Muncul - Ditingkatkan */
        @keyframes slideIn {
            0% {
                transform: translateX(100%) rotate(-10deg);
                opacity: 0;
            }

            60% {
                transform: translateX(-10%) rotate(5deg);
            }

            100% {
                transform: translateX(0) rotate(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slideIn 1.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        /* Animasi Bounce untuk Panda - Ditingkatkan */
        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .animate-bounce-custom {
            animation: bounce 3s ease-in-out infinite;
        }

        /* Efek Hover pada Gambar - Ditingkatkan */
        .hover-grow {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .hover-grow:hover {
            transform: scale(1.15) rotate(5deg);
            filter: brightness(1.1);
        }

        /* Efek Hover pada Tombol - Ditingkatkan */
        .hover-button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .hover-button:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .hover-button:hover:before {
            width: 300px;
            height: 300px;
        }

        .hover-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Animasi Text - Ditingkatkan */
        .animate-fade-in {
            animation: fadeIn 1.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-slide-up {
            animation: slideUp 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Speech Bubble Style */
        .speech-bubble {
            position: relative;
            background: #ffffff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .speech-bubble:after {
            content: '';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            border: 15px solid transparent;
            border-bottom-color: #ffffff;
        }

        /* Confetti Animation */
        @keyframes confetti {
            0% {
                transform: translateY(0) rotate(0);
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #ffd700;
            animation: confetti 4s linear infinite;
        }
    </style>
@endsection

@section('content')
    <div class="animated-bg min-h-screen">
        <section id="introduction" class="py-20 bg-gradient-to-br from-[#f1ece3] to-[#f0ede9] relative">
            <div class="container mx-auto px-4">
                <div class="flex flex-col bg-[#f0d8cc]  px-6 rounded-lg shadow-lg items-center text-center relative">
                    <!-- Panda Berbicara -->
                    <div class="mb-12 mt-4 relative" data-aos="fade-up">
                        <div class="relative">
                            <img src="{{ asset('images/panda.png') }}" alt="Panda"
                                class="w-48 sm:w-64 md:w-72 mx-auto drop-shadow-xl animate-bounce-custom hover-grow"
                                style="filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1))">
                        </div>
                        <div class="speech-bubble mt-8 animate-fade-in">
                            <p class="text-xl sm:text-2xl font-semibold text-[#756763]">
                                "Hai Devina! Ketemu lagi nih sama panda. Hari ini ada yang spesial lo, panda mau kenalin
                                seseorang nih sama kamu, coba tebak siapa? 🤭"
                            </p>
                        </div>
                    </div>

                    <!-- Pinguin Muncul -->
                    <div x-data="{ showPenguin: false }" x-init="setTimeout(() => showPenguin = true, 5000)" class="w-full">
                        <div x-show="showPenguin" x-transition:enter="transition ease-out duration-1000"
                            x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
                            class="animate-slide-in">
                            <div class="relative">
                                <img src="{{ asset('images/penguin.png') }}" alt="Pinguin"
                                    class="w-48 sm:w-64 md:w-72 mx-auto drop-shadow-xl hover-grow"
                                    style="filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1))">
                            </div>
                            <div class="speech-bubble mt-8 animate-slide-up">
                                <p class="text-xl sm:text-2xl font-semibold text-[#756763]">
                                    "Halo Devina! Perkenalkan, Aku Pinguin. Aku teman baik Panda! Btw selamat ulang tahun yaaa 🐧✨"
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Navigasi -->
                    <div x-data="{ showButton: false }" x-init="setTimeout(() => showButton = true, 8000)" class="w-flex justify-center gap-6 mt-10">
                        <div x-show="showButton" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
                            class="mt-12 mb-8 flex gap-4 justify-center">
                            <a href="{{ route('music') }}"
                                class="hover-button bg-gradient-to-l from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali
                            </a>
                            <a href="{{ route('ucapan') }}"
                                class="hover-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                                Lanjutkan
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Confetti Elements -->
            <div class="confetti-container"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden;">
                @for ($i = 0; $i < 50; $i++)
                    <div class="confetti"
                        style="left: {{ rand(0, 100) }}%; 
                            animation-delay: -{{ rand(0, 4000) / 1000 }}s; 
                            background: {{ ['#ffd700', '#ff69b4', '#7fffd4', '#ff69b4'][rand(0, 3)] }};">
                    </div>
                @endfor
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            // Tambahan untuk smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    @endpush
@endsection
