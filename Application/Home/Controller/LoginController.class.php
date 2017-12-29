<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {
    	return $this->display();
    }

    public function dologin()
    {
    	if(IS_POST){

    			$content['username'] = $_POST['username'];
    			$content['pass'] = zsjmd5($_POST['pass']);
    			$id = D("Homelogin")->log($content);
                if(!$id){

                    $contents['phone'] = $_POST['username'];
                    $contents['pass'] = zsjmd5($_POST['pass']);
                    $ids = D("Homelogin")->log($contents);

                    if(!$ids){

                        echo show("0","账号或密码有误!!");
                    }else{
                        session('homeusers',$ids);
                        
                        echo show("1",$message="",$url="index.php?m=Home&c=Index&a=index");
                    }

                }else{

                    session('homeusers',$id);
                    echo show("1",$message="",$url="index.php?m=Home&c=Index&a=index");
                }

    		
    	}else{
    		echo show("0","访问页面不存在!!");
    	}
    }

    public function loginout(){

        if(session('homeusers')){

            session(null);
            //session('homeusers',null);

            $this->redirect(U('Login/login'));
        }
        
    }
}