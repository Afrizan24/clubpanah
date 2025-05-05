<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balasan Pesan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-center text-blue-600 mb-4">Balasan Pesan</h1>
        
        <p class="text-gray-700 text-lg">{{ $messageText }}</p>

        <div class="mt-6">
            <hr class="border-gray-300">
            <p class="text-sm text-center text-gray-500 mt-4">Terima kasih telah menghubungi kami!</p>
        </div>
    </div>
</body>
</html>
