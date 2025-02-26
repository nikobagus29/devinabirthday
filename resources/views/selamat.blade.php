@extends('layouts')

@section('style')
    <style>
        .message-card {
            transition: all 0.3s ease;
        }

        .message-card:hover {
            transform: translateY(-2px);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #fdf2f8 0%, #fff 100%);
        }

        .reply-bubble {
            position: relative;
        }

        .reply-bubble::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 15px;
            border-width: 8px;
            border-style: solid;
            border-color: transparent #fdf2f8 transparent transparent;
        }

        @media (max-width: 768px) {
            .message-card:hover {
                transform: none;
            }
        }
    </style>
@endsection

@section('content')
    <section class="py-4 bg-gradient-to-b from-[#f1ece3] via-[#f0ede9] to-white min-h-screen">
        <!-- Top Spacing for Mobile -->
        <div class="h-6 mt-8"></div>

        <div class="container mx-auto px-4 sm:px-6">
            <!-- Header Section with Better Mobile Spacing -->
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#756763] mb-3">
                    Ucapan spesial untuk Devina
                </h2>
                <div class="w-16 sm:w-24 h-1 bg-[#756763] mx-auto rounded-full mb-6"></div>
            </div>

            <!-- Messages Grid with Improved Mobile Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 mb-4">
                @foreach ($messages as $message)
                    <div class="message-card bg-[#ffe3c7] rounded-xl shadow-sm border border-white overflow-hidden">
                        <!-- Card Header with Better Mobile Padding -->
                        <div class="p-4 sm:p-6">
                            <!-- Sender Info with Improved Layout -->
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center flex-shrink-0">
                                    <span class="text-[#756763] font-bold text-lg">
                                        {{ substr($message->nama_pengirim, 0, 1) }}
                                    </span>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="font-semibold text-[#756763] text-lg sm:text-base">
                                        {{ $message->nama_pengirim }}
                                    </p>
                                    <p class="text-xs text-[#756763]">
                                        {{ $message->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>

                            <!-- Message Content with Better Spacing -->
                            <div class="space-y-4 p-4">
                                <div class="text-[#756763] text-lg sm:text-lg leading-relaxed">
                                    {{ $message->pesan }}
                                </div>

                                @if ($message->balasan)
                                    <div class="mt-6 relative">
                                        <!-- Vertical Line Connector -->
                                        <div class="absolute left-5 -top-4 w-0.5 h-4 bg-[#ffe3c7]"></div>

                                        <div class="ml-8 reply-bubble">
                                            <div
                                                class="bg-gradient-to-br from-[#f2eade] to-[#ece7df] p-5 rounded-2xl shadow-sm">
                                                <!-- Reply Icon - Made Larger -->
                                                <div class="flex flex-col gap-4 mb-3 p-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-[#756763] mr-2" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="15 10 20 15 15 20"></polyline>
                                                        <path d="M4 4v7a4 4 0 0 0 4 4h12"></path>
                                                    </svg>
                                                    <span class="text-sm text-[#756763] font-bold">Balasan</span>

                                                    <!-- Reply Content -->
                                                    <p class="text-[#756763] text-lg sm:text-lg leading-relaxed mb-3">
                                                        {{ $message->balasan }}
                                                    </p>

                                                    <!-- Reply Footer with Larger Avatar -->
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center">
                                                            <div
                                                                class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center border-2 border-white">
                                                                <span class="text-[#756763] text-base font-semibold">D</span>
                                                            </div>
                                                            <div class="ml-3">
                                                                <p class="text-sm font-medium text-[#756763]">Devina</p>
                                                                <p class="text-xs text-[#756763]">
                                                                    {{ $message->updated_at->diffForHumans() }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Updated Reply Form with Larger Icons -->
                                @if (session('is_birthday_user') && !$message->balasan)
                                    <div class="mt-6 pt-4 border-t border-gray-100">
                                        <form action="{{ route('reply.message', $message->id) }}" method="POST">
                                            @csrf
                                            <div class="flex items-start space-x-4">
                                                <div class="flex-1">
                                                    <textarea name="reply" placeholder="Tulis balasan..."
                                                        class="w-full p-4 mb-4 text-sm sm:text-base border border-[#756763] rounded-xl focus:ring-2 focus:ring-[#756763] focus:border-transparent resize-none bg-[#f2eade]"
                                                        rows="2" required></textarea>
                                                    <div class="mt-3 flex justify-end">
                                                        <button type="submit"
                                                            class="bg-[#756763] text-white p-4 rounded-full hover:bg-gray-600 transition-colors duration-200 text-sm font-medium flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <line x1="22" y1="2" x2="11"
                                                                    y2="13"></line>
                                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                                            </svg>
                                                            Kirim Balasan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Message Form with Mobile-First Design -->
            @if (!session('is_birthday_user'))
                <div class="mt-8 sm:mt-12 mb-8">
                    <form action="{{ route('send.message') }}" method="POST"
                        class="bg-[#f2eade] rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6 md:p-8 max-w-2xl mx-auto">
                        @csrf
                        <h3 class="text-xl sm:text-2xl font-semibold text-[#756763] mb-6">
                            Kirim Ucapan
                        </h3>

                        <div class="space-y-4 sm:space-y-6">
                            <div class="mb-4">
                                <label for="nama_pengirim" class="block text-sm font-medium text-[#756763] mb-2 sm:mb-2">
                                    Nama Pengirim
                                </label>
                                <input type="text" name="nama_pengirim" id="nama_pengirim"
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-[#756763] text-[#756763] rounded-md shadow-sm focus:ring-2 focus:ring-[#86746f] bg-[#f2eade] focus:border-transparent"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="block text-sm font-medium text-[#756763] mb-2 sm:mb-2">
                                    Ucapan
                                </label>
                                <textarea name="message" id="message" placeholder="Tulis ucapan untuk Devina..."
                                    class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-[#756763] text-[#756763] rounded-md shadow-sm focus:ring-2 focus:ring-[#86746f] bg-[#f2eade] focus:border-transparent resize-none"
                                    rows="4" required></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-[#756763] text-white py-3 rounded-lg hover:bg-[#86746f] transition-colors duration-200 font-medium text-sm sm:text-base">
                                Kirim Ucapan
                            </button>
                        </div>
                    </form>
                </div>
            @endif

            <div class="flex justify-center gap-6 mt-10 mb-8">
                <a href="{{ route('pesan') }}"
                    class="hover-button bg-gradient-to-l from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                @if (session('is_birthday_user'))
                    <a href="{{ route('confess') }}"
                        class="hover-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                        Lanjutkan
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('end') }}"
                        class="hover-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                        Lanjutkan
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @endif
            </div>
    </section>
@endsection

@section('script')
    <script>
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Disable hover effects on touch devices
        if ('ontouchstart' in window) {
            document.querySelectorAll('.message-card').forEach(card => {
                card.style.transform = 'none';
            });
        }
    </script>

    <script>
        // Notifikasi SweetAlert2 dengan Animasi
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                showClass: {
                    popup: 'animate__animated animate__bounceIn' // Animasi muncul (bounce)
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp' // Animasi hilang
                },
                confirmButtonColor: '#EC4899', // Warna tombol pink
                timer: 3000, // Notifikasi hilang setelah 3 detik
                timerProgressBar: true,
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showClass: {
                    popup: 'animate__animated animate__shakeX' // Animasi muncul (goyang)
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp' // Animasi hilang
                },
                confirmButtonColor: '#EC4899', // Warna tombol pink
            });
        @endif
    </script>
@endsection
