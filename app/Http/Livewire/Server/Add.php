<?php

namespace App\Http\Livewire\Server;

use App\Models\Server;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Add extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|min:3|max:50',
    ];

    public function render()
    {
        return view('livewire.server.add');
    }

    public function submit()
    {
        $this->validate();
 
        $server = Server::create([
            'user_id' => Auth::user()->id,
            'name'    => $this->name,
            'key'     => Str::uuid()->toString(),
            'last_update' => now()
        ]);

        return redirect()->to('/server/' . $server->id);
    }
}
