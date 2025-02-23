<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
</head>
<body>
    <audio id="background-music" controls loop>
        <source src="{{ asset('lagu/monokrom.mp3') }}" type="audio/mp3">
        Your browser does not support the audio tag.
    </audio>

    <script>
        const audio = document.getElementById('background-music');

        // Ambil lagu terakhir yang diputar
        const lastSong = localStorage.getItem('currentSong') || "{{ asset('lagu/monokrom.mp3') }}";
        const lastTime = localStorage.getItem('currentTime') || 0;

        audio.src = lastSong;
        audio.load();

        // Mulai dari posisi terakhir setelah lagu di-load
        audio.addEventListener('loadedmetadata', function() {
            audio.currentTime = lastTime;
        });

        // Simpan posisi lagu saat diputar
        audio.addEventListener('timeupdate', function() {
            localStorage.setItem('currentTime', audio.currentTime);
        });

        // Terima pesan untuk mengganti lagu
        window.addEventListener('message', (event) => {
            if (event.data.type === 'changeSong') {
                audio.src = event.data.song;
                localStorage.setItem('currentSong', event.data.song);
                audio.load();

                if (event.data.play) {
                    audio.play();
                }
            }

            if (event.data.type === 'togglePlay') {
                if (audio.paused) {
                    audio.play();
                } else {
                    audio.pause();
                }
                // Kirim pesan balik ke halaman utama
                window.parent.postMessage({ type: 'playState', isPlaying: !audio.paused }, '*');
            }
        });

        // Kirim pesan awal ke halaman utama
        window.parent.postMessage({ type: 'playState', isPlaying: !audio.paused }, '*');
    </script>
</body>
</html>