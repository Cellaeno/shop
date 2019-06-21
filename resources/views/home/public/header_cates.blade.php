<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	@include('home.public.address')
        <!--End 所在收货地区 End-->
        <span class="fr">
            @if(empty(session('home_flag')))
        	<span class="fl">你好，请<a href="/home/login">登录</a>&nbsp; <a href="/home/register" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="/home/login">我的订单</a>&nbsp;|</span>
            @elseif(session('home_userInfo')->auth == 0)
            <span class="fl">欢迎你,<b>{{session('home_userInfo')->uname}}</b>&nbsp;|&nbsp;<a href="/admin" style="color:#ff4e00;">后台管理</a>&nbsp; <a href="javascript:;" onclick="logout(this)">退出</a>&nbsp;|&nbsp;<a href="/order">我的订单</a>&nbsp;|</span>
            @else
            <span class="fl">欢迎你,<b>{{session('home_userInfo')->uname}}</b>&nbsp;|&nbsp;<a href="/users" style="color:#ff4e00;">个人中心</a> &nbsp; <a href="javascript:;" onclick="logout(this)">退出</a>&nbsp;|&nbsp;<a href="/home/register">免费注册</a>&nbsp;|&nbsp;<a href="/order">我的订单</a>&nbsp;|</span>
            @endif

            <script>
                
            </script>


        	<span class="ss">
            	<div class="ss_list">
                	<a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="/collect">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <div class="ss_list">
                	<a href="#">客户服务</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="ss_list">
                	<a href="#">网站导航</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">网站导航</a></li>
                                <li><a href="#">网站导航</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="/index"><img src="/home/images/logo.png" /></a></div>
    <div class="search">
    	<form action="/list" method="get">
        	<input type="text" value="" name="search" class="s_ipt" placeholder="请输入关键字......" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl">
            {{--<!-- @foreach($data_tops as $k=>$v) -->--}}
            <a href="#">咖啡</a>
            {{--<!-- @endforeach -->--}}
    </span>
    </div>
    <div class="i_car">
    	<div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
       		<!--Begin 购物车未登录 Begin-->
            @if(empty(session('home_flag')))
        	<div class="un_login">还未登录！<a href="/home/login" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            @endif
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
            	<li>
                	<div class="img"><a href="#"><img src="/home/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/home/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/home/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            @if(!empty(session('home_flag')))
            <div class="price_a"><a href="/buycar?uid={{ session('home_userInfo')->id }}">去购物车结算</a></div>
            @else(empty(session('home_flag')))
            <div class="price_a"><a href="/home/login">去购物车结算</a></div>
            @endif
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>