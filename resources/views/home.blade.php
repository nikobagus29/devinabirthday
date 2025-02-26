@extends('layouts')

@section('style')
<style>
    /* Animated Background */
    .birthday-bg {
        background: linear-gradient(-45deg, #ffecf2, #fff5f5, #f0f7ff, #fff0f7);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
    }
    @keyframes gradientBG {
        0% { background-position: 0% 50% }
        50% { background-position: 100% 50% }
        100% { background-position: 0% 50% }
    }

    /* Enhanced Panda Animation */
    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }
        25% {
            transform: translateY(-15px) rotate(2deg);
        }
        75% {
            transform: translateY(-25px) rotate(-2deg);
        }
    }
    .float-panda {
        animation: float 4s ease-in-out infinite;
        filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.15));
    }

    /* Sparkle Effect */
    .sparkle {
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: #FFD700;
        animation: sparkle 2s ease-in-out infinite;
    }
    @keyframes sparkle {
        0%, 100% { transform: scale(0); opacity: 0; }
        50% { transform: scale(1); opacity: 1; }
    }

    /* Text Gradient Animation */
    .text-gradient {
        background: linear-gradient(45deg, #FF69B4, #4B0082);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% auto;
        animation: textGradient 4s linear infinite;
    }
    @keyframes textGradient {
        to { background-position: 200% center; }
    }

    /* Button Animation */
    .animate-button {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .animate-button::after {
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
    .animate-button:hover::after {
        width: 300px;
        height: 300px;
    }
    .animate-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection

@section('content')
<div class="birthday-bg min-h-screen">
    <!-- Section 1: Hero Section -->
    <section id="home" class="pt-12 relative overflow-hidden bg-gradient-to-br from-[#f1ece3] to-[#f0ede9]">
        <!-- Sparkles -->
        @for($i = 0; $i < 20; $i++)
            <div class="sparkle" style="left: {{ rand(0, 100) }}%; top: {{ rand(0, 100) }}%; animation-delay: -{{ rand(0, 2000)/1000 }}s;"></div>
        @endfor

        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center">
                <!-- Text Content -->
                <div class="w-full lg:w-1/2 self-center px-4" data-aos="fade-right">
                    <div class="space-y-6">
                        <h1 class="text-xl lg:text-2xl font-bold text-[#756763] animate__animated animate__bounceIn">
                            Halo Devinaaa 👋
                            <span class="block text-3xl lg:text-5xl mt-2 text-[#756763] font-extrabold">
                                Selamat Ulang Tahun Yaaaa
                            </span>
                        </h1>
                        
                        <h2 class="text-xl lg:text-2xl font-bold text-[#756763] animate__animated animate__fadeIn animate__delay-1s">
                            Happy Eighteen ✨
                        </h2>
                        
                        <div class="bg-gradient-to-br from-[#f0e6d7] to-[#f0e8db] backdrop-blur-sm rounded-xl p-6 shadow-lg animate__animated animate__fadeIn animate__delay-2s">
                            <p class="text-md lg:text-lg text-[#756763] leading-relaxed">
                                Di hari yang spesial ini, "Panda" punya sesuatu yang spesial juga lo buat kamu.
                                <br>Dibaca sampai akhir yaaa
                            </p>
                        </div>
                        
                        <h2 class="text-lg lg:text-xl font-bold text-[#756763] animate__animated animate__fadeIn animate__delay-3s">
                            Enjoy the trip, Let's Go!!! 🎉
                        </h2>
                    </div>
                </div>

                <!-- Panda Image -->
                <div class="w-full lg:w-1/2 self-end px-4 mt-10 lg:mt-0">
                    <div class="relative" data-aos="zoom-in">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-pink-100/30 rounded-3xl"></div>
                        <img 
                            src="{{asset('images/panda.png')}}" 
                            alt="Birthday Panda" 
                            class="max-w-full mx-auto float-panda relative z-10"
                        >
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Button -->
        <div x-data="{ showButton: false }" 
             x-init="setTimeout(() => showButton = true, 3500)" 
             class="mt-12 mb-8">
            <div class="flex justify-center">
                <a href="{{ route('music') }}"
                   x-show="showButton"
                   x-transition:enter="transition ease-out duration-500 transform"
                   x-transition:enter-start="opacity-0 scale-75"
                   x-transition:enter-end="opacity-100 scale-100"
                   class="animate-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-10 py-4 rounded-full shadow-lg text-lg font-semibold flex items-center gap-3">
                    <span>Mulai Perjalanan</span>
                    <span class="text-2xl">🚀</span>
                </a>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush
@endsection