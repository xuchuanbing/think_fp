<?php
namespace Home\Controller;

use Think\Controller;

class NewyhController extends Controller
{
    public function check()
    {
    	return $this->display();
    }

    public function register()
    {
    	if(IS_POST){
			$reg = '/^[0-9a-zA-Z_]{4,9}$/';
			$reg_phone = '/^[0-9]{11}$/';

    		$content['username']=$_POST['username'];
    		$cin = D("Homelogin")->log($content);

    		if($cin){

    			echo show("0","用户名已经被注册!!");
    			return false;
    		}

    		if(!preg_match($reg,$_POST['username'])){
    			echo show("0","用户名格式不正确!!");
                return false;
    		}
    		
    		if(!preg_match($reg_phone,$_POST['phone'])){
    			echo show("0","手机号格式不正确!!");
                return false;
    		}
            $contents['phone'] = $_POST['phone'];
            $cin = D("Homelogin")->log($contents);

            if($cin){
                echo show("0","该手机号已经被注册!!");
                return false;
            }

            if($_POST['mobileCode']!=$_SESSION['mobile']['mobile_code']){
                echo show('0',"验证码输入错误！！");
                return false;
            }
            if($_POST['phone']!=$_SESSION['mobile']['mobile']){
                echo show('0',"禁止访问！！");
                return false;
            }
            
    		$content['phone'] = $_POST['phone'];
    		$content['addtime'] = date("Y-m-d H:i:s",time());
    		$content['edittime'] = date("Y-m-d H:i:s",time());
            $content['pass'] = zsjmd5($_POST['pass']);

    		$id = D("Newyh")->insert($content);

    		if($id){
                $content['id']=$id;
    			session('homeusers',$content);
    			echo show("1","注册成功!!",$url="index.php?m=Home&c=Index&a=index");

    		}else{
                
    			echo show("0","注册失败!!");
                return false;
    		}

    	}else{

    		echo show("0","页面不存在！！"); 
            return false;
    	}
    }
}