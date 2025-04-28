<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class informasidanlayanan extends Component
{
    public $layanan;

    public function __construct($layanan = null)
    {
        $this->layanan = $layanan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.informasidanlayanan');
    }
}
