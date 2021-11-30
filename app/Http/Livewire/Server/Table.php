<?php

namespace App\Http\Livewire\Server;

use App\Models\Server;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $servers = Server::get();

        return view('livewire.server.table', [
            'servers' => $servers
        ]);
    }
}
