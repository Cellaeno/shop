<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;
use App\Models\UsersInfo;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('home_userInfo')->id;

        $data = Users::find($id);

        return view('home.user.index',['data'=>$data]);
    }

    /**
     * 显示 修改用户基本信息页面 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function elementInfo()
    {
        $id = session('home_userInfo')->id;
        $data = Users::find($id);
        return view('home.user.users_info',['data'=>$data]);
    }
    /**
     * 保存 用户基本信息页面 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveInfo(Request $request,$id,$token)
    {
        $uname = $request->input('uname');
        $sex = $request->input('sex');
        $age = $request->input('age');
        $qq = $request->input('qq');

        // dump($uname);
        $data = Users::whereNotIn('id', [$id])->where('uname',$uname)->first();
        // dump($data);
        if (!empty($data)) {
            echo json_encode(['msg'=>'error','info'=>'该用户名已存在']);
            exit;
        }

        $user = Users::where('token',$token)->find($id);
        if (!empty($data)) {
            echo json_encode(['msg'=>'danger','info'=>'非法操作,请重新进入修改页面']);
            exit;
        }
        $user->uname = $uname;
        $user->token = str_random(50);
        $res1 = $user->save();
        if($res1){
            // 更改session
            session(['home_userInfo'=>$user]);

            // 获取uid
            $uid = $user->id;
        }

         // 添加用户详情
        $userinfos = UsersInfo::where('uid',$uid)->first();
         
        if (empty($userinfos)) {
            $userinfos = new UsersInfo;
            $userinfos->uid = $uid;
        }
         
        $userinfos->sex = $sex;
        $userinfos->age = $age;
        $userinfos->qq = $qq;
        $res2 = $userinfos->save();

        // 手动操作事务 [ 两个表都插入数据成功 ]
        DB::beginTransaction();
        if($res1 && $res2){
            DB::commit();
            echo json_encode(['msg'=>'success','info'=>'修改成功']);
            exit;
        }else{
            // 回滚
            DB::rollBack();
            echo json_encode(['msg'=>'error','info'=>'修改失败']);
            exit;
        }
    }

    /**
     * 保存修改头像信息
     * @param  Request $request [description]
     * @param  [type]  $id      [用户详情id]
     * @return [type]           [description]
     */
    public function saveFace(Request $request,$id)
    {
        $profile = $request->file('profile','');
        $profile_path = $request->file('profile_path','');
 
        if ($profile) {
            $path = $profile->store(date('Ymd'));
            Storage::delete('profile_path');
        } else {
            $path = $profile_path;
        }

        $userinfos = UsersInfo::where('uid',$id)->first();

        if (empty($userinfos)) {
            $userinfos = new UsersInfo;
            $userinfos->uid = $id;
        }

        $userinfos->profile = $path;

        if ($userinfos->save()) {
            echo "<script>alert('修改成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
            exit;
        } else {
            echo "<script>alert('修改失败');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
            exit;
        }
    }

    /**
     * 显示个人 安全中心信息 修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('home.user.edit',['id'=>$id]);
    }

    /**
     * 处理保存 修改的安全信息
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePwd(Request $request)
    {
        //
    }

    /**
     * 处理保存 修改的安全信息
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePhone(Request $request)
    {
        //
    }

    /**
     * 处理保存 修改的安全信息
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEmail(Request $request)
    {
        //
    }

    public function email($id,$token)
    {
        $user = Users::find($id);
        if ($token == $user->token) {
            RegisterController::sendEmail($user, 'home.public.staemail');
        } else {
            echo "<script>alert('异常操作,稍后再试');location.href='/users'</script>";
        }
    }

}
