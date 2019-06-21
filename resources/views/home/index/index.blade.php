<!-- 引入头文件 -->
@include('home.public.header')
<body>  
<!--Begin 头部 开始-->
@include('home.public.header_cates')
<!--End 头部 结束--> 

<!--Begin 菜单栏 开始-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->    
        <div class="nav">
            <div class="nav_t">全部商品分类</div>
            <div class="leftNav">
                <ul>      
                    @foreach($common_data_cates as $k=>$v)
                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="/home/images/nav1.png" /></span>
                            <span class="fl">{{ $v->cname }} </span>
                        </div>
                        <div class="zj" style="top: -{{ $top_val }}px">
                            <div class="zj_l">
                                @foreach($v->sub as $kk=>$vv)
                                <div class="zj_l_c">
                                    <h2><a href="/list?cate_two_id={{ $vv->id }}">{{ $vv->cname }}</a></h2>
                                    @foreach($vv->sub as $kkk=>$vvv)
                                    <a href="/list?cate_three_id={{ $vvv->id }}">{{ $vvv ->cname }}</a>|
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/home/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/home/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>  
                    @php
                        $top_val += 40;
                    @endphp
                    @endforeach
                </ul>            
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                     
        <ul class="menu_r">  
            <li><a href="/index">首页</a></li>
            @foreach($common_get_cates as $k=>$v)
            @foreach($v->sub as $kk=>$vv)                                                    
            <li><a href="/list?cate_two_id={{ $vv->id }}">{{$vv->cname}}</a></li>
            @endforeach
            @endforeach
        </ul>
        <div class="m_ad"><a href="/active">中秋送好礼！</a></div>
    </div>
</div>
<!--End 菜单栏 结束--> 

