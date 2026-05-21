<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tarjeta extends Component
{

    public $incidencia;
    public $eliminar;
    /**
     * Create a new component instance.
     */
    public function __construct($eliminar, $incidencia)
    {
        $this->eliminar = $eliminar;
        $this->incidencia = $incidencia;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tarjeta');
    }
}
