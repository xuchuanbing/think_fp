<?php
/**
 * [后台返回值]
 * @param  [type] $status  [状态]
 * @param  [type] $message [信息]
 * @param  [type] $url     [跳转地址]
 * @return [type]          [zsj_fp]
 */
function show($status,$message,$url){
	$data = array(
		"status" => $status,
		"message" => $message,
		"url" => $url
	);
	return json_encode($data);
}
/**
 * [验证码校验]
 * @param  [type] $code [验证码]
 * @param  string $id   [id]
 * @return [type]       [zsj_fp]
 */
function check_code($code,$id=""){

    $verify = new \Think\Verify();  
    return $verify->check($code, $id);
}
/**
 * [zsjmd5 md5加密]
 * @param  [type] $msg [密码]
 * @return [type]      [zsj_fp]
 */
function zsjmd5($msg){

	return md5(md5($msg.C("SEMD_5")));
}
/**
 * [开票项目]
 * @param  [type] $id [id]
 * @return [type]     [zsj_fp]
 */
function ywtype($id){

	$data['id'] = $id;
	$message = D("Zsjyw")->find($data);
	return $message["yewu"];
}
/**
 * [汇款方式 ]
 * @param  [type] $data [data]
 * @return [type]       [zsj_fp]
 */
function ways($data){
	if($data==3){
		return "支付宝";
	}elseif($data==1){
		return "微信";
	}elseif($data==2){
		return "银行卡";
	}
}
/**
 * [状态]
 * @param  [type] $data [id]
 * @return [type]       [zsj_fp]
 */
function sta($data){
	if($data==0){
		return "未受理";
	}elseif($data==1){
		return "已开票";
	}
}
/**
 * Thinkphp默认分页样式转Bootstrap分页样式
 * @author H.W.H
 * @param string $page_html tp默认输出的分页html代码
 * @return string 新的分页html代码
 */
function bootstrap_page_style($page_html){
    if ($page_html) {
        $page_show = str_replace('<div>','<nav><ul class="pagination">',$page_html);
        $page_show = str_replace('</div>','</ul></nav>',$page_show);

        $page_show = str_replace('<span class="current">','<li class="active"><a>',$page_show);
        $page_show = str_replace('</span>','</a></li>',$page_show);

        $page_show = str_replace(array('<a class="num"','<a class="prev"','<a class="next"','<a class="end"','<a class="first"'),'<li><a',$page_show);
        $page_show = str_replace('</a>','</a></li>',$page_show);
    }
    return $page_show;
}