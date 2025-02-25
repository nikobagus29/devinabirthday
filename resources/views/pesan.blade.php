@extends('layouts')

@section('style')
@endsection

@section('content')
    <section class="py-12 md:py-20 bg-gradient-to-b from-gray-100 to-white" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <!-- Judul -->
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-8 md:mb-12" data-aos="fade-up">Message</h2>

            <!-- Konten -->
            <div class="flex flex-col md:flex-row items-center">
                <!-- Gambar -->
                <div class="w-full md:w-1/2 mb-8 md:mb-0" data-aos="fade-right">
                    <img src="{{ asset('images/p5.PNG') }}" alt="Birthday Panda"
                        class="w-full max-w-md mx-auto rounded-lg shadow-2xl transform transition-transform duration-500 hover:scale-105"
                        data-speed="0.3">
                </div>

                <!-- Pesan -->
                <div class="w-full md:w-1/2 md:pl-8 px-4" data-aos="fade-left">
                    <p class="text-gray-700 text-md md:text-lg leading-relaxed">
                        "Panda" mungkin ga punya banyak pesan yang ingin disampaikan, karena tentangmu masih banyak yang
                        belum "Panda" tau. Yang pasti kamu harus tetap menjadi orang baik dan jauh lebih baik yaa, tetap
                        jadi dirimu sendiri. Suatu saat nanti "Panda" ingin lebih mengenalmu dan melihat jauh lebih banyak hal
                        tentangmu. Semoga waktu dan kesempatan itu memang ada yaa. Mungkin udah itu aja, silahkan lanjut.
                    </p>
                </div>
            </div>

            <!-- Tombol Navigasi -->
            <div class="flex flex-row justify-center gap-4 md:gap-6 mt-10 md:mt-10">
                <a href="{{ route('gallery') }}"
                    class="hover-button bg-gradient-to-r from-gray-800 to-gray-600 text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('selamat') }}"
                    class="hover-button bg-gradient-to-r from-slate-600 to-slate-800 text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    Lanjutkan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Modal Verifikasi -->
    <div id="verificationModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg p-6 max-w-md w-full">
            <h3 class="text-xl font-bold mb-4">Verifikasi</h3>
            <span class="text-sm font-normal">Mohon masukkan kata kunci bahwa kamu memang Devina.</span> <br>
            <span class="text-sm font-normal">Jika kamu bukan Devina langsung klik tombol lanjut.</span>
            <form id="verificationForm">
                <div class="mb-4 mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Masukkan Kata Kunci:</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500">
                </div>
                <div class="flex justify-end gap-3">
                    <button onclick="redirectToSelamat()" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-transform transform hover:scale-105">
                        Lanjutkan ke Ucapan
                    </button>
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Verifikasi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Error -->
    <div id="errorModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg p-6 max-w-md w-full text-center">
            <!-- Gambar Ilustrasi -->
            <img src="{{ asset('images/p7.png') }}" alt="Error Illustration" class="w-32 h-32 mx-auto mb-4">
    
            <!-- Judul -->
            <h3 class="text-xl font-bold mb-2 text-red-600">Oops!</h3>
    
            <!-- Pesan Kesalahan -->
            <p class="text-gray-700 mb-4">Kata kunci salah! Kamu bukan Devina? <br> Klik tombol di bawah ini untuk memberikan ucapan spesial kepada Devina</p>
    
            <!-- Tombol -->
            <div class="flex justify-center">
                <button onclick="redirectToSelamat()" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition-transform transform hover:scale-105">
                    Lanjutkan ke Ucapan
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    // Buka modal verifikasi
    document.querySelector('.hover-button[href="{{ route("selamat") }}"]').addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah redirect
        document.getElementById('verificationModal').classList.remove('hidden');
    });

    // Tutup modal verifikasi
    function closeModal() {
        document.getElementById('verificationModal').classList.add('hidden');
    }

    // Handle form verifikasi
    document.getElementById('verificationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const password = document.getElementById('password').value;

        // Contoh kata kunci: "Devina"
        if (password === "simanis") {
            // Set session untuk Devina
            fetch("{{ route('set.session') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ is_birthday_user: true })
            }).then(() => {
                window.location.href = "{{ route('selamat') }}"; // Redirect ke halaman selamat
            });
        } else {
            // Tampilkan modal error
            document.getElementById('verificationModal').classList.add('hidden'); // Tutup modal verifikasi
            document.getElementById('errorModal').classList.remove('hidden'); // Buka modal error
        }
    });

    // Redirect ke halaman selamat dengan is_birthday_user = false
    function redirectToSelamat() {
        fetch("{{ route('set.session') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ is_birthday_user: false })
        }).then(() => {
            window.location.href = "{{ route('selamat') }}"; // Redirect ke halaman selamat
        });
    }
</script>
@endsection