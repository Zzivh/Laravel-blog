<?php

namespace App;

use App\Model;

class Fan extends Model
{
    // 粉丝用户
    public function fuse()
    {
        return $this->hasOne(\App\User::class, 'id', 'fan_id');
    }
    // 被关注的用户
    public function suser()
    {
        return $this->hasOne(\App\User::class, 'id', 'star_id');
}
}
