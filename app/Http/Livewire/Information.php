<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Information extends Component
{

    public $terminos_afiliacion = false, $aviso_privacidad = false;

    public function terminos()
    {
        $this->terminos_afiliacion = true;
    }
    public function privacidad()
    {
        $this->aviso_privacidad = true;
    }

    public function cerrar()
    {
        $this->terminos_afiliacion = false;
        $this->aviso_privacidad = false;
    }

    public function render()
    {
        return view('livewire.information');
    }
}
