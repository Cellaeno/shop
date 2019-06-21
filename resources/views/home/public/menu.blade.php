<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->    
        <div class="nav">
            <div class="nav_t">全部商品分类</div>
            <div class="leftNav none">
                <ul>      
                    @foreach($common_data_cates as $k=>$v)
                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="/home/images/nav1.png" /></span>
                            <span class="fl">{{ $v->cname }}</span>
                        </div>
                        <div class="zj" style="top:-{{ $top_val  }}px;">
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
<!--End Menu End--> 