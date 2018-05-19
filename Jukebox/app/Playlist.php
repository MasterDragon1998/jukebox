<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function user(){
    	$this->belongsTo('App\User');
    }
}
