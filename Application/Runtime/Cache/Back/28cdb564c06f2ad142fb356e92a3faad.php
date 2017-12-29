<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>发票申请平台</title>
		<link rel="stylesheet" href="/Public/zsj_fp/css/index.css" />
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<style type="text/css">
			.hwh-page-info a{color: #CCC;}
			.hwh-page-info a em{font-style: normal;margin: 0 2px;}
			
		</style>
    </head>
	<body>
		<div class="container1">
			<!--top-->
			<div class="top">发票查看后台管理</div>
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
						<div class="ly">
							<span>收件箱（共<i><?php echo ($menusCounts); ?></i>封未读）</span>
							<!--form-->
							<form class="form11">
								<table>
									<tr>
										<th style="">公司</th>
										<th style="">标题</th>
										<th style="">时间</th>
										<th style="">电话</th>
										<th style="">查看详情</th>
									</tr>
									<?php if(is_array($lis)): $i = 0; $__LIST__ = $lis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
										<td hidden><?php echo ($vo["id"]); ?></td>
										<td><?php echo (com($vo["user_id"])); ?></td>
										<td><?php echo ($vo["company_title"]); ?></td>
										<td><?php echo ($vo["datetime"]); ?></td>
										<td><?php echo (pho($vo["user_id"])); ?></td>
										<td hidden><?php echo ($vo["company_cont"]); ?></td>
										<td><a class="ly_xq" href="javascript:void(0)">详情</a></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>				
								</table>
							</form>
							<!--form-->
						</div>
						<center>
							<div class="result page"><?php echo ($page_show); ?></div>
						</center>
					</div>
				</div>
			</div>
		</div>
		<script src="/Public/zsj_fp/js/jquery.js"></script>
		<script src="/Public/layer/layer.js"></script>
		<script src="/Public/chajian/delog.js"></script>
		<script src="/Public/zsj_fp/js/back_zsjly.js"></script>
	</body>
</html>