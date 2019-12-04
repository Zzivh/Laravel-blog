<?php

namespace App;

use App\Model;

use Laravel\Scout\Searchable;

// 表 => posts
class Post extends Model
{
    //引入特性的类内容与方法
    use Searchable;
    //定义索引里面的type
    public function searchableAs()
    {
        return "post";
    }
    //定义有哪些字段需要进行搜索
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }


    // 关联用户
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // 评论模型
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // 和用户进行关联
    public function zan($user_id)
    {
        return $this->hasOne(\App\Zan::class)->where('user_id',$user_id);
    }

    public function zans()
    {
        return $this->hasMany(\App\Zan::class);
    }
}
