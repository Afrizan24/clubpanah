<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Berita extends Component
{
    /**
     * Create a new component instance.
     */
    public $berita;
    public $events;

    public function __construct($berita, $events)
    {
        $this->berita = $berita;
        $this->events = $events;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.berita', [
            'berita' => $this->berita,
            'events' => $this->events,
        ]);
    }
}
