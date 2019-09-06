<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:75:"D:\phpStudy\WWW\myshopa\public/../application/index\view\cart\cartlist.html";i:1552016025;s:68:"D:\phpStudy\WWW\myshopa\public/../application/index\view\layout.html";i:1550888363;s:75:"D:\phpStudy\WWW\myshopa\public/../application/index\view\public\header.html";i:1551404203;s:72:"D:\phpStudy\WWW\myshopa\public/../application/index\view\public\top.html";i:1550575558;s:75:"D:\phpStudy\WWW\myshopa\public/../application/index\view\public\footer.html";i:1548039367;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__STATIC__/css/style.css" /> 
<script type="text/javascript" src="__STATIC__/js/jquery-1.11.1.min_044d0927.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery.bxslider_e88acd1b.js"></script>  
<script type="text/javascript" src="__STATIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/menu.js"></script>           
<script type="text/javascript" src="__STATIC__/js/select.js"></script>  
<script type="text/javascript" src="__STATIC__/js/lrscroll.js"></script>   
<script type="text/javascript" src="__STATIC__/js/iban.js"></script>
<script type="text/javascript" src="__STATIC__/js/fban.js"></script>
<script type="text/javascript" src="__STATIC__/js/f_ban.js"></script>
<script type="text/javascript" src="__STATIC__/js/mban.js"></script>
<script type="text/javascript" src="__STATIC__/js/bban.js"></script>
<script type="text/javascript" src="__STATIC__/js/hban.js"></script>
<script type="text/javascript" src="__STATIC__/js/tban.js"></script>   
<script type="text/javascript" src="__STATIC__/js/lrscroll_1.js"></script>
<script type="text/javascript" src="__STATIC__/layui/layui.js"></script>

<script type="text/javascript" src="__STATIC__/js/p_tab.js"></script>    
<script type="text/javascript" src="__STATIC__/js/shade.js"></script>
<link rel="stylesheet" type="text/css" href="__STATIC__/css/ShopShow.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/MagicZoom.css" />
<script type="text/javascript" src="__STATIC__/js/MagicZoom.js"></script> 
<script src="__STATIC__/jquery-3.1.1.min.js"></script>

<script type="text/javascript" src="__STATIC__/js/num.js">
    

    var jq = jQuery.noConflict();
</script>  
    
<title>崔芳芳</title>
</head>
<body>  
<!--Begin Header Begin-->


