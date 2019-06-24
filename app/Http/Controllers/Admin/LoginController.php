<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin_Users;
use Hash;
use DB;


class LoginController extends Controller
{
    /**
     * 显示登录界面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // 加载登录页面
        return view('admin/login/index');
    }

    /**
     * 处理登录操作
     *
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        // 获取登陆者的信息
        $uname = $request->input('uname');
        $upwd = $request->input('upwd');

        // 查询登陆者是否存在
        $date_user = Admin_Users::where('uname',$uname)->first();
        if(!$date_user){
           return redirect('admin/login')->with('error','用户名或密码错误');
        }
        // 验证密码 
        if(!Hash::check($upwd, $date_user->upwd)) {
            return redirect('admin/login')->with('error','用户名或密码错误');
        }
        // 执行登录 
        session(['admin_login'=>true]);
        session(['admin_users'=>$date_user]);

        // 获取当前用户的权限
        $all_nodes = DB::select('select n.aname, n.cname from nodes as n, roles_nodes as rn, admin_users_roles as ur where ur.uid='.$date_user->id.' and ur.rid = rn .rid and rn.nid = n.id');
        
        // 改变权限格式 [create和store并存,edit和update并存]
        $temp = [];
        foreach ($all_nodes as $key => $value) {
            $temp[$value->cname][] = $value->aname;
            if($value->aname == 'create'){
                $temp[$value->cname][] = 'store';
            }
            if($value->aname == 'edit'){
                $temp[$value->cname][] = 'update';
            }
            if($value->aname == 'index'){
                $temp[$value->cname][] = 'show';
            }
        }

        // 把权限压入到session
         session(['all_nodes'=>$temp]);
        // 跳转到后台首页
        return redirect('admin');
    }

    /**
     * 退出登录操作
     *
     * @return \Illuminate\Http\Response
     */
    public function loginout()
    {
        // 执行退出登录
        session(['admin_login'=>false]);
        session(['admin_users'=>null]);
        session(['all_nodes'=>null]);

        // 跳转到登录页面
         return redirect('admin/login');
    }

    /**
     * 后台管理员 修改密码页面
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin/login/edit');
    }

    /**
     * 执行修改密码操作
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         // 编写验证逻辑
        $this->validate($request, [
            'upwd' => 'required',
            'upass' => 'required',
            'repass' => 'required|same:upass',
        ],[
            'upwd.required'=>'请填写旧密码',
            'upass.required'=>'请填写新密码',
            'repass.required'=>'请确认新密码',
            'repass.same'=>'两次新密码不一致',
        ]);

        // 获取接收的旧密码
        $upwd = $request->input('upwd');
        // 获取session保存的密码
        $upwd_ord = session('admin_users')->upwd;
    
        // 验证旧密码是否正确
        if(!Hash::check($upwd, $upwd_ord)) {
            return redirect('admin/login/edit')->with('error','旧密码错误');
        }
        // dd(session('admin_users'));
        // 保存密码
        $id = session('admin_users')->id;
        $admin = Admin_Users::find($id);
        $admin->upwd = Hash::make($request->input('upass'));
        $res = $admin->save();
        if($res){
            return redirect('admin/login')->with('success','修改密码成功,请重新登录');
        }else{
            return redirect('admin/login/edit')->with('error','修改密码失败');
        }
    }

}
