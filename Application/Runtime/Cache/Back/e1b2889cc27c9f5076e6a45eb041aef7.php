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
		
		<li <?php if($contr == 'index'): ?>class='active'<?php else: ?>''<?php endif; ?> ><a href="<?php echo U('index/index');?>">开票记录</a></li>
		<li <?php if($contr == 'zsjck'): ?>class='active'<?php else: ?>''<?php endif; ?> ><a href="<?php echo U('zsjck/index');?>">查看申请</a></li>
		<li <?php if($contr == 'zsjtj'): ?>class='active'<?php else: ?>''<?php endif; ?> ><a href="<?php echo U('zsjtj/index');?>">添加业务</a></li>
		<li <?php if($contr == 'zsjly'): ?>class='active'<?php else: ?>''<?php endif; ?> ><a href="<?php echo U('zsjly/index');?>">查看留言</a></li>
		<li <?php if($contr == 'user'): ?>class='active'<?php else: ?>''<?php endif; ?> ><a href="<?php echo U('user/index');?>">用户管理</a></li>
		<li <?php if($contr == 'login'): ?>class='active'<?php else: ?>''<?php endif; ?> ><a href="<?php echo U('login/loginout');?>">退出系统</a></li>
	</ul>
</div>
					<div class="box_inr l">
						<form  class="form1" onSubmit="return doSubmit()">
							<p><span>权限管理：</span><br>
							<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
							<div>
							前台：<input type="radio" name="yewu" value="0" <?php if($message == '0'): ?>checked<?php else: ?>""<?php endif; ?> />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							后台：<input type="radio" name="yewu" value="1" <?php if($message == '1'): ?>checked<?php else: ?>""<?php endif; ?> /></div></p>
							<input type="submit" class="sub1" value="提交"/>
						</form>

					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		</script>
		<script src="/Public/zsj_fp/js/jquery.js"></script>
		<script src="/Public/layer/layer.js"></script>
		<script src="/Public/chajian/delog.js"></script>
		<script src="/Public/zsj_fp/js/user_p.js"></script>
	</body>
</html>