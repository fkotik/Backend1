<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
        public $client;

    /**
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
//            'base_uri'=>'http://ws.audioscrobbler.com/2.0/?method=album.search&album=believe&api_key=ba363ad642d8607a094403d490ebe429&format=json',
            'base_uri'=>'http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=ba363ad642d8607a094403d490ebe429&artist=Cher&album=Believe&format=json',

            'timeout'=>2.0,
            'verify'=>false,
        ]);
    }


}