<div class="i_bg bg_color">
    <div class="i_ban_bg">
        <!--Begin Banner Begin-->
        <div class="banner">        
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    @foreach($data_banners as $k=>$v)
                    <li><img src="/uploads/{{ $v->profile }}" width="740" height="401" /></li>
                    @endforeach
                </ul>   
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
            <div class="news_t">
                <span class="fr"><a href="#">更多 ></a></span>友情链接
            </div>
            <ul>
                @foreach($data_links as $k=>$v)
                <li><span>[ 网站 ]</span><a href="{{ $v->url }}" target="_blank">{{ $v->title }}</a></li>
                @endforeach
            </ul>
        
        </div>
    </div>
    <!--Begin 热门商品 Begin-->
    <div class="content mar_10">
        <div class="h_l_img">
            <div class="img"><a href="/detail?cate_three_id={{ $data_top[0]->id }}"><img src="{{ $data_top[0]->pic }}" width="188" height="188" /></div></a>
            <div class="pri_bg">
                <span class="price fl">{{ $data_top[0]->price }}</span>
                <span class="fr">16R</span>
            </div>
        </div>

        <div class="hot_pro">           
            <div id="featureContainer">
                <div id="feature">
                    <div id="block">
                        <div id="botton-scroll">
                            <ul class="featureUL">
                                @foreach($data_tops as $k=>$v)
                                <li class="featureBox">
                                    <div class="box">
                                        <div class="h_icon"><img src="/home/images/hot.png" width="50" height="50" /></div>
                                        <div class="imgbg">
                                            <a href="/detail?cate_three_id={{ $v->id }}"><img src="{{ $v->pic }}" width="160" height="136" /></a>
                                        </div>                                        
                                        <div class="name">
                                            <a href="/detail?cate_three_id={{ $v->id }}">
                                            <h2>{{ $v->title }}</h2>
                                            {{ $v->desc }}
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>{{ $v->price }}</span></font> &nbsp; 26R
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <a class="h_prev" href="javascript:void();">Previous</a>
                    <a class="h_next" href="javascript:void();">Next</a>
                </div>
            </div>
        </div>
    </div>
    <!--Begin 限时特卖 Begin-->
    <div class="i_t mar_10">
        <span class="fl">限时特卖</span>
        <span class="i_mores fr"><a href="/salelimit">更多</a></span>
    </div>
    <div class="content">
        <div class="i_sell">
            <div id="imgPlay">
                <ul class="imgs" id="actor">
                    <li><a href="#"><img src="/home/images/tm_r.jpg" width="211" height="357" /></a></li>
                    <li><a href="#"><img src="/home/images/tm_r.jpg" width="211" height="357" /></a></li>
                    <li><a href="#"><img src="/home/images/tm_r.jpg" width="211" height="357" /></a></li>
                </ul>
                <div class="previ">上一张</div>
                <div class="nexti">下一张</div>
            </div>        
        </div>
        <div class="sell_right">
            <div class="sell_1">
                <div class="s_img"><a href="#"><img src="/home/images/tm_1.jpg" width="185" height="155" /></a></div>
                <div class="s_price">￥<span>89</span></div>
                <div class="s_name">
                    <h2><a href="#">沙宣洗发水</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_2">
                <div class="s_img"><a href="#"><img src="/home/images/tm_2.jpg" width="185" height="155" /></a></div>
                <div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                    <h2><a href="#">德芙巧克力</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_b1">
                <div class="sb_img"><a href="#"><img src="/home/images/tm_b1.jpg" width="242" height="356" /></a></div>
                <div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                    <h2><a href="#">东北大米</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_3">
                <div class="s_img"><a href="#"><img src="/home/images/tm_3.jpg" width="185" height="155" /></a></div>
                <div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                    <h2><a href="#">迪奥香水</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_4">
                <div class="s_img"><a href="#"><img src="/home/images/tm_4.jpg" width="185" height="155" /></a></div>
                <div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                    <h2><a href="#">美妆</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_b2">
                <div class="sb_img"><a href="#"><img src="/home/images/tm_b2.jpg" width="242" height="356" /></a></div>
                <div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                    <h2><a href="#">美妆</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
        </div>
    </div>
    <!--End 限时特卖 End-->
    <div class="content mar_20">
        <img src="/home/images/mban_1.jpg" width="1200" height="110" />
    </div>
    <!--Begin 进口 生鲜 Begin-->
    @foreach($data_cates as $key=>$value)
    <div class="i_t mar_10">
        <span class="fl">{{ $value->cname }}</span>                
        <span class="i_mores fr">
            @foreach($value->sub as $k=>$v)
            <a href="/list?cate_two_id={{ $v->id }}">{{ $v->cname }}</a>&nbsp; &nbsp; |
            @endforeach
    </div>
    
    <div class="content">
        <div class="fresh_left">
            <div class="fre_ban">
                <div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        <li><a href="#"><img src="/home/images/fre_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/home/images/fre_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/home/images/fre_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prevf">上一张</div>
                    <div class="nextf">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
                <div class="fresh_txt_c">
                    @foreach($value->sub as $k=>$v)
                    @foreach($v->sub as $kk=>$vv)
                    <a href="/list?cate_two_id={{ $vv->id }}">{{ $vv->cname }}</a>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                <!-- 遍历商品 -->
                @foreach($value->sub as $k=>$v)
                @foreach($v->sub as $kk=>$vv)
                @foreach($vv->showgoods as $kkk=>$vvv)
                <li>
                    <div class="name"><a href="/detail?cate_three_id={{ $vvv->id }}">{{ $vvv->title }}</a></div>
                    <div class="price">
                        <font>￥<span>{{ $vvv->price }}</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="/detail?cate_three_id={{ $vvv->id }}"><img src="{{ $vvv->pic }}" width="185" height="155" /></a></div>
                </li>
                @endforeach
                @endforeach
                @endforeach
                <!-- 遍历商品 -->
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/home/images/fre_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/home/images/fre_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 进口 生鲜 End-->
    @endforeach
    <!--Begin 猜你喜欢 Begin-->
    <div class="i_t mar_10">
        <span class="fl">猜你喜欢</span>
    </div>    
    <div class="like">          
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1">
                        <ul class="featureUL">
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/home/images/hot1.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>德国进口</h2>
                                        德亚全脂纯牛奶200ml*48盒
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>189</span></font> &nbsp; 26R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/home/images/hot2.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>iphone 6S</h2>
                                        Apple/苹果 iPhone 6s Plus公开版
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>5288</span></font> &nbsp; 25R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/home/images/hot3.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>倩碧特惠组合套装</h2>
                                        倩碧补水组合套装8折促销
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>368</span></font> &nbsp; 18R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/home/images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/home/images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="l_prev" href="javascript:void();">Previous</a>
                <a class="l_next" href="javascript:void();">Next</a>
            </div>
        </div>
    </div>
    <!--End 猜你喜欢 End-->
    
    <!--Begin 底部 开始 -->
    @include('home.public.footer')
    <!--End 底部  结束  -->    
</div>

</body>
<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>