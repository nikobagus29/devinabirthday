@extends('layouts')

@section('style')
@endsection

@section('content')
    <section class="py-12 md:py-20 bg-gradient-to-b from-[#f1ece3] via-[#f0ede9] to-white" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <!-- Judul -->
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#756763] mb-8 md:mb-12" data-aos="fade-up">Message</h2>

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
                    <p class="text-[#756763] font-medium text-md md:text-lg leading-relaxed">
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
                    class="hover-button bg-gradient-to-l from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('selamat') }}"
                    class="hover-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    Lanjutkan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Modal Verifikasi -->
    <div id="verificationModal" class="hidden fixed inset-0 bg-[#756763] bg-opacity-75 flex items-center justify-center p-4">
        <div class="bg-[#f2eade] rounded-lg p-6 max-w-md w-full">
            <h3 class="text-xl font-bold mb-4 text-[#756763]">Verifikasi</h3>
            <span class="text-sm font-normal text-[#756763]">Mohon masukkan kata kunci bahwa kamu memang Devina.</span> <br>
            <span class="text-sm font-normal text-[#756763]">Jika kamu bukan Devina langsung klik tombol lanjut.</span>
            <form id="verificationForm">
                <div class="mb-4 mt-4">
                    <label for="password" class="block text-sm font-medium text-[#756763]">Masukkan Kata Kunci:</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-[#756763] text-[#756763] rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#86746f] bg-[#f2eade]">
                </div>
                <div class="flex justify-end gap-3">
                    <button onclick="redirectToSelamat()" class="bg-[#756763] text-white px-6 py-2 rounded-md hover:bg-[#86746f] transition-transform transform hover:scale-105">
                        Lanjutkan ke Ucapan
                    </button>
                    <button type="submit" class="bg-[#756763] text-white px-4 py-2 rounded-md hover:bg-[#86746f] transition-transform transform hover:scale-105">Verifikasi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Error -->
    <div id="errorModal" class="hidden fixed inset-0 bg-[#756763] bg-opacity-75 flex items-center justify-center p-4">
        <div class="bg-[#f2eade] rounded-lg p-6 max-w-md w-full text-center">
            <!-- Gambar Ilustrasi -->
            <img src="{{ asset('images/p7.png') }}" alt="Error Illustration" class="w-32 h-32 mx-auto mb-4">
    
            <!-- Judul -->
            <h3 class="text-xl font-bold mb-2 text-border-[#756763]">Oops!</h3>
    
            <!-- Pesan Kesalahan -->
            <p class="text-border-[#756763] mb-4">Kata kunci salah! Kamu bukan Devina? <br> Klik tombol di bawah ini untuk memberikan ucapan spesial kepada Devina</p>
    
            <!-- Tombol -->
            <div class="flex justify-center">
                <button onclick="redirectToSelamat()" class="bg-[#756763] text-white px-6 py-2 rounded-md hover:bg-[#86746f] transition-transform transform hover:scale-105">
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