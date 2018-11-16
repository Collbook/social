<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = [
        'user_id', 'discussion_id', 'content',
    ];
 
    public function discussions()
    {
        return $this->belongsTo('App\Discussion');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    } 

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    

    public function is_liked_by_auth_user()
    {

        $hasLikers = array();

        foreach($this->likes as $like):
            array_push($hasLikers,$like->user_id);
        endforeach;

        if(in_array(Auth::id(),$hasLikers))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
