<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Beranda extends Component
{
    public $beranda;
    public $fotos;

    public function __construct($beranda = null, $fotos = null)
    {
        $this->beranda = $beranda;
        $this->fotos = $fotos;
    }

    public function render()
    {
        return view('components.beranda');
    }
}
