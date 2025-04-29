<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <title>GAS</title>
</head>

<body class="scroll-smooth">
    <x-navbar></x-navbar>

    <!-- Photobooth Section -->
    <section class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-pink-300 via-rose-200 to-pink-100 py-16 px-6">

        <h1 class="text-4xl md:text-5xl font-extrabold text-pink-700 mb-10 animate-bounce">✨</h1>

        <div class="flex flex-col md:flex-row items-center gap-10 bg-white/30 backdrop-blur-xl p-8 md:p-12 rounded-3xl shadow-2xl w-full max-w-6xl">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <video id="video" autoplay playsinline class="rounded-2xl w-80 md:w-96 shadow-lg brightness-110 contrast-110 saturate-150"></video>
                    <div id="countdown" class="absolute inset-0 flex items-center justify-center text-6xl md:text-7xl font-bold text-white animate-pulse"></div>
                </div>
            </div>

            <div id="photostrip" class="flex flex-col gap-4 items-center bg-white/80 p-4 rounded-2xl shadow-lg overflow-hidden w-48">
                <!-- Foto hasil jepretan masuk sini -->
            </div>
        </div>

        <div class="flex flex-wrap gap-6 mt-10">
            <button id="startBtn" class="px-8 py-3 rounded-full bg-pink-500 hover:bg-pink-600 text-white font-semibold text-lg shadow-lg transition">Mulai Ambil Foto</button>
            <button id="downloadBtn" class="hidden px-8 py-3 rounded-full bg-green-500 hover:bg-green-600 text-white font-semibold text-lg shadow-lg transition">Download Foto</button>
        </div>

        <!-- Canvas tersembunyi -->
        <canvas id="canvas" width="150" height="100" class="hidden"></canvas>

        <!-- Sound efek kamera -->
        <audio id="snapSound" src="https://www.soundjay.com/mechanical/camera-shutter-click-01.mp3" preload="auto"></audio>

    </section>

    <!-- Photobooth Script -->
    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        const photostrip = document.getElementById('photostrip');
        const countdown = document.getElementById('countdown');
        const startBtn = document.getElementById('startBtn');
        const downloadBtn = document.getElementById('downloadBtn');
        const snapSound = document.getElementById('snapSound');

        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
            } catch (error) {
                alert('Gagal mengakses kamera 😭');
                console.error(error);
            }
        }

        startCamera();

        startBtn.addEventListener('click', async () => {
            photostrip.innerHTML = '';
            downloadBtn.classList.add('hidden');

            for (let photoNum = 0; photoNum < 3; photoNum++) {
                for (let i = 3; i > 0; i--) {
                    countdown.innerText = i;
                    countdown.classList.add('animate-ping');
                    await new Promise(r => setTimeout(r, 1000));
                    countdown.classList.remove('animate-ping');
                }
                countdown.innerText = '📸';
                snapSound.play();
                await new Promise(r => setTimeout(r, 500));

                // Apply filter here before drawing image
                ctx.filter = "brightness(1.1) contrast(1.2) saturate(1.5) hue-rotate(-10deg)";
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                ctx.filter = "none"; // Reset filter after drawing image

                const img = new Image();
                img.src = canvas.toDataURL('image/png');
                img.className = 'w-36 h-24 object-cover rounded-xl shadow-md border-4 border-pink-400';
                photostrip.appendChild(img);

                countdown.innerText = '';
                await new Promise(r => setTimeout(r, 500));
            }

            downloadBtn.classList.remove('hidden');
        });

        downloadBtn.addEventListener('click', () => {
            const stripCanvas = document.createElement('canvas');
            stripCanvas.width = 150;
            stripCanvas.height = 310;

            const stripCtx = stripCanvas.getContext('2d');
            const photos = document.querySelectorAll('#photostrip img');

            photos.forEach((photo, index) => {
                // Apply the same filter to each photo in strip before drawing it
                stripCtx.filter = "brightness(1.1) contrast(1.2) saturate(1.5) hue-rotate(-10deg)";
                stripCtx.drawImage(photo, 0, index * 105, 150, 100);
                stripCtx.filter = "none"; // Reset filter after each photo
            });

            const link = document.createElement('a');
            link.download = 'photostrip.png';
            link.href = stripCanvas.toDataURL();
            link.click();
        });
    </script>

    <x-footer></x-footer>
</body>

</html>
