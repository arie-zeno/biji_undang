<?php

namespace App\Livewire;

use Livewire\Component;

class Ari extends Component
{
    public $undangan;
    public function mount($nama)
    {
        $this->undangan = $nama;
    }
    public function render()
    {
        return view('livewire.ari');
    }
}
