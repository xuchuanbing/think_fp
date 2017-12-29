<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>发票申请平台</title>
		<link rel="stylesheet" href="/Public/zsj_fp/css/index.css" />
		<link rel="stylesheet" href="/Public/layer/layer.css" />
		<style>
			.bd .form p .sy_ip{
				width: 354px;
			}
		</style>
    </head>
	<body>
		<div class="wrap">
			<!--box-->
			<div class="pad">
				<div class="box">
					<h1>发票申请平台</h1>
					<div class="bd" style="height: 275px;width: 622px;margin-left: 127px;">
						<form class="form" onSubmit="return doSubmit()">
							<p><span>用户名：</span><input type="text" name="username" placeholder="用户名/已验证手机号" class="sy_ip" id="yhm"/></p>
							<p><span>&nbsp;&nbsp;&nbsp;密码：</span><input type="password" name="pass" placeholder="请输入密码" class="sy_ip" id="in_pd"/></p>
							<div class="jzmm">
								<div class="xx clearFix">
									<label class="clearFix">
										<input type="checkbox" name="" value="" class="che"><div class="option"></div><em>记住密码</em>
									</label>
								</div>
								<a href="<?php echo U('Newyh/check');?>" style="font-size:12px;margin-right:85px;margin-top: 13px;color:#999;">新用户申请</a>
								<a href="<?php echo U('Xgmm/index');?>" style="font-size:12px;text-decoration:underline;margin-right: 18px;margin-top: 13px;text-decoration:none;color:#999;">忘记密码</a>
							</div>
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
		<script src="/Public/zsj_fp/js/home_login.js"></script>

	</body>
</html>