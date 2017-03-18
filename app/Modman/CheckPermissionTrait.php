<?php

namespace App\Modman;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

trait CheckPermissionTrait {

    public function hasPermission()
    {
        $client = new Client(['base_uri' => 'http://api.modman.ga/api/']);
        $response = $client->request('POST', 'endpoint', ['json' => ['key' => $this->key]]);

        $teste = json_decode($response->getBody()->getContents());
        if(!empty(json_decode($response->getBody()))){
            return strtoupper($teste[0]->profile) == strtoupper(Auth::user()->role);
        }
        return null;
    }

}