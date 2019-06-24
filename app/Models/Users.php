<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
<<<<<<< HEAD
    // 设置表名
=======
	// 设置表名
>>>>>>> origin/ZFY
    public $table = 'users';

    // 配置和用户详情表的一对一关系
    public function usersinfos()
<<<<<<< HEAD
    {
        return $this->hasOne('App\Models\UsersInfo','uid');
    }

    // 配置和收获地址表一对多关系
    public function usersaddress()
    {
        return $this->hasMany('App\Models\Addresses','uid');
    }
=======
	{
    	return $this->hasOne('App\Models\UsersInfos','uid');
	}
>>>>>>> origin/ZFY
}
