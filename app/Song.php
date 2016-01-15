<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = array('id', 'song_name', 'singer','image_url', 'song_url', 'listen_count', 'created_at','updated_at');
    protected $table = 'songs';
}
