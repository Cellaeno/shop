<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = 'users';

    // 配置和用户详情表的一对一关系
    public function usersinfos()
    {
        return $this->hasOne('App\Models\UsersInfo','uid');
    }

    // 配置用户与收获地址一对多的关系
    public function usersaddress()
    {
        return $this->hasMany('App\Models\Addresses','uid');
    }
}
