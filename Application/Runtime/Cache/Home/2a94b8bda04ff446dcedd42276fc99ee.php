<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>发票申请平台</title>
		<link rel="stylesheet" href="/Public/zsj_fp/css/index.css" />
    </head>
	<body>
		<div class="container">
			<!--top-->
			<div class="top">
				发票申请平台
			</div>
			<!--bottom-->
			<div class="bottom">
				<div class="bot_in pad">
					<div class="box_inl l">
	<ul>
	<?php isset($contr)?$contr:$contr="index"; ?>
		<li <?php if($contr == 'index'): ?>class="active"<?php else: ?>class<?php endif; ?>><a href="<?php echo U('index/index');?>">企业信息</a></li>
		<li <?php if($contr == 'sqkp'): ?>class="active"<?php else: ?>class<?php endif; ?>><a href="<?php echo U('sqkp/index');?>">申请开票</a></li>
		<li <?php if($contr == 'fpcx'): ?>class="active"<?php else: ?>class<?php endif; ?>><a href="<?php echo U('fpcx/index');?>">发票查询</a></li>
		<li <?php if($contr == 'fpzx'): ?>class="active"<?php else: ?>class<?php endif; ?>><a href="<?php echo U('fpzx/index');?>">发票咨询</a></li>
		<!-- <li <?php if($contr == 'xgma'): ?>class="active"<?php else: ?>class<?php endif; ?>><a href="<?php echo U('xgma/index');?>">修改密码</a></li> -->
		<li><a href="<?php echo U('login/loginout');?>">退出系统</a></li>
	</ul>
</div>
					<div class="box_inr l">

						<form  class="form1" onsubmit="return doSubmit()">

							<input type="hidden" name="user_id" value="<?php echo ($arr['id']); ?>">

							<p><span>开票单位：</span><input type="text" name="company" class="txt" value="<?php echo ($arrss['company']); ?>" id="company"/></p>
							<p><span>收件地址：</span><input type="text" class="txt" name="address" value="<?php echo ($arrss['address']); ?>" id="address"/></p>
							<p><span>&nbsp;&nbsp;&nbsp;收件人：</span><input type="text" class="txt" value="<?php echo ($arrss['user']); ?>" name="user" id="addressee"/></p>
							<p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机：</span><input type="text" class="txt" name="phone" value="<?php echo ($arr['phone']); ?>" id="wap"/></p>
							<input type="submit" class="sub1" value="提交"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="/Public/zsj_fp/js/jquery.js"></script>
		<script src="/Public/layer/layer.js"></script>
		<script src="/Public/chajian/delog.js"></script>
		<script src="/Public/zsj_fp/js/zsj_message.js"></script>
	</body>
</html>