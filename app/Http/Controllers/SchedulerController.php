<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\SystemResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
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

            Log::debug($data);

            $sysres->vmem           = $data['memory']['virtual']['percent'];
            $sysres->vmem_total     = $data['memory']['virtual']['total'];
            $sysres->vmem_available = $data['memory']['virtual']['available'];
            $sysres->vmem_used      = $data['memory']['virtual']['used'];
            $sysres->vmem_free      = $data['memory']['virtual']['free'];

            $sysres->swap_mem       = $data['memory']['swap']['percent'];
            $sysres->swap_mem_total = $data['memory']['swap']['total'];
            $sysres->swap_mem_used  = $data['memory']['swap']['used'];
            $sysres->swap_mem_free  = $data['memory']['swap']['free'];

            $sysres->disk       = $data['disk']['usage'][3];
            $sysres->disk_total = $data['disk']['usage'][0];
            $sysres->disk_used  = $data['disk']['usage'][1];
            $sysres->disk_free  = $data['disk']['usage'][2];

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
