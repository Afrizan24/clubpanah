<?php

namespace Database\Factories;

use App\Models\Beranda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beranda>
 */
class BerandaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beranda::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => 'GOLD ARCHERY SAMARINDA',
            'deskripsi' => 'Bergabunglah dengan komunitas panahan terbaik di Samarinda. Kami menawarkan pelatihan, acara komunitas, dan perlengkapan berkualitas untuk semua kalangan!',
            'gambar' => 'storage/gambar/logo aseli.jpg',
            'tentang_kami' => 'Momen-momen terbaik dari berbagai aktivitas, program latihan, serta acara komunitas yang kami selenggarakan. Kami bangga membagikan semangat dan kebersamaan yang terjalin di setiap kegiatan.',
            'judul_kegiatan' => 'Pelatih Yang Terarah',
            'deskripsi_kegiatan' => 'Klub panahan memberikan bimbingan dari pelatih berpengalaman. Ini penting banget, terutama buat pemula, supaya teknik dasarnya benar sejak awal dan bisa berkembang dengan aman.',
            'gambar_galeri' => 'storage/gambar/logo aseli.jpg',
            'alamat' => 'Jl. Belatuk',
            'google_maps' => 'https://goo.gl/maps/fWRcnzehjpSEwkwAA',
            'whatsapp' => '628125372066',
        ];
    }
}
