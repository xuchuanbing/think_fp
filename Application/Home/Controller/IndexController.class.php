<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends PublicController
{
    public function index()
    {
    	$arr = session("homeusers");
    	$contr = strtolower(CONTROLLER_NAME);
        	$arr_user["user_id"] = $arr["id"];
        	$arrss = D("Zsjinfo")->find($arr_user);
        	$this->assign("arrss",$arrss);
    	$this->assign("arr",$arr);
    	$this->assign("contr",$contr);
    	return $this->display();
    }

    public function insert(){
    	if(IS_POST){

			$content['user_id']=$_POST['user_id'];

    		if($content && is_array($content)){

    			$arrs = D("Zsjkp")->find($content);
                
                if($arrs['status']==1){
                    echo show("0","已经申请发票，不能修改!!");
                    return false;
                }
		$infos = I('post.');
		$arrs = D("Zsjinfo")->find($infos);
    			if($arrs){   

    				echo show("0","信息已经完善，请勿重复提交");
                    return false;

    			}else{

                    //$arr = session("homeusers");
                    $ar['user_id'] = $_POST['user_id'];
                    $ars = D("Zsjinfo")->find($ar);

    				if(!$ars){
					$infos['addtime'] = date("Y-m-d H:i:s",time());
		    			$id = D("Zsjinfo")->insert($infos);
		    			

		    			if($id && is_numeric($id)){
                            session('message',$infos);
		    				echo show("1","信息完善成功!!",$url="index.php?m=Home&c=Index&a=index");
		    			}else{

		    				echo show("0","信息完善失败");
                            return false;
		    			}

	    			}else{
					$infos['addtime'] = date("Y-m-d H:i:s",time());

		    			$id = D("Zsjinfo")->insert($infos);

		    			session('message',$infos);

		    			if($id && is_numeric($id)){
		    				
		    				echo show("1","信息完善成功!!",$url="index.php?m=Home&c=Index&a=index");
		    			}else{

		    				echo show("0","信息完善失败");
                            return false;
		    			}

	    			}
				}

    		}else{

    			echo show("0","访问页面不存在!!");
                return false;
    		}

    	}else{

    		echo show("0","访问页面不存在!!");
            return false;
    	}
    }
}