<?php

namespace App;

use App\Model;

// 表 => posts
class Post extends Model
{
    // 关联用户
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
