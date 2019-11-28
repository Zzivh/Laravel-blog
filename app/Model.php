<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

// 表 => posts
class Model extends BaseModel
{
    // 不可以注入的字段
    protected $guarded = [];
}
