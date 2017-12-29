<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>发票申请平台</title>
		<link rel="stylesheet" href="/Public/zsj_fp/css/index.css" />
		<link rel="stylesheet" href="/Public/layer/layer.css" />
    </head>
	<body>
		<div class="wrap">
			<!--box-->
			<div class="pad">
				<div class="box">
					<h1>发票申请平台</h1>
					<div class="bd">
						<form class="form" onSubmit="return doSubmit()">
							<p><span>用户名：</span><input type="text" name="username" class="sy_ip" id="yhm"/></p>
							<p><span>&nbsp;&nbsp;&nbsp;密码：</span><input type="password" name="pass" class="sy_ip" id="in_pd"/></p>
							<p class="l" style="margin-top: 1px;margin-left: -6px;">
								<span>验证码：</span>
								<input type="text" name="code" class="sy_ip yzm" id="yzm"/>
								<img id="verify_img" src="index.php?m=Back&c=verify&a=verify" width="100" alt="点击更换" title="点击更换" height="40px" style="float:right; border:1px solid #c0b0b0; cursor:pointer;">
							</p>
							<input name="Submit" type="submit" value=" " class="sub" id="sub">  
						</form>
					</div>
				</div>
			</div>
			<!--box-->
		</div>

		<script src="/Public/zsj_fp/js/jquery.js"></script>
		<script src="/Public/layer/layer.js"></script>
		<script src="/Public/chajian/delog.js"></script>
		<script src="/Public/zsj_fp/js/back_login.js"></script>

		<script type="text/javascript">
			$("#verify_img").click(function() {
    				var verifyURL = "index.php?m=Back&c=verify&a=verify";
   				 var time = new Date().getTime();
   				$("#verify_img").attr({
     				 "src" : verifyURL + "&b=" + time
   				});
 			});	
		</script> 

	</body>
</html>