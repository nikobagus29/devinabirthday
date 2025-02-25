@extends('layouts')

@section('style')

@endsection

@section('content')
    <section class="min-h-screen bg-gradient-to-br from-gray-50 to-white flex items-center justify-center p-6">
        <div class="bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl max-w-2xl w-full p-8 sm:p-12 relative overflow-hidden">

            <!-- Judul -->
            <h2 class="text-4xl font-bold text-center text-gray-700 mb-8" data-aos="fade-up">
                Sekian
            </h2>

            <!-- Pesan Penutup -->
            <div class="bg-gradient-to-br from-gray-100 to-gray-50 p-8 rounded-2xl border-l-8 border-gray-400 shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="space-y-6">
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Terima kasih sudah meluangkan waktu untuk membaca pesan ini.
                    </p>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Apapun yang terjadi, aku selalu berharap yang terbaik untukmu. Semoga kamu selalu bahagia, sehat, dan sukses dalam mengejar mimpimu.
                    </p>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Sampai jumpa di lain waktu.
                    </p>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        Once Again Happy Birthday, Devina Magareta.
                    </p>
                </div>
            </div>

            <!-- Tombol Kembali -->
            <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('home') }}" class="bg-gray-500 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-gray-600 transition-transform transform hover:scale-105">
                    🏠 Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Inisialisasi AOS
        AOS.init({
            duration: 1000, // Durasi animasi
            once: true, // Animasi hanya sekali
        });

        // Animasi untuk ikon hati
        const heartIcons = document.querySelectorAll('.animate-float');
        heartIcons.forEach((icon, index) => {
            icon.style.animationDelay = `${index * 0.5}s`;
        });
    </script>
@endsection