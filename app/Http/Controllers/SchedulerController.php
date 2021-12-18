<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{
    public function save ($key) {

        try {
            $server = Server::where('key', $key)->first();
            if(!$server) abort(403);
    
            $data = request()->getContent();
            if(!$data) abort(403);
    
            $data = json_decode($data, true);
            return $data;
        }
        catch (Throwable $e) {
            abort(500);
        }
    }
}
