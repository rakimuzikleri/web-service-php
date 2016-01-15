<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Song;
class ApiController extends Controller
{
    public function Songs()
    {
        $songs = Song::orderByRaw("RAND()")->take(10)->get();
        return Response()->json(array('data' => $songs),200);

    }

    public function TopSongs()
    {
        $songs = Song::orderBy('listen_count', 'desc')->take(10)->get();
        return Response()->json(array('data' => $songs),200);
    }

    public function Listen($song_id)
    {
        $song = Song::find($song_id);
        if(count($song)){
            $song->listen_count ++;
            $song->save();
            return Response()->json(array('data' => $song),200);
        }else{
            return Response()->json(array('message' => 'Song not Found'),404);
        }
    }
}
