<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportJsonPlaceholderCommand extends Command
{

    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data from jsonplaceholder';

    public function handle()
    {
//        $import = new ImportDataClient();
//        $res = $import->client->request('GET', '');
//        $data = json_decode($res->getBody()->getContents());
////        foreach ($data as $item){
////            dd($item);
////        }
////        dd($data->results->albummatches->album[0]);
//        dd($data);
        $response = Http::get('http://ws.audioscrobbler.com/2.0/?method=album.search'.'&album=dssd'.'&api_key=ba363ad642d8607a094403d490ebe429'.'&format=json');
        $data = json_decode($response->body());
        $response2 =  Http::get('http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=ba363ad642d8607a094403d490ebe429'.'&artist='.$data->results->albummatches->album[0]->artist.'&album='.$data->results->albummatches->album[0]->name.'&format=json');
        $data2 = json_decode($response2->body());
        dd($data2);
    }
}
