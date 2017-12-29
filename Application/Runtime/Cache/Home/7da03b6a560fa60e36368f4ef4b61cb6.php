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
			.h1, .h2, .h3, h1, h2, h3 {
			    margin-top: 4px;
			    margin-bottom: -4px;
			}
		</style>
    </head>
	<body>
		<div class="container1">
			<!--top-->
			<div class="top">发票申请平台</div>
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
						<form>
							<div class="zx">
								<div class="bt clearFix">
									<h2>标题:</h2>
									<em><input type="text" name="title" /></em>
								</div>
								<div class="bt2 clearFix">
									<h2 class="h21">内容:</h2>
									<em><textarea class="con" name="content"></textarea></em>
								</div>
								<input type="button" class="but" value='提交' style="margin: 10px;padding: 10px;margin-left: 417px;width: 122px;cursor:pointer;">
							    <div class="bt3"><h3>以下为历史咨询内容</h3></div>
							    <div class="tab">
							    	<table border="1">
							    		<tr>
							    			<th>标题</th>
							    			<th>时间</th>
							    			<th>处理情况</th>
							    		</tr>
							    		<?php if(is_array($lis)): $i = 0; $__LIST__ = $lis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							    			<td><?php echo ($vo["company_title"]); ?></td>
							    			<td><?php echo ($vo["datetime"]); ?></td>
							    			<td hidden><?php echo ($vo["company_cont"]); ?></td>
							    			<td class="dj" style="cursor:pointer;">点击查看</td>
							    		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							    	</table>
							    </div>
    						<center>
								<div class="result page"><?php echo ($page_show); ?></div>
							</center>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="/Public/zsj_fp/js/jquery.js"></script>
		<script src="/Public/layer/layer.js"></script>
		<script src="/Public/chajian/delog.js"></script>
		<script src="/Public/zsj_fp/js/home_fpzx.js"></script>
	</body>
</html>