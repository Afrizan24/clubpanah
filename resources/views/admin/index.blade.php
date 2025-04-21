<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <title>CLub Panah</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById(tabId).classList.remove('hidden');

        document.querySelectorAll('.tab-button').forEach(el => el.classList.remove('bg-blue-600', 'text-white',
            'shadow-md'));
        document.querySelector(`[data-tab="${tabId}"]`).classList.add('bg-blue-600', 'text-black', 'shadow-md');
    }

    window.onload = () => switchTab('hero');
</script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen font-sans">
    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">
            <div class="flex items-center space-x-3">
                <div class="text-2xl font-extrabold text-blue-600">🏋️‍♀️ FitAdmin</div>
                <span class="text-gray-500 hidden sm:inline">Panel Admin Fitness</span>
            </div>
            <div class="flex items-center space-x-4">
                <button class="text-sm text-gray-600 hover:text-blue-600">👤 Admin</button>
                <button class="text-sm text-gray-600 hover:text-red-500">⎋ Keluar</button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto py-10 px-6">
        <div class="mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-2">🎛️ Admin Panel</h1>
            <p class="text-gray-500 text-lg">Kelola konten website fitness Anda di sini</p>
        </div>

        <!-- Tabs -->
        <div class="flex flex-wrap gap-2 mb-8">
            <button data-tab="hero" onclick="switchTab('hero')"
                class="tab-button px-5 py-2.5 text-sm font-medium rounded-lg border border-gray-300 bg-white hover:bg-blue-100">Hero</button>
            <button data-tab="trainers" onclick="switchTab('trainers')"
                class="tab-button px-5 py-2.5 text-sm font-medium rounded-lg border border-gray-300 bg-white hover:bg-blue-100">Trainers</button>
            <button data-tab="about" onclick="switchTab('about')"
                class="tab-button px-5 py-2.5 text-sm font-medium rounded-lg border border-gray-300 bg-white hover:bg-blue-100">About</button>
            <button data-tab="features" onclick="switchTab('features')"
                class="tab-button px-5 py-2.5 text-sm font-medium rounded-lg border border-gray-300 bg-white hover:bg-blue-100">Features</button>
            <button data-tab="news" onclick="switchTab('news')"
                class="tab-button px-5 py-2.5 text-sm font-medium rounded-lg border border-gray-300 bg-white hover:bg-blue-100">News</button>
        </div>

        <!-- Panel Wrapper -->
        <div class="bg-white shadow-xl rounded-xl p-8 space-y-8">

            <!-- Hero Section -->
            <div id="hero" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-gray-700 mb-4">🎯 Hero Section</h2>
                <label class="block text-sm font-medium mb-1">Judul</label>
                <input type="text" class="w-full p-3 border rounded-lg mb-4"
                    placeholder="PERSONAL TRAINERS 3 TIMES A WEEK">
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea class="w-full p-3 border rounded-lg mb-4" rows="3">A good slogan is the start...</textarea>
                <label class="block text-sm font-medium mb-1">Gambar Hero URL</label>
                <input type="text" class="w-full p-3 border rounded-lg mb-4" placeholder="https://...">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">💾 Simpan</button>
            </div>

            <!-- Trainers Section -->
            <div id="trainers" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-gray-700 mb-4">🏋️‍♂️ Trainer Cards</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <label class="block text-sm font-medium">Nama Trainer</label>
                        <input type="text" class="w-full p-3 border rounded-lg" value="MEET THE TRAINERS">
                        <label class="block text-sm font-medium">Deskripsi</label>
                        <textarea class="w-full p-3 border rounded-lg" rows="2">A great slogan can help...</textarea>
                        <label class="block text-sm font-medium">Foto URL</label>
                        <input type="text" class="w-full p-3 border rounded-lg" placeholder="https://...">
                    </div>
                </div>
                <button class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">💾 Simpan
                    Semua</button>
            </div>

            <!-- About Section -->
            <div id="about" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-gray-700 mb-4">📘 About the Club</h2>
                <label class="block text-sm font-medium">Deskripsi</label>
                <textarea class="w-full p-3 border rounded-lg mb-4" rows="4">Lorem ipsum dolor sit amet...</textarea>
                <label class="block text-sm font-medium">Gambar URL</label>
                <input type="text" class="w-full p-3 border rounded-lg mb-4" placeholder="https://...">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">💾 Simpan</button>
            </div>

            <!-- Fitur Section -->
            <div id="features" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-gray-700 mb-4">⚙️ Fitur Sport Center</h2>
                <div class="space-y-3">
                    <input type="text" class="w-full p-3 border rounded-lg" value="Crossfit Sports">
                    <input type="text" class="w-full p-3 border rounded-lg" value="Video Tour">
                    <input type="text" class="w-full p-3 border rounded-lg" value="Quiet Sports">
                    <input type="text" class="w-full p-3 border rounded-lg" value="Sporttime Community">
                    <input type="text" class="w-full p-3 border rounded-lg" value="Pooltime">
                </div>
                <button class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">💾
                    Simpan</button>
            </div>

            <!-- News Section -->
            <div id="news" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-gray-700 mb-4">📰 Sports News</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" class="w-full p-3 border rounded-lg" placeholder="URL Gambar 1">
                    <input type="text" class="w-full p-3 border rounded-lg" placeholder="URL Gambar 2">
                    <input type="text" class="w-full p-3 border rounded-lg" placeholder="URL Gambar 3">
                </div>
                <button class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700">💾
                    Simpan</button>
            </div>

        </div>
    </div>
</body>

</html>
