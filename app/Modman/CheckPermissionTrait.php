<?php

namespace App\Modman;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

trait CheckPermissionTrait {

    public function hasPermission()
    {
        $client = new Client(['base_uri' => 'http://api.modman.ga/api/']);
        $response = $client->request('POST', 'endpoint', ['json' => ['key' => $this->key]]);
        $permsArray = [];
        $retorno = json_decode($response->getBody());
        foreach ($retorno as $permission){
            $permsArray[] = strtoupper($permission->profile);
        }
        if(!empty($permsArray)){
            return in_array(strtoupper(Auth::user()->role), $permsArray);
        }
        return false;
    }

}