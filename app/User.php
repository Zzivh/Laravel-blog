<?php

namespace App;

use App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password'
    ];

    // 获取当前用户文章列表
    public function posts()
    {
        return $this->hasMany(\App\Post::class, 'user_id', 'id');
    }

    // 关注我的Fan模型
    public function fans()
    {
        return $this->hasMany(\App\Fan::class, 'star_id', 'id');
    }

    // 我关注的Fan模型
    public function stars()
    {
        return $this->hasMany(\App\Fan::class, 'fan_id', 'id');
    }

    //关注某人
    public function doFan($user_id)
    {
        $fan = new \App\Fan();
        $fan->star_id = $user_id;
        return $this->stars()->save($fan);
    }
    //取消关注
    public function doUnFan($user_id)
    {
        return \App\Fan::where('star_id', $user_id)->where('fan_id', \Auth::id())->delete();
    }

    //判断当前用户是否被uid关注
    public function hasFan($user_id)
    {
        return $this->fans()->where('fan_id', $user_id)->count();
    }
    //判断当前用户是否关注了uid
    public function hasStar($user_id)
    {
        return $this->stars()->where('star_id', $user_id)->count();
    }

}
