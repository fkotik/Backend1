<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function index(){
        $albums = DB::table('Album')->get();

        return view('index',['albums'=>$albums]);
    }
    public function album($id){
        if($id!='create'){
            $album = DB::table('Album')->where('id_album',$id)->first();
        }
        else $album = 0;
        return view('album',['album'=>$album, 'id'=>$id]);
    }

    public function create_album(Request $request){

        DB::table('Album')->insert([
            'name'=>$request->name,
            'author'=>$request->author,
            'description'=>$request->description,
            'cover'=>$request->imgsrc
        ]);

        return redirect(route('index'));
    }
    public function del_album($id){
        DB::delete("DELETE FROM Album WHERE `Album`.`id_album` = $id");

        return redirect(route('index'));
    }
    public function red_album($id, Request $request){
        DB::update("UPDATE `Album` SET `name` = '$request->name', `author` = '$request->author', `description` = '$request->description', `cover`='$request->imgsrc' WHERE `Album`.`id_album` = $id;");

        return redirect(route('index'));
    }
    public function pred($id,Request $request){
        $response = Http::get('http://ws.audioscrobbler.com/2.0/?method=album.search'.'&album='.$request->name.'&api_key=ba363ad642d8607a094403d490ebe429'.'&format=json');
        $data = json_decode($response->body());
        if(isset($data->results->albummatches->album[0])){
            $pred = $data->results->albummatches->album[0];
            $s = "#text";
            if($data->results->albummatches->album[0]->image[3]->$s == ""){
                $img = "/assets/img/default_album_cover.png";
            }
            else
            $img = $data->results->albummatches->album[0]->image[3]->$s;

            $response2 =  Http::get('http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=ba363ad642d8607a094403d490ebe429'.'&artist='.$data->results->albummatches->album[0]->artist.'&album='.$data->results->albummatches->album[0]->name.'&format=json');
            $data2 = json_decode($response2->body());
            if(isset($data2->album->wiki)){
                $descr = $data2->album->wiki->summary;
            }
            else $descr='null';
        }
        else {$pred = 0; $img = 0; $descr=0;}

//        dd($data->results->albummatches->album[0]);

        return view('album',['id'=>$id, 'pred'=>$pred,'img'=>$img,'descr'=>$descr]);
    }
}
