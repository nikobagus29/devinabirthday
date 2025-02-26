@extends('layouts')

@section('content')
<section id="song" class="py-20 bg-gradient-to-b from-[#f1ece3] to-white">
    <div class="container mx-auto px-4">
        <div class="bg-[#ebd5c7] backdrop-blur-lg p-8 rounded-lg shadow-lg">
            <h2 class="text-4xl font-bold text-center text-[#756763]  mb-8" data-aos="fade-up">Special Song</h2>
            <div class="grid gap-6">
                <div class="bg-gradient-to-br from-[#f2eade] to-[#ece7df] p-6 rounded-lg shadow-md" data-aos="fade-right">
                    <p class="text-[#756763] text-lg">
                        Sebelum mulai, mungkin kalau ada musiknya bakal lebih asik. "Panda" punya pilihan beberapa musik
                        nih. Semoga kamu suka yaa.
                    </p>
                </div>

                <!-- Dropdown & Button -->
                <div class="text-center">
                    <select id="songSelector"
                        class="bg-[#f2eade] border border-[#f2eade] text-[#756763]  py-2 px-4 rounded-md mb-4 w-full md:w-1/2 mx-auto">
                        <option value="{{ asset('lagu/monokrom.mp3') }}">Monokrom - Tulus</option>
                        <option value="{{ asset('lagu/sertaMulia.mp3') }}">Serta Mulia - Sal Priadi</option>
                        <option value="{{ asset('lagu/birthdayGirl.mp3') }}">Birthday Girl - Alva Leigh</option>
                    </select>

                    <button id="playButton"
                        class="bg-gradient-to-r from-[#756763] to-[#86746f] text-white font-bold py-3 px-6 rounded-full w-full md:w-1/2 mx-auto transition duration-300 transform hover:scale-105">
                        Play Music
                    </button>
                </div>
            </div>

            <!-- Tombol Navigasi -->
            <div class="flex justify-center gap-6 mt-10">
                <a href="{{ route('home') }}"
                    class="hover-button bg-gradient-to-l from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('perkenalan') }}" target="_blank"
                    class="hover-button bg-gradient-to-r from-[#756763] to-[#86746f] text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full shadow-lg text-base sm:text-lg font-semibold flex items-center justify-center gap-2 transform transition-transform duration-300 hover:scale-105">
                    Lanjutkan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const playButton = document.getElementById('playButton');
        const songSelector = document.getElementById('songSelector');
        const musicFrame = document.getElementById('musicFrame');

        // Fungsi untuk ganti lagu
        function changeSong(songUrl, play = false) {
            musicFrame.contentWindow.postMessage({ type: 'changeSong', song: songUrl, play: play }, '*');
        }

        // Fungsi untuk play/pause musik
        function togglePlay() {
            musicFrame.contentWindow.postMessage({ type: 'togglePlay' }, '*');
        }

        // Event listener untuk tombol play/pause
        playButton.addEventListener('click', togglePlay);

        // Event listener untuk dropdown
        songSelector.addEventListener('change', function () {
            const selectedSong = songSelector.value;
            changeSong(selectedSong, true);
        });

        // Terima pesan dari iframe buat ngontrol tombol
        window.addEventListener('message', (event) => {
            if (event.data.type === 'playState') {
                playButton.textContent = event.data.isPlaying ? 'Pause Music' : 'Play Music';
            }
        });
    });
</script>
@endsection