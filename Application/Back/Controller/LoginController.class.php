<?php
namespace Back\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function login()
    {
        if(!session('adminusers')){

            return $this->display("login");
        }else{

            $this->redirect(U("/Back/Index/index"));
        }
    }

    public function dologin()
    {
    	if(IS_POST){

    		$code = $_POST['code'];

    		if(check_code($code) === false){

    			echo show("0","验证码输入有误，请重新输入!!");
                return false;
    		}else{

                if($_POST['username'] && $_POST['pass']){

                    if($_POST["username"]==C("ZSJUSER") && $_POST['pass']==C("ZSJPASS")){
                        session('adminusers.id',$_POST);
                        echo show("1",$url="index.php?m=Back&c=index&a=index");
                    }else{

                        $content['username'] = $_POST['username'];
                        $content['pass'] = zsjmd5($_POST['pass']);
                        $id = D("Backlogin")->log($content);
                        
                        if(!$id){

                            echo show("0","账号或密码有误!!");
                            return false;
                        }else{
                            if($id['status']==0){

                                echo show("0","改账号无权限访问!!");
                                return false;

                            }else{
                                session('adminusers.id',$id);
                                echo show("1",$url="index.php?m=Back&c=index&a=index");
                            }
                        }
                    }


                }else{

                    echo show("0","输入有误!!");
                    return false;

                }
            }
    	}else{

    		echo show("0","访问页面不存在!!");
            return false;
    	}

	}

    public function loginout(){

        if(session('adminusers')){

            session('adminusers',null);

            $this->redirect(U('Login/login'));
        }
        
    }

}