<?php

namespace App\View\Components;

use Illuminate\View\Component;

class strukturorganisasi extends Component
{
    public $pembina, $ketua, $sekretaris, $bendahara, $divisi, $anggota;

    public function __construct($pembina = null, $ketua = null, $sekretaris = null, $bendahara = null, $divisi = null, $anggota = null)
    {
        $this->pembina = $pembina;
        $this->ketua = $ketua;
        $this->sekretaris = $sekretaris;
        $this->bendahara = $bendahara;
        $this->divisi = $divisi;
        $this->anggota = $anggota;
       
    }

    public function render()
    {
        return view('components.strukturorganisasi');
    }
}
