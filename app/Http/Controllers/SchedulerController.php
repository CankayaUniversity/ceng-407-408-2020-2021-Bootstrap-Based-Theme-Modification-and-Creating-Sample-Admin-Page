<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\SystemResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Throwable;

class SchedulerController extends Controller
{
    public function save ($key) {

        try {
            $server = Server::where('key', $key)->first();
            if(!$server) abort(403);
    
            $data = request()->getContent();
            if(!$data) abort(403);
    
            $data = json_decode($data, true);

            $sysres = new SystemResource();
            $sysres->server_id = $server->id;

            $sysres->cpu       = $data['cpu']['percent'];
            $sysres->cpu_count = $data['cpu']['count'];

            $sysres->load_avg = array_sum($data['load']['avg']) / count($data['load']['avg']);;

            $sysres->vmem           = $data['memory']['virtual_memory']['percent'];
            $sysres->vmem_total     = $data['memory']['virtual_memory']['total'];
            $sysres->vmem_available = $data['memory']['virtual_memory']['available'];
            $sysres->vmem_used      = $data['memory']['virtual_memory']['used'];
            $sysres->vmem_free      = $data['memory']['virtual_memory']['free'];

            $sysres->swap_mem       = $data['memory']['swap_memory']['percent'];
            $sysres->swap_mem_total = $data['memory']['swap_memory']['total'];
            $sysres->swap_mem_used  = $data['memory']['swap_memory']['used'];
            $sysres->swap_mem_free  = $data['memory']['swap_memory']['free'];

            $sysres->disk       = $data['disk']['usage']['percent'];
            $sysres->disk_total = $data['disk']['usage']['total'];
            $sysres->disk_used  = $data['disk']['usage']['used'];
            $sysres->disk_free  = $data['disk']['usage']['free'];

            $sysres->save();

            return $sysres->id;
        }
        catch (Throwable $e) {
            report($e);
            echo $e->getMessage();
            // dd($e);
        }
    }

    public function download ($key) {

        $agent_content = File::get( base_path() . '/agent/agent.py' );
        $agent_content = str_replace("\n# SERVER_KEY = \"\" \n\n", "\nSERVER_KEY = \"" . $key . "\" \n\n", $agent_content);

        $filename = "srmav-agent.py";

        return response()->streamDownload(function () use ($agent_content) {
            echo $agent_content;
        }, $filename);
        
    }
}
