<!-- 引入头文件 -->
@include('home.public.header')
<body>  
<!--Begin 头部 开始-->
@include('home.public.header_cates')
<!--End 头部 结束--> 

<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
  <div class="m_content">

      <!-- 用户中心 左侧栏开始 -->
      @include('home.public.user_sideboard')
      <!-- 用户中心 右侧栏开始 -->
      
    <div class="m_right">
      <p></p>
      <div class="mem_tit">收货地址</div>
      @include('home.public.messages')
      @include('home.public.error')
      <p></p>
      @if(!empty($user_addresses))
      <div class="address">
        <!-- <div class="a_close"><a href="#"><img src="/home/images/a_close.png" /></a></div> -->
        @foreach($user_addresses as $address)
        <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
          <tr>
            <td style="font-size:16px; color:#ff4e00;vertical-align: middle;width: 50px;margin-right: 15px;">{{$address->rename}}</td>
            <td style="font-size:11px; vertical-align: bottom;line-height: normal;">{{$address->phone}}</td>
          </tr>
          <tr>
            <td colspan="2" style="font-size:14px;">
              @if($address->status == 1)
              <span style="color: #ff9900;font-size: 12px;background-color: #FFF0EF;padding: 0px 3px;text-align: center;">默认</span>
              @endif
              {{$address->address}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <p align="right">
                @if($address->status == 0)
                <a href="javascript:;" onclick="changeStatus(this,{{$address->id}})">设为默认</a>
                @endif
                &nbsp; &nbsp; &nbsp; &nbsp; <a href="#xgdz" onclick="updated(this,{{$address}})">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="javascript:;" onclick="del(this,{{$address->id}})">删除</a> 
              </p>
            </td>
          </tr>
        </table>
        @endforeach
      </div>
      @endif

          <!-- 添加地址 -->

          <form action="/address" method="post" id="form1">
            {{csrf_field()}}
            <span style="font-size: 16px;margin-left: 25px;color: #555;">添加地址</span> 
            <table border="0" class="add_tab" style="width:930px;margin-top: 20px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">
                  <select id="Province" runat="server" name="province" style="background-color:#f6f6f6;height: 23px;width: 100px;font-size: 13px;color: #555;margin-right: 10px;"></select>
                  <select id="Country" runat="server" name="country" style="background-color:#f6f6f6;height: 23px;width: 100px;font-size: 13px;color: #555;margin-right: 10px;"></select>
                  <select id="Town" runat="server" name="town" style="background-color:#f6f6f6;height: 23px;width: 100px;font-size: 13px;color: #555;margin-right: 10px;"></select>
                  （必填）
                </td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text" name="rename" value="{{old('rename')}}" class="add_ipt" />（必填）</td>
                <td align="right">手机</td>
                <td style="font-family:'宋体';"><input type="text" name="phone" value="{{old('phone')}}" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td style="font-family:'宋体';"><input type="text" name="detail" value="{{old('address')}}" class="add_ipt" />（必填）</td>
                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';"><input type="text" name="postal_code" value="{{old('postal_code')}}" class="add_ipt" /></td>
              </tr>
            </table>
            <p align="right" style="margin-right: 20px;">
              <button type="submit" class="btn_tj">添加地址</button>
            </p>
          </form>

          <!-- 修改地址 -->
          <form action="" method="post" id="form2">
            <a id="xgdz"></a>
            {{csrf_field()}}
            {{method_field('PUT')}}
            <span style="font-size: 16px;margin-left: 25px;color: #555;">修改地址</span>
            <table border="0" class="add_tab" style="width:930px;margin-top: 20px;"  cellspacing="0" cellpadding="0">
              <input type="hidden" id="address_id" name="id" value="">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">
                  <input type="text" name="address" id="address" value="{{old('address')}}" class="add_ipt" style="width: 50%;">（必填）
                </td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';">
                  <input type="text" id="rename" name="rename" value="{{old('rename')}}" class="add_ipt" style="width: 50%;" />（必填）</td>
              </tr>
              <tr>
                <td align="right">手机</td>
                <td style="font-family:'宋体';">
                  <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="add_ipt" style="width: 50%;" />（必填）
                </td>
              </tr>
              <tr>
                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';">
                  <input type="text" id="postal_code" name="postal_code" value="{{old('postal_code')}}" class="add_ipt" style="width: 50%;"/>
                </td>
              </tr>
            </table>
            <p align="right" style="margin-right: 20px;">
              <button type="submit" class="btn_tj">确认修改</button>
            </p>
          </form>

            
        </div>
    </div>
  <!--End 用户中心 End--> 
  
<!-- Begin 底部 开始 -->
@include('home.public.footer')
<!--End 底部  结束  -->    
</div>

</body>
<script>
  setup();
</script>
  
<script>
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  function updated(obj,address) {
    $('#form2').attr('action', '/address/' + address.id);
    $('#address_id').val(address.id);
    $('#rename').val(address.rename);
    $('#phone').val(address.phone);
    $('#address').val(address.address);
    $('#postal_code').val(address.postal_code);
  }

  $('#form2').submit(function() {
    let action = $('#form2').attr('action');
    if (action == '') {
      alert('请先选择要修改的地址');
      return false;
    }
  });

  

  function del(obj,id) {
    $.delete = function(url, data, callback, type){
 
      if ( $.isFunction(data) ){
        type = type || callback,
            callback = data,
            data = {}
      }
     
      return $.ajax({
        url: url,
        type: 'DELETE',
        success: callback,
        data: data,
        contentType: type
      });
    }
    $.delete('/address/'+id, (res)=>{
      if (res == 'ok') {
        $(obj).parent().parent().parent().parent().remove();
      }
    });
  }

  function changeStatus(obj,id) {
    $.post('/address/'+id, function(res){
      if (res == 'ok') {
        location.reload();
      }
    });
  }

</script>
<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
