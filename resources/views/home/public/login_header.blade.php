<div class="soubg">
	<div class="sou">
        <span class="fr">
            @if(empty(session('home_flag')))
        	<span class="fl">你好，请<a href="/home/login">登录</a>&nbsp; <a href="/home/register" style="color:#ff4e00;">免费注册</a>&nbsp;</span>
            @elseif(session('home_userInfo')->type == 0)
            <span class="fl">欢迎你,<b>{{session('home_userInfo')->uname}}</b>&nbsp;|&nbsp;<a href="/admin" style="color:#ff4e00;">后台管理</a>&nbsp; <a href="javascript:;" onclick="logout(this)">退出</a>&nbsp;</span>
            @else
            <span class="fl">欢迎你,<b>{{session('home_userInfo')->uname}}</b>&nbsp;|&nbsp;<a href="/" style="color:#ff4e00;">个人中心</a> &nbsp; <a href="javascript:;" onclick="logout(this)">退出</a>&nbsp;|&nbsp;<a href="/home/register">免费注册</a>&nbsp;</span>
            @endif
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>