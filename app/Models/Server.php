<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    public function system_resources() {
        return $this->hasMany(SystemResource::class);
    }

    public function last_system_resources() {
        return $this->hasMany(SystemResource::class)->latest('id')->first();
    }
}
