<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Beranda extends Component
{
    public $beranda;
    public $fotos;

    public $events;

    public function __construct($beranda = null, $fotos = null, $events = null)
    {
        $this->beranda = $beranda;
        $this->fotos = $fotos;
        $this->events = $events;
    }

    public function render()
    {
        return view('components.beranda');
    }
}
