<?php

namespace App\Http\Livewire\Server\Stat;

use App\Models\SystemResource;
use Livewire\Component;

class Vmem extends Component
{
    public $chart;

    public function render()
    {
        return view('livewire.server.stat.vmem');
    }
}
