<?php

namespace App\Http\Livewire\Server\Stat;

use App\Models\SystemResource;
use Livewire\Component;

class Cpu extends Component
{
    public function render()
    {
        return view('livewire.server.stat.cpu');
    }
}
