<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Mail;

class RegisterController extends Controller
{
    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public static function juhecurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }

    /**
     * 加载注册页面
     *
     */
    public function index()
    {
        return view('home.register.index');
    }

    /**
     * 手机发送验证码
     *
     */
    public function sendPhone(Request $request)
    {

        // 验证手机号
        $phone = $request->input('phone',0);

        $data = Users::where('phone',$phone)->first();


        if ($data) {
            echo json_encode(['msg'=>'error','info'=>'该手机号已被注册']);
            exit;
        }

        echo "<script>alert($)</script>";

        $code = rand(1234,4321);

        // 如果存入到redis中 注意覆盖键名
        $k = $phone.'_code';
        session([$k=>$code]);

        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
  
        $smsConf = array(
            'key'   => '9c5837bf9cf07af66aa5aec3457086ad', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '166044', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$code, //您设置的模板变量，根据实际情况修改
            'dtype' => 'json'
        );

        $content = self::juhecurl($sendUrl,$smsConf,1); //请求发送短信

        // 返回发送结果
        echo $content;
    }

    /**
     * 执行手机注册
     *
     */
    public function phone(Request $request)
    {
        // 获取手机验证码
        $phone = $request->input('phone',0);
        $k = $phone.'_code';
        $phone_code = session($k);
        $upwd = $request->input('upwd');
        $repwd = $request->input('repwd');

        $code = $request->input('code');

        if ($code != $phone_code) {
            echo "<script>alert('验证码错误或失效');location.href='/home/register';</script>";
            exit;
        }

        // 验证表单
        $this->validate($request, [
            'upwd' => 'required|regex:/^\w{6,12}$/',
            'repwd' => 'required|same:upwd',
        ],[
            'upwd.required' => '密码不能为空',
            'upwd.regex' => '密码格式不正确',
            'repwd.required' => '确认密码不能为空',
            'repwd.same' => '两次的密码不一致',
        ]);

        $user = new Users;
        $user->phone = $phone;
        $user->uname = $phone;
        $user->token = str_random(50);
        $user->status = 1;
        $user->upwd = Hash::make($upwd);

        if ($user->save()) {
            echo "<script>alert('注册成功,立即登录');location.href='/home/login';</script>";
            exit;
        } else {
            echo "<script>alert('注册失败');location.href='/home/register';</script>";
            exit;
        }
    }

    /**
     * 执行邮箱注册
     *
     */
    public function email(Request $request)
    {
        // 验证表单
        $this->validate($request, [
            'email' => 'required|regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/|unique:users,email',
            'upwd' => 'required|regex:/^\w{6,12}$/',
            'repwd' => 'required|same:upwd',
        ],[
            'email.regex' => '邮箱格式不正确',
            'email.unique' => '该邮箱已被注册',
            'email.required' => '邮箱不能为空',
            'upwd.required' => '密码不能为空',
            'upwd.regex' => '密码格式不正确',
            'repwd.required' => '确认密码不能为空',
            'repwd.same' => '两次的密码不一致',
        ]);

        $user = new Users;

        $email = $request->input('email');
        $upwd = $request->input('upwd');

        $user->uname = $email;
        $user->email = $email;
        $user->upwd = Hash::make($upwd);
        $user->token = str_random(50);
        $res = $user->save();

        if ($res) {
            // dd($user);
            // 发送邮件 send->view('模板',[参数])
            Mail::send('home.public.email', ['id' => $user->id, 'token' => $user->token], function ($m) use ($user) {
                // dd($email);
                $s = $m->to($user->email)->subject('【SHOP】 提醒邮件！');       // to 发送地址 subject 标题

                if ($s) {
                    echo "<script>alert('注册成功,请注意邮件查收,尽快完成激活');location.href='/home/login';</script>";
                }
                
                // dd($s);
            });
        }
    }
    
    /**
     * [changeStatus 激活用户]
     * @param  [int] $id    [用户id]
     * @param  [char] $token [验证信息]
     * @return [type]        [description]
     */
    public function changeStatus($id,$token)
    {
        // dd($id,$token);
        $user = Users::find($id);

        if ($user->token != $token) {
            echo "<script>alert('此链接已失效,登录后可前往个人中心激活');location.href='/home/register';</script>";
            exit;
        } else {
            $user->status = 1;
            $res = $user->save();
            if ($res) {
                echo "<script>alert('激活成功,前往登录');location.href='/home/login';</script>";
                exit;
            }
        }
    }

}
