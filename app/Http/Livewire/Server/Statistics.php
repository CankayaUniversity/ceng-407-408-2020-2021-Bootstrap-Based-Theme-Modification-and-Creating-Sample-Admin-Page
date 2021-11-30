<?php

namespace App\Http\Livewire\Server;

use Livewire\Component;

class Statistics extends Component
{
    public $system_resource;

    public function render()
    {
        return view('livewire.server.statistics');
    }
}
