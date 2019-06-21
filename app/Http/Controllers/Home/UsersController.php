<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.user.index');
    }

    /**
     * 修改个人 基本信息页面 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function elementInfo()
    {
        return view('home.user.users_info');
    }
    /**
     * 保存 基本信息页面 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveInfo($id)
    {
        //
    }

    /**
     * 显示个人 安全中心信息 修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('home.user.edit');
    }

    /**
     * 处理保存 修改的个人信息数据
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
