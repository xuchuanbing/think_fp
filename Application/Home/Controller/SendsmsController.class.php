<?php
namespace Home\Controller;

use Think\Controller;

class SendsmsController extends Controller
{
	public function sms(){
		header("Content-type:text/html; charset=UTF-8");

		$target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";

		$mobile = $_POST['mobile'];
		$contents['phone'] = $_POST['mobile'];
        $cin = D("Homelogin")->log($contents);

        if($cin){

            echo show("0","该手机号已经被注册!!");
            return false;
        }

		$send_code = $_POST['send_code'];
		$_SESSION['send_code'] = $send_code;
		//print_r($_SESSION);die;
		$mobile_code = random2(4,1);
		if(empty($mobile)){
			echo show("0",'手机号码不能为空');
			return false;
		}

		if(empty($_SESSION['send_code']) || $send_code!=$_SESSION['send_code']){
			//防用户恶意请求
			echo show('0','请求超时，请刷新页面后重试');
			return false;
		}

		$post_data = "account=cf_bjleehao&password=bjleehao&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。如非本人操作，可不用理会！");

		//密码可以使用明文密码或使用32位MD5加密
		$gets =  xml_to_array(Post($post_data, $target));

		if($gets['SubmitResult']['code']==2){
			$mobiles['mobile'] = $mobile;
			$mobiles['mobile_code'] = $mobile_code;
			$_SESSION['mobile'] = $mobiles;
			echo show("1","验证码发送成功！！");
		}else{
			//print_r($gets);
			echo show("0",$gets['SubmitResult']['msg']);
			return false;
		}
		
	}

	public function smszh(){

		header("Content-type:text/html; charset=UTF-8");

		$target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";

		$mobile = $_POST['mobile'];
		$contents['phone'] = $_POST['mobile'];
        $cin = D("Homelogin")->log($contents);

        if(!$cin){
            echo show("0","请输入注册时的手机号!!");
            return false;
        }

		$send_code = $_POST['send_code'];
		$_SESSION['send_code'] = $send_code;
		//print_r($_SESSION);die;
		$mobile_code = random2(4,1);
		if(empty($mobile)){
			echo show("0",'手机号码不能为空');
			return false;
		}

		if(empty($_SESSION['send_code']) || $send_code!=$_SESSION['send_code']){
			//防用户恶意请求
			echo show('0','请求超时，请刷新页面后重试');
			return false;
		}

		$post_data = "account=cf_bjleehao&password=bjleehao&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。如非本人操作，可不用理会！");

		//密码可以使用明文密码或使用32位MD5加密
		$gets =  xml_to_array(Post($post_data, $target));

		if($gets['SubmitResult']['code']==2){
			$mobiles['mobile'] = $mobile;
			$mobiles['mobile_code'] = $mobile_code;
			$_SESSION['mobile'] = $mobiles;
			return show("1","验证码发送成功！！");
		}else{
			//print_r($gets);
			echo show("0",$gets['SubmitResult']['msg']);
			return false;
		}

	}

}