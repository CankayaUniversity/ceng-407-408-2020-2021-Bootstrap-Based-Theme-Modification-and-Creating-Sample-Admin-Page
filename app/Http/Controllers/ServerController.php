<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\SystemResource;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ServerController extends Controller
{
    public function overview($id)
    {
        $server = Server::find($id);
        if(!$server) abort(403);

        $sysres = $server->last_system_resources();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Servers"],
            ['name' => $server->name],
        ];

        try {
            $process = Storage::get('server/' . $server->id . '/process.json');
            $process = json_decode($process);
        }
        catch(Throwable $e){
            report($e);
            $process = false;
        }

        try {
            $users = Storage::get('server/' . $server->id . '/users.json');
            $users = json_decode($users);
        }
        catch(Throwable $e){
            report($e);
            $users = false;
        }

        try {
            $disk = Storage::get('server/' . $server->id . '/disk.json');
            $disk = json_decode($disk);
        }
        catch(Throwable $e){
            report($e);
            $disk = false;
        }

        return view('/server/overview', [
            'breadcrumbs'     => $breadcrumbs,
            'server'          => $server,
            'system_resource' => $sysres,
            'process'         => $process,
            'users'           => $users,
            'disk'            => $disk
        ]);
    }

    
    public function add()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Servers"],
            ['name' => "Add Server"]
        ];

        return view('server.add', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
