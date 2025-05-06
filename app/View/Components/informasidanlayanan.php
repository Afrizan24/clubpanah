<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class informasidanlayanan extends Component
{
    public $layanan;
    public $testimonials;
    public $profile;

    public function __construct($layanan = null, $testimonials = null, $profile = null)
    {
        $this->layanan = $layanan;
        $this->testimonials = $testimonials;
        $this->profile = $profile;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.informasidanlayanan');
    }
}
