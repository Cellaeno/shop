<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    public $table = 'cates';

    // 显示首页的 商品列表 一对多
    // public function displaygoods()
    // {
    // 	return $this->hasMany('App\Models\Goods','cate_id');
    // }
    public function showgoods()
    {
    	return $this->hasMany('App\Models\Goods','cate_id');
    }
}
