<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Throwable;

class Settings extends Component
{
    public $name;
    public $email;
    public $password = null;


    protected $rules = [
        'name' => 'required|min:3|max:50',
    ];

    public function mount () {
        $user        = Auth::user();
        $this->name  = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.user.settings');
    }

    public function submit()
    {
        try {
            $this->validate();
    
            $user        = Auth::user();
            $user->name  = $this->name;
            $user->email = $this->email;

            if($this->password) {
                $user->password = Hash::make($this->password);
            }

            $user->save();

            session()->flash('success', 'Successfully updated!');
        }
        catch (Throwable $e) {
            session()->flash('success', 'Please try again.');
        }
    }
}
