<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"D:\phpStudy\WWW\myshopa\public/../application/index\view\user\membercollect.html";i:1552017029;s:68:"D:\phpStudy\WWW\myshopa\public/../application/index\view\layout.html";i:1550888363;s:75:"D:\phpStudy\WWW\myshopa\public/../application/index\view\public\header.html";i:1551404203;s:72:"D:\phpStudy\WWW\myshopa\public/../application/index\view\public\top.html";i:1550575558;s:75:"D:\phpStudy\WWW\myshopa\public/../application/index\view\public\footer.html";i:1548039367;}*/ ?>
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
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
	<div class="m_content">
   		<div class="m_left">
        	<div class="left_n">管理中心</div>
            <div class="left_m">
            	<div class="left_m_t t_bg1">订单中心</div>
                <ul>
                	<li><a href="Member_Order.html">我的订单</a></li>
                    <li><a href="Member_Address.html">收货地址</a></li>
                    <li><a href="#">缺货登记</a></li>
                    <li><a href="#">跟踪订单</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg2">会员中心</div>
                <ul>
                	<li><a href="Member_User.html">用户信息</a></li>
                    <li><a href="Member_Collect.html" class="now">我的收藏</a></li>
                    <li><a href="Member_Msg.html">我的留言</a></li>
                    <li><a href="Member_Links.html">推广链接</a></li>
                    <li><a href="#">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg3">账户中心</div>
                <ul>
                	<li><a href="Member_Safe.html">账户安全</a></li>
                    <li><a href="Member_Packet.html">我的红包</a></li>
                    <li><a href="Member_Money.html">资金管理</a></li>
                </ul>
            </div>
            <div class="left_m">
            	<div class="left_m_t t_bg4">分销中心</div>
                <ul>
                	<li><a href="Member_Member.html">我的会员</a></li>
                    <li><a href="Member_Results.html">我的业绩</a></li>
                    <li><a href="Member_Commission.html">我的佣金</a></li>
                    <li><a href="Member_Cash.html">申请提现</a></li>
                </ul>
            </div>
        </div>
		<div class="m_right">
            <p></p>
            <div class="mem_tit">
            	<span class="fr" style="font-size:12px; color:#55555; font-family:'宋体'; margin-top:5px;">共发现4件</span>我的收藏
            </div>
           	<table border="0" class="order_tab" style="width:930px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                       
                <td align="center" width="420">商品名称</td>
                <td align="center" width="180">价格</td>
                <td align="center" width="270">操作</td>
              <?php if(is_array($praiseInfo) || $praiseInfo instanceof \think\Collection || $praiseInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $praiseInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            
              <tr>
                   
                <td style="font-family:'宋体';">
                        <input type="checkbox" name="praise_id" value="<?php echo $v['praise_id']; ?>">
                	<div class="sm_img"><img src="__ROOT__/uploads/<?php echo $v['praise_img']; ?>" width="48" height="48" /></div><?php echo $v['praise_name']; ?>
                </td>
                <td align="center"><?php echo $v['praise_price']; ?></td>
                <td align="center"><a href="#">关注</a>&nbsp; &nbsp; <a href="#" style="color:#ff4e00;">加入购物车</a>&nbsp; &nbsp; 
                   <input type="hidden" id="<?php echo $v['praise_id']; ?>">
                    <a href="#" id="del">删除</a>
                </td>
              
              </tr>
             <?php endforeach; endif; else: echo "" ;endif; ?>
             <tr>
                    <a href="#" id="detale">批量删除</a>
             </tr>
            
            </table>


            
        </div>
    </div>
    <script>
        $(function(){
            layui.use(['layer'],function(){
                var layer=layui.layer;
                $(document).on("click","#del",function(){
                    var praise_id=$(this).prev("input").attr("id");
                    //console.log(praise_id);
                   $.post(
                       "<?php echo url('User/del'); ?>",
                       {praise_id:praise_id},
                       function(res){
                         layer.msg(res.font,{icon:res.code});
                       // console.log(res);
                    
                     },
                     'json'
                   )
                })
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