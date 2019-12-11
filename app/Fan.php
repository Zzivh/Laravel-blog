<?php

namespace App;

use App\Model;

class Fan extends Model
{
    //Fan表中指定一行记录中指向的粉丝用户
    public function fuser(){
        return $this->hasOne(\App\User::class,'id','fan_id');
    }
    //Fan表中指定行id指向的被关注的用户
    public function suser(){
        return $this->hasOne(\App\User::class,'id','star_id');
    }
}