<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">
                    	<h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
            <?php if(\think\Session::get('userInfo.user_id') == ''): ?>
            <span class="fl">你好，请<a href="<?php echo url('Login/login'); ?>">登录</a>
                &nbsp; <a href="<?php echo url('Login/register'); ?>" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
            <?php else: ?>
            欢迎<a style="color:#008cff"><?php echo \think\Session::get('userInfo.user_email'); ?></a>登陆
            <?php endif; ?>
           
        	<span class="ss">
            	<div class="ss_list">
                	<a href="#">个人中心</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="<?php echo url('User/index'); ?>">个人中心</a></li>
                                <li><a href="<?php echo url('Login/secede'); ?>">退出</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <!-- <div class="ss_list">
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
                </div> -->
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="__STATIC__/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<script type="text/javascript" src="__STATIC__/js/n_nav.js"></script>
<div class="top">
    <div class="logo"><a href="Index.html"><img src="__STATIC__/images/logo.png" /></a></div>
    <div class="search">
    	<form>
        	<input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
    	<div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
       		<!--Begin 购物车未登录 Begin-->
        	<div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
            	<li>
                	<div class="img"><a href="#"><img src="__STATIC__/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="__STATIC__/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="__STATIC__/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin-->    
    	<div class="nav">
            <div class="nav_t">全部商品分类</div>
            <?php if($controllerName == 'Index'): $var = 'leftNav'; else: $var = 'leftNav none'; endif; ?>
            <div class="<?php echo $var; ?>">
                    <ul>  
                            <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>    
                            <li>
                                <div class="fj">
                                    <span class="n_img"><span></span><img src="__STATIC__/images/nav1.png" /></span>
                                    <span class="fl"><?php echo $v['cate_name']; ?></span>
                                </div>
                                <div class="zj" style="top:-<?php echo $key*40; ?>px">
                                    <div class="zj_l"> 
                                            <?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>   
                                        <div class="zj_l_c">
                                            <h2><?php echo $vv['cate_name']; ?></h2>
    
                                            <?php if(is_array($vv['son']) || $vv['son'] instanceof \think\Collection || $vv['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>   
                                            <a href="#"><?php echo $vvv['cate_name']; ?></a>|
                                            <?php endforeach; endif; else: echo "" ;endif; ?> 
    
                                        </div>
                                        <?php endforeach; endif; else: echo "" ;endif; ?> 
                                       
                                    </div>
                                    <div class="zj_r">
                                        <a href="#"><img src="__STATIC__/images/n_img1.jpg" width="236" height="200" /></a>
                                        <a href="#"><img src="__STATIC__/images/n_img2.jpg" width="236" height="200" /></a>
                                    </div>
                                </div>
                            </li> 
                            <?php endforeach; endif; else: echo "" ;endif; ?>          	
                        </ul>          
            </div>
        </div>  
        <!--End 商品分类详情 End-->                                                     
    	<ul class="menu_r"> 
                <li><a href="<?php echo url('Index/index'); ?>">首页</a></li>                                                                                                                                              
                <li><a href="<?php echo url('Goods/goodsList'); ?>">全部商品</a></li>
                <?php if(is_array($navInfo) || $navInfo instanceof \think\Collection || $navInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $navInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('Goods/goodsList'); ?>?cate_id=<?php echo $v['cate_id']; ?>&&cate_name=<?php echo $v['cate_name']; ?>"><?php echo $v['cate_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="__STATIC__/images/img1.jpg" />        
    </div>
    
   <!--Begin 第一步：查看购物车 Begin -->
   <div class="content mar_20">
    <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
      <tr>
        <td class="car_th" width="150"><input type="checkbox" class="checkbox"></td>
        <td class="car_th" width="490">商品名称</td>
        <td class="car_th" width="150">购买数量</td>
        <td class="car_th" width="150">单价</td>
        <td class="car_th" width="130">小计</td>
        <td class="car_th" width="150">操作</td>
      </tr>
      <?php if(is_array($cartInfo) || $cartInfo instanceof \think\Collection || $cartInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cartInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
      <tr goods_id=<?php echo $v['goods_id']; ?> goods_num=<?php echo $v['goods_num']; ?> goods_name=<?php echo $v['goods_name']; ?> goods_price=<?php echo $v['goods_price']; ?> goods_img=<?php echo $v['goods_img']; ?>>
          <td class="car_th" width="150"><input type="checkbox" class="box"></td>
        <td class="aa">
            <div class="c_s_img">
                <img src="__ROOT__/uploads/<?php echo $v['goods_img']; ?>" width="73" height="73" />
            </div>
            <span class="goods_name"><?php echo $v['goods_name']; ?></span>
        </td>
       
        <td align="center">
            <div class="c_num">
                <input type="button" value=""  id="jian"class="car_btn_1" />
                <input type="text" value="<?php echo $v['buy_num']; ?>" id="buy_num"name=""  class="car_ipt" />  
                <input type="button" value="" id="jia" class="car_btn_2" />
            </div>
        </td>
        <td align="center" style="color:#ff4e00;">
          <span style="text-decoration:line-through;">￥<?php echo $v['market_price']; ?></span><br>
          ￥<span class="pricea"><?php echo $v['goods_price']; ?></span>              
        </td>
        <td align="center" class="total" style="color:#ff4e00;"><span><?php echo $v['goods_price']*$v['buy_num']; ?></span>￥</td>
        <td align="center"><a id="del">删除</a>&nbsp; &nbsp;
      
            <a href="#" id="praise">加入收藏</a>
        </td>
           
            <!-- <a href="#" id="praise">已经收藏</a></td> -->
           
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      <tr height="70">
          <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            <label class="r_rad">
            <input type="checkbox" name="clear" />
          <input type="button" name="clear" id="delete" value="清空购物车">
          <!-- <input type="button" name="clear" id="praise" value="收藏"> -->
          </label>
            <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥0</b></span>
        </td>
      </tr>
      <tr valign="top" height="150">
          <td colspan="6" align="right">
            <a href="<?php echo url('index/index'); ?>"><img src="__STATIC__/images/buy1.gif" /></a>&nbsp; &nbsp; 
            <a href="#"><img src="__STATIC__/images/buy2.gif" / id="confirmCount"></a>
        </td>
      </tr>
    </table>
    
</div>
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="__STATIC__/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-删除商品 End-->
    <script>
       $(function(){
           layui.use(['layer'],function(){
            var layer=layui.layer;
            //    var _td=$("tr").find("td[class='total']");
            //    //console.log(_td);
            //    var count=0;
            //    _td.each(function(index){
            //        count+=parseInt($(this).find("span").text());
            //    })
            //    //console.log(count);
            //    $("tr").find("span[class='fr']").find("b").text(count);
       
           //点击减号
           $(document).on("click","#jian",function(){
               var _this=$(this);
               var buy_num=parseInt(_this.next("input").val());
               //console.log(buy_num);
               var goods_id=_this.parents("tr").attr("goods_id");
               
               if(buy_num<=1){
                   _this.prop('disabled',true);
               }else{
                   buy_num-=1;
                   _this.next("input").val(buy_num);
                   _this.siblings("input[class='car_btn_2']").prop('disabled',false);
               }
               
               //小计

               //传入控制器
               $.post(
                "<?php echo url('cart/changePrice'); ?>",
                {goods_id:goods_id,buy_num:buy_num},
                function(res){
                  //小计
                  var goods_price=parseInt(_this.parents().next("td").find("span").last().text());
                    //console.log(goods_price);
                    var a=goods_price*buy_num;
                    // console.log(a);
                    _this.parents().next("td").next("td").find("span").text(a)
                    getCountprice()
                }
                );
           })
           //点击加号
           $(document).on("click",".car_btn_2",function(){
               //改变js页面价格
               var _this=$(this);
               var buy_num=parseInt(_this.prev("input").val());
             //  console.log(buy_num);
                var goods_num=_this.parents("tr").attr("goods_num");
               //console.log(goods_num);
                var goods_id=_this.parents("tr").attr("goods_id");
               // console.log(goods_id);
               if(buy_num>=goods_num){
                     _this.prop('disabled',true);
                  }else{ 
                        buy_num+=1;
                        _this.prev('input').val(buy_num);
                        _this.siblings("input[class='car_btn_1']").prop('disabled',false);
                }
                //传入控制器
                $.post(
                "<?php echo url('cart/changePrice'); ?>",
                {goods_id:goods_id,buy_num:buy_num},
                function(res){
                //小计
                    var goods_price=parseInt(_this.parents().next("td").find("span").last().text());
                    //console.log(goods_price);
                    var a=goods_price*buy_num;
                    // console.log(a);
                    _this.parents().next("td").next("td").find("span").text(a)
                    getCountprice()
                }
                    );
             
            }) 
            //失去焦点
           $(document).on("blur","#buy_num",function(){
              // alert ("1");
              var _this=$(this);
              var buy_num=parseInt(_this.val());
              var goods_num=_this.parents("tr").attr("goods_num");
              var goods_id=_this.parents("tr").attr("goods_id");
              //console.log(buy_num);
              var reg=/^[1-9]\d*$/;
              if(!reg.test(buy_num)){
                  _this.val(1);
              }else if(buy_num<=1){
                _this.val(1);
              }else if(buy_num>=goods_num){
                _this.val(goods_num);
              }else{
                _this.val(buy_num);
              }
                buy_num=parseInt(_this.val());
               //传入控制器
               $.post(
                "<?php echo url('cart/changePrice'); ?>",
                {goods_id:goods_id,buy_num:buy_num},
                function(res){
                //小计
               
                    var goods_price=parseInt(_this.parents().next("td").find("span").last().text());
                    //console.log(goods_price);
                    var a=goods_price*buy_num;
                    // console.log(a);
                    _this.parents().next("td").next("td").find("span").text(a)
                   
                }
                );
               
           })  
            //复选框
            $(document).on("click",".box",function(){
                //alert ('2');
                getCountprice()
          
            })
            //全选
            $(document).on("click",".checkbox",function(){
                var _this=$(this);
                var ststus=_this.prop('checked');
                $('.box').prop("checked",ststus);
                getCountprice()
                //alert ('2');
            })
            //点击复选框总价变化（方法）
            function getCountprice(){
                var box=$(".box");
                var goods_id='';
                box.each(function(index){
                    if($(this).prop("checked")==true){
                        goods_id+=$(this).parents("tr").attr("goods_id")+',';
                    }
                });
                     goods_id=goods_id.substr(0,goods_id.length-1);
              //console.log(goods_id);
              $.post(
                  "<?php echo url('cart/getCountPrice'); ?>",
                  {goods_id:goods_id},
                  function(res){
                    $(".fr").find('b').text('￥'+res);
                  }
              )
            }
            //点击删除
            $(document).on("click","#del",function(){
                //alert("a");
                var _this=$(this);
                var goods_id=_this.parents("tr").attr("goods_id");
                layer.confirm('是否删除？',{icon:3,title:'提示'},function(){
                    $.post(
                        "<?php echo url('Cart/cartdelete'); ?>",
                        {goods_id,goods_id},
                        function(res){
                            layer.msg(res.font,{icon:res.code});
                            getCountprice()
                            if(res.code==1){
                                _this.parents('tr').remove();
                            }
                        },
                        'json'
                    )
                })
            })
            //清空购物车
            $(document).on("click","#delete",function(){
                //alert('2');
                var _this=$(this);
                layer.confirm('是否全部删除',{icon:3,title:'提示'},function(index){
                    $.post(
                    "<?php echo url('cart/alldel'); ?>",
                    function(res){
                        layer.msg(res.font,{icon:res.code});
                       // console.log(res);
                        if(res.code==1){
                     
                        location.href="<?php echo url('cart/cartlist'); ?>"
                        
                        layer.close(index);
                        }
                    },
                    'json'
                    );             
                }) 

            })
            //收藏
            $(document).on("click","#praise",function(){
                var res=checkLogin();
                if(res=='true'){
                // alert(222);
                var _this=$(this);
                var goods_name=_this.parents("tr").attr("goods_name");
                var goods_price=_this.parents("tr").attr("goods_price");
                var goods_img=_this.parents("tr").attr("goods_img");
              
                var goods_id=_this.parents("tr").attr("goods_id");

                $.post(
                    "<?php echo url('cart/praise'); ?>",
                     {goods_id:goods_id,goods_name:goods_name,goods_price:goods_price,goods_img:goods_img},
                     function(res){
                         layer.msg(res.font,{icon:res.code});
                       // console.log(res);
                    
                     },
                     'json'
                )
                }else{
                    layer.msg("请登录",{icon:2,time:2000},function(){
                    location.href="<?php echo url('Login/login'); ?>";
                   })
                }
               
            })
            //确认结算
            $(document).on("click","#confirmCount",function(){
                // alert("2");
               var res=checkLogin();
               if(res=='true'){
                
                   var box=$(".box");
                   var goods_id='';
                   box.each(function(index){
                       if($(this).prop("checked")==true){
                           goods_id+=$(this).parents("tr").attr("goods_id")+',';
                       }
                   })
                 //  console.log(goods_id);
                var  goods_id=goods_id.substr(0,goods_id.length-1);
                 //console.log(goods_id);
                 location.href="<?php echo url('Order/confirmCount'); ?>?goods_id="+goods_id;
               }else{
                   layer.msg("请登录",{icon:2,time:2000},function(){
                    location.href="<?php echo url('Login/login'); ?>";
                   })
               }
            })
            //看看是否登陆
            function checkLogin(){
                $.ajax({
                    type:'post',
                    url:"<?php echo url('Order/checkLogin'); ?>",
                    async:false,
                    dataType:'json',
                    success:function(res){
                      status = res.login_status;
                     //console.log(res);
                    }
                })
               return status;
            }
        })
       })
    </script>
    
   
<div class="b_btm_bg b_btm_c">
    <div class="b_btm">
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
          <tr>
            <td width="72"><img src="__STATIC__/images/b1.png" width="62" height="62" /></td>
            <td><h2>正品保障</h2>正品行货  放心购买</td>
          </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
          <tr>
            <td width="72"><img src="__STATIC__/images/b2.png" width="62" height="62" /></td>
            <td><h2>满38包邮</h2>满38包邮 免运费</td>
          </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
          <tr>
            <td width="72"><img src="__STATIC__/images/b3.png" width="62" height="62" /></td>
            <td><h2>天天低价</h2>天天低价 畅选无忧</td>
          </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
          <tr>
            <td width="72"><img src="__STATIC__/images/b4.png" width="62" height="62" /></td>
            <td><h2>准时送达</h2>收货时间由你做主</td>
          </tr>
        </table>
    </div>
</div>
<div class="b_nav">
    <dl>                                                                                            
        <dt><a href="#">新手上路</a></dt>
        <dd><a href="#">售后流程</a></dd>
        <dd><a href="#">购物流程</a></dd>
        <dd><a href="#">订购方式</a></dd>
        <dd><a href="#">隐私声明</a></dd>
        <dd><a href="#">推荐分享说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">配送与支付</a></dt>
        <dd><a href="#">货到付款区域</a></dd>
        <dd><a href="#">配送支付查询</a></dd>
        <dd><a href="#">支付方式说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">会员中心</a></dt>
        <dd><a href="#">资金管理</a></dd>
        <dd><a href="#">我的收藏</a></dd>
        <dd><a href="#">我的订单</a></dd>
    </dl>
    <dl>
        <dt><a href="#">服务保证</a></dt>
        <dd><a href="#">退换货原则</a></dd>
        <dd><a href="#">售后服务保证</a></dd>
        <dd><a href="#">产品质量保证</a></dd>
    </dl>
    <dl>
        <dt><a href="#">联系我们</a></dt>
        <dd><a href="#">网站故障报告</a></dd>
        <dd><a href="#">购物咨询</a></dd>
        <dd><a href="#">投诉与建议</a></dd>
    </dl>
    <div class="b_tel_bg">
        <a href="#" class="b_sh1">新浪微博</a>            
        <a href="#" class="b_sh2">腾讯微博</a>
        <p>
        服务热线：<br />
        <span>400-123-4567</span>
        </p>
    </div>
    <div class="b_er">
        <div class="b_er_c"><img src="__STATIC__/images/er.gif" width="118" height="118" /></div>
        <img src="__STATIC__/images/ss.png" />
    </div>
</div>    
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="__STATIC__/images/b_1.gif" width="98" height="33" /><img src="__STATIC__/images/b_2.gif" width="98" height="33" /><img src="__STATIC__/images/b_3.gif" width="98" height="33" /><img src="__STATIC__/images/b_4.gif" width="98" height="33" /><img src="__STATIC__/images/b_5.gif" width="98" height="33" /><img src="__STATIC__/images/b_6.gif" width="98" height="33" />
    </div>    	
</div>


<!--End Footer End -->    