<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Song;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;
class AdminController extends Controller
{
    public function getLogin()
    {
        /*User::create([
            'name' => 'tuncer',
            'email' => 'tuncerb17@gmail.com',
            'password' => bcrypt('12345'),
        ]);*/

        return view('adminlayouts.login');
    }

    public function postLogin()
    {
        $validator = Validator::make(Input::all(),
            array(
                'email' =>'required',
                'password' =>'required',
            ));
        if($validator->fails()){
            return Redirect::route('admin-login')->withErrors($validator)->withInput();
        }else
        {
            $remember = (Input::has('remember')) ? true : false ;

            //attempt user sing in
            //attempt static method! hashleyecek
            $auth = Auth::attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ), $remember);

            if($auth){
                return Redirect::route('main');
            }else{
                return Redirect::route('admin-login')->with('global' , 'email/username wrong ?');
            }
        }

        return Redirect::route('main');
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect::route('admin-login');
    }

    public function mainPage()
    {
        return view('adminlayouts.home');
    }

    public function AddSongPage()
    {
        return View('adminlayouts.song.addSong');
    }

    public function postAddSong()
    {
        $file = Input::file('file');
        $filename = $file->getClientOriginalName();
        $path = public_path('uploads/');
        $flnm = str_replace(' ', '', $filename);
        $song_url = 'uploads/' .$flnm;


        if($file->move($path,$song_url)){
            $filename = explode('.', $filename);
            //$extantion = $filename[1]; noktalılarda hataya sebebiyer verir! !TODO
            $filename = $filename[0];

            $singer_song = explode('-', $filename);
            if($singer_song[1] == null){

                $singer = 'Bilinmiyor';
                $song = $singer_song;
            }else
            {
                $singer = $singer_song[0];
                $song = $singer_song[1];
            }

            $song_id = Song::insertGetId(
                array(
                    'song_name' => $song,
                    'singer'  => $singer,
                    'image_url'  => 'Bilinmiyor',
                    'song_url'  => $song_url,
                    'created_at' => date('Y-m-d H:i:s')
                ));

            $data = array(
                'song_id' => $song_id,
                'songName' => $song,
                'singer'  => $singer
            );
            return View('adminlayouts.song.ajaxUpdateSong')->with($data);


        }else{
            return 'hata';
        }
        return $filename;
        $getDuration = explode('-', $duration2);
    }

    public function postUpdateSong($song_id)
    {
        $singer = Input::get('singer');
        $songName = Input::get('songName');
        $image = Input::file('image');

        $filename = $image->getClientOriginalName();
        $path = public_path('uploadedImage/');
        $flnm = str_replace(' ', '', $filename);
        $image_url = 'uploadedImage/' .$flnm;

        $song = Song::find($song_id);


        if(count($song) && $image->move($path,$flnm)){

            $song->singer = $singer;
            $song->song_name = $songName;
            $song->image_url = $image_url;
            $song->save();

            return View('adminlayouts.song.addSong');

        }else{
            return 'hata';
        }


    }

    public function EditSongPage()
    {
        $songs = Song::paginate(30);

        $data = array('songs' => $songs);
        return View('adminlayouts.song.editSongs',$data);
    }

    public function DeleteSong($song_id)
    {
        $song = Song::find($song_id);

        $filename = public_path().'/'.$song->music_url;

        if (File::exists($filename)) {
            File::delete($filename);
            $song->delete();
        }else{
            return 'hata';
        }

        return Redirect::Route('edit-songs');
    }

    public function EditMySong()
    {
        $song_id_edit = Input::get('song_id_edit');
        $singer_name_input = Input::get('singer_name_input');
        $song_name_input = Input::get('song_name_input');

        $image_change = Input::file('image_change');

        if($image_change != null){
            $filename = $image_change->getClientOriginalName();
            $path = public_path('uploadedImage/');
            $flnm = str_replace(' ', '', $filename);
            $image_url = 'uploadedImage/' .$flnm;

            $song = Song::find($song_id_edit);

            if(count($song) &&$image_change->move($path,$flnm)){
                $song->singer = $singer_name_input;
                $song->song_name = $song_name_input;
                $song->image_url = $image_url;
                $song->save();
            }
        }else
        {
            $song = Song::find($song_id_edit);

            if(count($song)){
                $song->singer = $singer_name_input;
                $song->song_name = $song_name_input;
                $song->save();
            }
        }

        return Redirect::Route('edit-songs');

    }

    public function secureplay($url){
        $return = File::get(public_path('uploads/'.$url));

        if( !$return )
            return "false";

        $response = Response::make($return, 200)->header('Content-Type', "audio/mpeg");
        return $response;
    }
}
