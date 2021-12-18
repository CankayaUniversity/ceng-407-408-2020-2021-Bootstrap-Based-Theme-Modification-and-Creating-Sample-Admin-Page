<?php

namespace App\Http\Livewire\Server\Stat;

use App\Models\SystemResource;
use Livewire\Component;

class Cpu extends Component
{
    public $chart;
    public $chart_data;

    public function mount()
    {
        $this->chart_data = SystemResource::parse_chart_data($this->chart, 'cpu');
    }

    public function render()
    {
        return view('livewire.server.stat.cpu');
    }
}
