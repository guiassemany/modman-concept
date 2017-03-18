<?php

namespace App\Modman;

use GuzzleHttp\Client;

trait CheckPermissionTrait {

    public function hasPermission()
    {
        $client = new Client(['base_uri' => 'http://api.modman.ga/api/']);
        $response = $client->request('POST', 'endpoint', ['json' => ['key' => $this->key]]);
        return !empty(json_decode($response->getBody()));
    }

}