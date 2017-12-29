<?php
namespace Home\Controller;

use Think\Controller;

class XgmmController extends Controller
{
    public function index()
    {
    	$contr = strtolower(CONTROLLER_NAME);
    	$this->assign("contr",$contr);
    	return $this->display();
    }

    public function zhhmm(){
    	if(IS_POST){

    		$reg_phone = '/^[0-9]{11}$/';
    		if(!$_POST['phone']){
    			echo show("0","请输入正确的手机号!!");
                return false;
    		}
    		if(!preg_match($reg_phone,$_POST['phone'])){
    			echo show("0","手机号格式不正确!!");
                return false;
    		}
    		if(!$_POST['mobileCode']){
    			echo show("0","请输入正确的手机号!!");
                return false;
    		}

    		if(!$_POST['pass']){
    			echo show("0","请输入密码!!");
                return false;
    		}

            if($_POST['mobileCode']!=$_SESSION['mobile']['mobile_code']){
                echo show('0',"验证码输入错误！！");
                return false;
            }

            if($_POST['phone'] != $_SESSION['mobile']['mobile']){
                echo show('0',"禁止访问！！");
                return false;
            }

            $contentss['phone'] = $_POST['phone'];
            $arr = D("Newyh")->find($contentss);

            if($arr){
            	$contentsss['pass'] = zsjmd5($_POST['pass']);

            	$messages = D("Newyh")->update($contentsss,$arr['id']);

    			if($messages){
    				echo show("1","密码找回成功！！",$url="index.php?m=Home&c=Login&a=login");
    			}else{
    				echo show("0","申请失败！！");
    			}


            }else{
            	echo show('0',"该手机号未注册!!");
            }

    	}
    }
}