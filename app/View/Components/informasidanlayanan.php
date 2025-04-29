<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class informasidanlayanan extends Component
{
    public $layanan;
    public $testimonials;

    public function __construct($layanan = null, $testimonials = null)
    {
        $this->layanan = $layanan;
        $this->testimonials = $testimonials;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.informasidanlayanan');
    }
}
