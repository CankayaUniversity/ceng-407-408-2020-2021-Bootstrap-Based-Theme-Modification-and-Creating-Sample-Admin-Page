<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'server_id',

        'cpu',
        'cpu_count',

        'load_avg',

        'vmem',
        'vmem_total',
        'vmem_available',
        'vmem_used',
        'vmem_free',
        'vmem_active',
        'vmem_inactive',
        'vmem_buffers',
        'vmem_cached',
        'vmem_shared',

        'swap_mem',
        'swap_mem_total',
        'swap_mem_used',
        'swap_mem_free',
        'swap_mem_sin',
        'swap_mem_sout',

        'disk',
        'disk_total',
        'disk_used',
        'disk_free'
    ];

    public function server(){
        return $this->belongsTo(Server::class, 'server_id', 'id');
    }

}
