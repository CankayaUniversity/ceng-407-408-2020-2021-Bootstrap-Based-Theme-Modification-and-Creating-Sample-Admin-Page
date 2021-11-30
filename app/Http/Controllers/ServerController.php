<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\SystemResource;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function overview($id)
    {
        $server = Server::find($id);
        if(!$server) abort(403);

        $res = $server->last_system_resources();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => $server->name]
        ];

        return view('/server/overview', [
            'breadcrumbs'     => $breadcrumbs,
            'server'          => $server,
            'system_resource' => $res,
        ]);
    }
}
