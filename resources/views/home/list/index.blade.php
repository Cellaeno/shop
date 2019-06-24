<!-- 引入头文件 -->
@include('home.public.header')
<script type="text/javascript" src="/home/js/n_nav.js"></script>
<body>  
<!--Begin 头部 开始-->
@include('home.public.header_cates')
<!--End 头部 结束--> 

<!--Begin Menu Begin-->
@include('home.public.menu')
<!--End Menu End--> 
<div class="i_bg">
    <div class="content mar_10">
        @if(!empty($cate_two_id))
        <span class="fl">全部 > <a href="/list?cate_two_id={{ $data_goods[0]->goodscate_two->id }}">{{ $data_goods[0]->goodscate_two->cname }}</a></span>
        @elseif(!empty($cate_three_id))
        <span class="fl">全部 ><a href="/list?cate_two_id={{ $data_goods[0]->goodscate_two->id }}"> {{ $data_goods[0]->goodscate_two->cname }}</a> ><a href="/list?cate_three_id={{ $data_goods[0]->goodscate_three->id }}">{{$data_goods[0]->goodscate_three->cname }}</a></span>
        @else(!empty($search))
        @if(!empty($data_goods))
        <span class="fl">全部 ><a href="/list?cate_three_id={{ $data_goods[0]->goodscate_three->id }}">{{ $data_goods[0]->goodscate_three->cname }}</a></span>  
        @endif
        @endif
    </div>
    <!--Begin 筛选条件 Begin-->
    <div class="content mar_10">
        <table border="0" class="choice" style="width:100%; font-family:'宋体'; margin:0 auto;" cellspacing="0" cellpadding="0">
          <tr valign="top">
            <td width="70">&nbsp; 品牌：</td>
            <td class="td_a"><a href="#" class="now">香奈儿（Chanel）</a><a href="#">迪奥（Dior）</a><a href="#">范思哲（VERSACE）</a></td>
          </tr>
          <tr valign="top">
            <td>&nbsp; 价格：</td>                                                                                                       
            <td class="td_a"><a href="#">0-199</a><a href="#" class="now">200-399</a><a href="#">400-599</a><a href="#">600-899</a><a href="#">900-1299</a><a href="#">1300-1399</a><a href="#">1400以上</a></td>
          </tr>                                              
          <tr>
            <td>&nbsp; 类型：</td>
            <td class="td_a"><a href="#">女士香水</a><a href="#">男士香水</a><a href="#">Q版香水</a><a href="#">组合套装</a><a href="#">香体走珠</a><a href="#">其它</a></td>
          </tr>                                          
          <tr>
            <td>&nbsp; 香型：</td>                                       
            <td class="td_a"><a href="#">浓香水</a><a href="#">香精Parfum香水</a><a href="#">淡香精EDP淡香水</a><a href="#">香露EDT</a><a href="#">古龙水</a><a href="#">其它</a></td>
          </tr>                                                             
        </table>                                                                                 
    </div>
    <!--End 筛选条件 End-->
    
    <div class="content mar_20">
        <div class="l_history">
            <div class="his_t">
                <span class="fl">浏览历史</span>
                <span class="fr"><a href="#" onclick="del_all(this)">清空</a></span>
            </div>
            <ul id="delete">
                <li>
                    <div class="img"><a href="#"><img src="/home/images/his_1.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
            </ul>
        </div>
        <div class="l_list">
            <div class="list_t">
                <span class="fl list_or">
                    <a href="#" class="now">默认</a>
                    <a href="#">
                        <span class="fl">销量</span>                        
                        <span class="i_up">销量从低到高显示</span>
                        <span class="i_down">销量从高到低显示</span>                                                     
                    </a>
                    <a href="#">
                        <span class="fl">价格</span>                        
                        <span class="i_up">价格从低到高显示</span>
                        <span class="i_down">价格从高到低显示</span>     
                    </a>
                    <a href="#">新品</a>
                </span>
                <span class="fr">共发现120件</span>
            </div>
            <div class="list_c">
                
                <ul class="cate_list">
                    @if(!empty($data_goods))
                    @foreach($data_goods as $k=>$v)
                    <li>
                        <div class="img"><a href="/detail?gid={{$v->id}}"><img src="{{ $v->pic }}" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span> {{$v->price}} </span></font> &nbsp; 26R
                        </div>
                        <div class="name"><a href="/detail?gid={{$v->id}}">{{ $v->title }}</a></div>
                        @if(session('home_flag') == true)
                        <div class="carbg">
                            <!-- 点击事件 -->
                            <a href="collect" class="ss">收藏</a>
                            <a href="/buycar/{{ $v->id }}" class="j_car">加入购物车</a>
                        </div>
                        @else    
                        <div class="carbg">
                            <!-- 点击事件 -->
                            <a href="/home/login" class="ss">收藏</a>
                            <a href="/home/buycar/add?gid={{ $v->id }}" class="j_car">加入购物车</a>
                        </div>
                        @endif
                    </li>
                    @endforeach
                    @else
                        <li style="width: 960px;height: 400px;">
                            <p class="text" style="text-align: center;font-size: 20px;font-weight: 800;">没有搜索到 &nbsp;&nbsp; "{{ $search }}" &nbsp;&nbsp; 相关的商品</p>
                        </li>
                    @endif
                </ul>
                
                <div class="pages">
                    <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                </div>
                
                
                
            </div>
        </div>
    </div>
    
    <!--Begin 底部 开始 -->
    @include('home.public.footer')
    <!--End 底部  结束  -->  

</div>

</body>
<script type="text/javascript">
function del_all(){
    $('.fr').click(function(e) {
                $('#delete li').remove();
        });
} 
</script>

<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
