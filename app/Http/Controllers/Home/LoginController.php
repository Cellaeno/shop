<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * 显示登录界面
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.login.index');
    }

    /**
     * 验证用户登录
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        // 验证表单
        $this->validate($request, [
            'uname' => 'required',
            'upwd' => 'required',
            'code' => 'required|captcha',
        ],[
            'uname.required' => '用户名不能为空',
            'upwd.required' => '密码不能为空',
            'code.required' => '验证码不能为空',
            'code.captcha' => '验证码错误',
        ]);

        $users = Users::where('uname',$request->input('uname'))->first();
        if ($users && Hash::check($request->input('upwd'), $users->upwd)) {
            session(['home_flag'=>'true','home_userInfo'=>$users]);
            return redirect('/')->with('success','登录成功');
        } else {
            return back()->with('error','用户名或密码错误');
        }
        
    }

    /**
     * 退出登录
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        session(['home_flag'=>'','home_userInfo'=>'']);
        // dump(session('home_flag'));
        // echo json_encode(['msg'=>'success','info'=>'退出成功','url'=>$_SERVER['HTTP_REFERER']]);
        echo json_encode(['msg'=>'success','info'=>'退出成功']);
    }


}
