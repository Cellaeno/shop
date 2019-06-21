<!-- 引入头部文件 -->
@include('home.public.header')
<body>  
<!--Begin 头部 开始-->
@include('home.public.login_header')
<!--End 头部 结束--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="/home/images/logo.png" /></a></div>
    </div>
	<div class="login">
    	<div class="log_img"><img src="/home/images/l_img.png" width="611" height="425" /></div>
		<div class="log_c" style="height: 520px;">
        	<form action="/home/login/dologin" method="post">
            <div id="mail_phone">
              <span style="font-size:24px;">登录</span>
              <br>
              <span class="fr">还没有商城账号，<a href="/home/register" style="color:#ff4e00;margin-right: 50px;">立即注册</a></span>
              <br>
              @include('home.public.error')
              @include('home.public.messages')
            </div>
            {{csrf_field()}}
            <table border="0" style="width:370px; font-size:14px;" cellspacing="0" cellpadding="0">
              <tr height="5">
              	<td width="55"></td>
                <td></td>
              </tr>
              <tr height="70">
                <td>用户名</td>
                <td><input type="text" value="{{old('uname')}}" name="uname" placeholder="初始用户名为注册时的手机号或邮箱" class="l_user" /></td>
              </tr>
              <tr height="70">
                <td>密&nbsp; &nbsp; 码</td>
                <td><input type="password" value="" name="upwd" class="l_pwd" /></td>
              </tr>
              <tr height="70">
                <td>验证码</td>
                <td>
                    <input type="code" value="" name="code" name="code" class="l_ipt" />
                    <!-- <a href="#" style="font-size:12px; font-family:'宋体';">换一张</a> -->
                    <div style="margin-left: 50px;display: inline-block;vertical-align: middle;line-height: 25px;">
                        <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                    </div>
                    @if($errors->has('captcha'))
                        <div class="col-md-12">
                            <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
                        </div>
                    @endif
                </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                  	<span style="font-family:'宋体';" class="fl">
                      	<label class="r_rad"><input type="checkbox" />请保存我这次的登录信息</label>
                    </span>
                    <span class="fr"><a href="#" style="color:#ff4e00;">忘记密码</a></span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" value="登录" class="log_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin 底部(网站配置) 开始-->
@include('home.public.login_footer')
<!--End 底部 结束 -->    

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
