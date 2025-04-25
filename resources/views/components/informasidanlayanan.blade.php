<!-- Section Company Profile -->
<section class="py-12 px-4 ">
<div class="text-center mb-8">
    <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" alt="Logo Archery" class="w-full max-w-xl mx-auto rounded-lg shadow-lg">
    <h2 class="text-4xl font-bold text-center text-orange-500 mb-6">ARCHERY PROFILE</h2>
    <div class="max-w-4xl mx-auto text-center text-gray-800 space-y-4">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam hic illo, esse aliquam cum quos aperiam? Repellat placeat architecto consectetur aliquid consequuntur pariatur, a rerum nulla laboriosam vel, sed dolorum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, libero. Expedita ipsa fugit harum, corporis at nesciunt quaerat, dolore laboriosam voluptate iure mollitia! Ab, nemo et in aut tenetur perferendis, voluptate nesciunt voluptas illo ratione nihil aliquid molestias modi possimus cum ex rem impedit. Veritatis ex distinctio eum sint neque deserunt pariatur tempora, exercitationem animi voluptas architecto enim aut aliquid inventore autem, quisquam soluta officiis? Eos accusamus repudiandae non voluptas mollitia, ratione autem saepe placeat id alias error vitae minus qui laudantium est doloribus iste nobis reprehenderit. Numquam porro inventore dignissimos enim commodi dolore animi aperiam! Distinctio ipsa assumenda debitis? Deserunt, eaque vitae assumenda sequi soluta harum, et deleniti, dicta totam quo delectus beatae aliquid minima vel similique nesciunt amet qui. Accusantium adipisci labore iusto facilis explicabo neque laborum maxime ipsum dolorum ullam corrupti tenetur quae ea, distinctio odio ducimus at qui veniam necessitatibus tempora. Soluta doloremque eligendi quisquam itaque commodi, corrupti iusto voluptatum atque eaque ipsam ad, dolores qui, modi similique placeat nulla. Expedita architecto soluta magnam esse repellat saepe placeat nobis. Excepturi modi accusamus nemo suscipit dolor inventore deserunt sapiente eveniet! Enim, modi nulla quam fugit minus nam impedit aspernatur corporis incidunt, ducimus molestias possimus a aliquid tempore.
        </p>
    </div>
</section>
</div>

<section class=" bg-gray-300 py-12 px-4 bg-dark">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">

    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center space-x-3 mb-4">
        <h3 class="text-2xl font-bold text-orange-500">Informasi Layanan</h3>
      </div>
      <p class="text-gray-700">
        <strong>Hari & Jam Operasional:</strong>  <br>
        <strong>Biaya:</strong>  <br>
        <strong>Lokasi:</strong>  <br>
        <strong>Kontak WA:</strong> <br>
        <strong>URL Gambar:</strong>
      </p>
    </div>

  
    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center space-x-3 mb-4">
        <h3 class="text-2xl font-bold text-orange-500">Layanan</h3>
      </div>
      <p class="text-gray-700">
        <strong>Judul Layanan:</strong>  <br>
        <strong>Deskripsi Layanan:</strong>  <br>
      </p>
    </div>
  </div>


  <div class="  mt-10 max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
  <!-- Daftar Testimonial -->
  <div class="space-y-4">
    <h2 class="text-4xl font-bold text-center text-orange-500 mb-6">TESTIMONIAL</h2>

    <div onclick="showTestimonial(0)" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 bg-gray-200 cursor-pointer" id="tab-0">
      <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" class="w-16 h-16 rounded-full object-cover">
      <div>
        <p class="font-semibold text-gray-800">Afrizan</p>
        <p class="text-sm text-gray-500">CEO, Perusahaan Hebat</p>
      </div>
    </div>

    <div onclick="showTestimonial(1)" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 cursor-pointer" id="tab-1">
      <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" class="w-16 h-16 rounded-full object-cover">
      <div>
        <p class="font-semibold text-gray-800">Afrizan</p>
        <p class="text-sm text-gray-500">Marketing Manager</p>
      </div>
    </div>

    <div onclick="showTestimonial(2)" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-100 cursor-pointer" id="tab-2">
      <img src="{{ asset('storage/gambar/logo aseli.jpg') }}" class="w-16 h-16 rounded-full object-cover">
      <div>
        <p class="font-semibold text-gray-800">Afrizan</p>
        <p class="text-sm text-gray-500">CTO, Startup Inovatif</p>
      </div>
    </div>
  </div>

  <!-- Konten Testimonial Aktif -->
  <div class="md:col-span-2 bg-white shadow-md rounded-2xl p-6">
    <h3 id="nama" class="text-lg font-semibold text-gray-800">John Doe</h3>
    <p id="jabatan" class="text-sm text-gray-500 mb-2">CEO, Perusahaan Hebat</p>
    <p id="pesan" class="text-base text-gray-700">
      "Layanan mereka luar biasa! Saya sangat puas dengan hasilnya dan pasti akan merekomendasikannya ke orang lain."
    </p>
  </div>
</div>

<!-- Script untuk interaktif -->
<script>
  const testimonials = [
    {
      nama: 'Afrizan',
      jabatan: 'CEO, Perusahaan Hebat',
      pesan: 'Layanan mereka luar biasa! Saya sangat puas dengan hasilnya dan pasti akan merekomendasikannya ke orang lain.'
    },
    {
      nama: 'Afrizan',
      jabatan: 'Marketing Manager',
      pesan: 'Timnya sangat responsif dan memberikan solusi terbaik untuk kami.'
    },
    {
      nama: 'Afrizan',
      jabatan: 'CTO, Startup Inovatif',
      pesan: 'Teknologi dan pendekatan mereka sangat modern. Sangat direkomendasikan.'
    }
  ];

  function showTestimonial(index) {
    document.getElementById('nama').textContent = testimonials[index].nama;
    document.getElementById('jabatan').textContent = testimonials[index].jabatan;
    document.getElementById('pesan').textContent = testimonials[index].pesan;

    // Update background untuk tab aktif
    for (let i = 0; i < 3; i++) {
      document.getElementById(`tab-${i}`).classList.remove('bg-gray-200');
    }
    document.getElementById(`tab-${index}`).classList.add('bg-gray-200');
  }
</script>



</section>



