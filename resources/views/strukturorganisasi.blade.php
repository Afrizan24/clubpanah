<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <title>GAS</title>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

</head>

<body>

    <x-navbar></x-navbar>

    <x-strukturorganisasi :pembina="$pembina" :ketua="$ketua" :sekretaris="$sekretaris" :bendahara="$bendahara" :anggota="$anggota" />


    <x-footer></x-footer>

</body>

</html>
