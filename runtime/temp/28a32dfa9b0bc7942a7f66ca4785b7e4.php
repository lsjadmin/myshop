<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\phpStudy\WWW\myshopa\public/../application/index\view\login\register.html";i:1551939012;}*/ ?>
<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="__STATIC__/index/login/amazeui.css" />
		<link href="__STATIC__/index/login/dlstyle.css" rel="stylesheet" type="text/css">
		<link href="__STATIC__/layui/css/layui.css" rel="stylesheet" type="text/css">

		<script src="__STATIC__/layui/layui.js"></script>
		<script src="__STATIC__/index/login/jquery-3.2.1.min.js"></script>
		<script src="__STATIC__/index/login/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="__STATIC__/index/login/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="__STATIC__/index/login/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<!--邮箱注册-->
								<div class="am-tab-panel am-active">
									<form method="post" class="layui-form">

										<div class="user-email">
											<label for="email"><i class="am-icon-envelope-o"></i></label>
											<!-- lay-verify="required|email" -->
											<input type="email" name="user_email"  id="email"placeholder="请输入邮箱账号">
										</div>
										<div class="verification">
											<label for="email_code"><i class="am-icon-code-fork"></i></label>
											<!-- lay-verify="required" -->
											<input type="text" name="user_code" id="email_code"  placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);"  id="sendEmailCode">
												<span class="dyButton" id="span_email">获取</span>
											</a>
										</div>
										<div class="user-pass">
											<label for="email_pwd"><i class="am-icon-lock"></i></label>
											<!-- lay-verify="checkpwd1" -->
											<input type="password" name="user_pwd" id="email_pwd" placeholder="设置密码">
										</div>
										<div class="user-pass">
											<label for="email_pwd1"><i class="am-icon-lock"></i></label>
											<!-- lay-verify="checkpwd2" -->
											<input type="password" name="user_pwd1" id="email_pwd1"   placeholder="确认密码">
										</div>
										<div class="am-cf">
											<input type="button" id="sendEmailCode" lay-submit lay-filter="telDemo" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
									</form>




								</div>
								<!--手机号注册-->
								<div class="am-tab-panel">
									<form method="post" class="layui-form">
										<div class="user-phone">
											<label for="tel"><i class="am-icon-mobile-phone am-icon-md"></i></label>
											<input type="tel" name="user_tel" lay-verify="required|phone"  id="tel" placeholder="请输入手机号">
										</div>
										<div class="verification">
											<label for="tel_code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="user_code" lay-verify="required" id="tel_code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" id="sendTelCode">
												<span class="dyButton" id="span_tel">获取</span>
											</a>
										</div>
										<div class="user-pass">
											<label for="tel_pwd"><i class="am-icon-lock"></i></label>
											<input type="password" name="user_pwd" lay-verify="checkpwd1" id="tel_pwd" placeholder="设置密码">
										</div>
										<div class="user-pass">
											<label for="tel_pwd1"><i class="am-icon-lock"></i></label>
											<input type="password" name="user_pwd1" lay-verify="checkpwd2" id="tel_pwd1" placeholder="确认密码">
										</div>
										<div class="am-cf">
											<input type="button" lay-submit lay-filter="telDemo" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
									</form>

								</div>
								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>
							</div>
						</div>

				</div>
			</div>
			
			<div class="footer ">
				<div class="footer-hd ">
					<p>
						<a href="# ">恒望科技</a>
						<b>|</b>
						<a href="# ">商城首页</a>
						<b>|</b>
						<a href="# ">支付宝</a>
						<b>|</b>
						<a href="# ">物流</a>
					</p>
				</div>
				<div class="footer-bd ">
					<p>
						<a href="# ">关于恒望</a>
						<a href="# ">合作伙伴</a>
						<a href="# ">联系我们</a>
						<a href="# ">网站地图</a>
						<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
					</p>
				</div>
			</div>
	</body>

</html>
<script>
	$(function(){
		layui.use(['form','layer'],function(){
			var layer=layui.layer;
			var form=layui.form;
			//点击获取
			var emailFlag=false;
			$("#sendEmailCode").click(function(){
				var email=$("#email").val();
				//console.log(email);
				//验证
				var reg=/^\w+@\w+\.com$/;
				if(email==''){
					layer.msg('邮箱必填',{icon:2});
					return false;
				}else if(!reg.test(email)){
					layer.msg('请填写正确邮箱格式',{icon:2});
					return false;
				}else{
					$.ajax({
						method:"post",
						url:"<?php echo url('Login/checkEmail'); ?>",
						data:{email:email},
						async:false,
						success:function(res){
							if(res.code=='2'){
								layer.msg(res.font,{icon:res.code});
								emailFlag=false;
							}else{
								emailFlag=true;
							}
						},
						dataType:'json'

					})
					if(emailFlag==false){
						return emailFlag;
					}	
				}
				//秒数倒计时
				$("#span_email").text(60+'s');
				_time=setInterval(go,1000);
				
				//发送邮件
					$.post(
					"<?php echo url('Login/sendEmail'); ?>",
					{email:email},
					function(res){
						//console.log(res);
						layer.msg(res.font,{icon:res.code});
					},
					'json'
				)
			})
			//获取秒数
			function go(){
				var secode=parseInt($("#span_email").text());
				//console.log(secode);
				//判断计时器如果是0
				if(secode==0){
					$('#span_email').text('获取');
					//终止秒数 clearInterval
					clearInterval(_time);
					//可以点击
					$('#sendEmailCode').css('pointerEvents','auto');
				}else{
					var s=secode-1;
					$("#span_email").text(s+'s')
					//倒计时过程中不能再次点击
					$('#sendEmailCode').css('pointerEvents','none');
				}
			}
		// 	form.verify({
		// 	useremail: function(value, item){ //value：表单的值、item：表单的DOM对象
		// 	var reg=/^[a-z]\w{3,10}$/;
		// 	if(!reg.test(value)){
		// 		return '用户允许用数字 字母 下划线 4到12位';
		// 	}s
		// 	}
		// })
			//注册
			form.on('submit(telDemo)',function(data){
				$.post(
					"<?php echo url('Login/register'); ?>",
					data.field,
					function(res){
					//	console.log(res);
						layer.msg(res.font,{icon:res.code});
						if(res.code==1){
							location.href="<?php echo url('Login/login'); ?>";
						}
						
					},
					'json'
				)
			})
		 })
	});
</script>