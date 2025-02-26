@extends('layouts')

@section('style')
@endsection

@section('content')
    <section class="min-h-screen bg-gradient-to-b from-[#f1ece3] to-[#f0ede9] flex items-center justify-center p-6">
        <div
            class="bg-[#ebd5c7] backdrop-blur-lg rounded-3xl shadow-2xl max-w-2xl w-full p-8 sm:p-12 relative overflow-hidden">
            <!-- Judul -->
            <h2 class="text-4xl font-bold text-center text-[#756763] mb-8" data-aos="fade-up">
                Personal Message
            </h2>

            <!-- Pesan Confess -->
            <div class="bg-gradient-to-b from-[#f2eade] to-[#ece7df] p-8 rounded-2xl border-l-8 border-[#756763] shadow-lg"
                data-aos="fade-up" data-aos-delay="100">
                <div class="space-y-6">
                    <p class="text-[#756763] font-normal text-base leading-relaxed">
                        Hai Dev, Ono sesuatu sing pingin tak sampaikan. Sebelum e sorry ya mungkin bahasa ku bakal campur
                        aduk, semoga kamu paham yaa. Mungkin nek kamu eleng setaun lalu pas aku ngekek i ucapan ulang tahun
                        kamu sempet takon ngene kan, "maksud e opo?". Nah mungkin iki waktu sing pas gawe aku njawab
                        pertanyaan iku. Mungkin kamu ya wes ngerti se dev nek aku seneng awmu ya. Nah ng kene aku mek pingin sekedar
                        ngomong tok, aku ga pingin lebih entah apapun iku soale ya koyok e ga memungkinkan
                        gawe saiki. Dadi saiki aku ngomong ngene sebatas cek lego ae. Opo maneh mariki wes lulus kan, aku ga pingin nyesel ae se sebener e.
                    </p>
                    <p class="text-[#756763] font-normal text-base leading-relaxed">
                        Nah gawe saiki aku terserah se dev yoopo ae aku ga masalah, kene iso koncoan alhamdulillah tapi nek ga ya gapapa, tak
                        kembalikan ng kamu ae. Mungkin aku ga bakal inisiatif ngechat atau apapun iku ya, tapi sng pasti aku
                        bakal welcome banget gawe kamu dalam keadaan apapun.
                    </p>
                    <p class="text-[#756763] font-normal text-base leading-relaxed">
                        Nah gawe kedepan e, jujur aku gatau dan aku ya ga yakin. Tapi mungkin sng pasti kene iso fokus gawe
                        masa depan masing-masing. Kamu bebas ngelakoni opo ae sng sesuai keinginanmu dan isi hatimu. Kejar
                        cita-cita, hobi, dan semuanya selama kamu bahagia dan nyaman. Aku percoyo kok dev seandaine jodoh pasti ono dalan e haha.
                        Aku yo ngerti nek keadaan saiki ga memungkinkan ancene, dadi ya belom waktunya aja. Gawe jauh
                        kedepan seandaine perasaan ku jek podo dan kamu ya belom ada pasangan mungkin aku bakal nyobak gawe
                        ngejar. Tapi ya semua tergantung nanti, aku ya gaiso nggawe pasti, semua tergantung
                        waktu dan keadaan.
                    </p>
                    <p class="text-[#756763] font-normal text-base leading-relaxed">
                        Mungkin ngunu ae se dev, makasiii bangettt wes gelem moco sampe kene. Gausa terlalu dipikirno,
                        kabeh iki aku mek pingin ngomong tok kok, aku ya ga njamin semua sng tak sampekno bakal kejadian.
                        Intine yaa fokus dirimu sendiri, keluarga dan masa depan. Yoopo ae ngkok ending e aku percoyo iku
                        sng terbaik kok, gawe kamu dan gawe aku. Koyok e cukup deh gawe saiki, mungkin kita bahas lebih
                        banyak kalau ada kesempatan. Makasi yaa, See You.
                    </p>
                    <p class="text-[#756763] font-normal text-base leading-relaxed">
                        Dari aku pribadi, Happy Birthday yaaa, Bahagia Selaluu.
                    </p>
                </div>
                <!-- Tanda Tangan -->
                <p class="text-right text-gray-600 font-bold text-xl mt-6">- 13</p>
            </div>
            <div class="flex justify-center gap-6 mt-10 mb-4">
                <a href="{{ route('pesan') }}"
                    class="hover-button bg-gradient-to-l from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('end') }}"
                    class="hover-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    Lanjutkan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
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
