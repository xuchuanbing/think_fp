<?php
namespace Home\Controller;

use Think\Controller;

class SqkpController extends PublicController
{
    public function index()
    {
	$info['user_id'] = session("homeusers")['id'];
    	$lis = D("Zsjyw")->select();
    	$contr = strtolower(CONTROLLER_NAME);
    	$this->assign("lis",$lis);
	$this->assign('info',$info);
    	$this->assign("contr",$contr);
    	return $this->display();
    }

    public function insert()
    {
    	if(IS_POST){

    		$content = session("homeusers");
    		$data["user_id"]=$content["id"];
    		$lis = D("Zsjinfo")->find($data);

    		if(!$lis && !is_array($lis)){

    			echo show("0","请完善企业信息!!");
    		}else{
			$contents['user_id'] = $_POST["user_id"];
    			$contents['company1'] = $_POST["company1"];
    			$contents['shao'] = $_POST["shao"];
    			$contents['mony'] = $_POST["mony"];
    			$contents['huktime'] = $_POST["huktime"];
    			$contents['way'] = $_POST["way"];
    			$contents['kpob'] = $_POST["kpob"];
    			$contents['bank'] = $_POST["bank"];
    			$contents['bank_num'] = $_POST["bank_num"];

    			$reg_shao = '/^[0-9]{15,20}$/';
    			$reg_hukmony = '/^[0-9.]{1,6}$/';

    			if(!$contents['company1']){
    				echo show("0","开票单位不能为空！");
    				return false;
    			}
    			if(!$contents['shao']){
    				echo show("0","税号不能为空！");
    				return false;
    			}
	    		if(!preg_match($reg_shao,$contents['shao'])){
	    			echo show("0","税号格式不正确！！");
	    			return false;
	    		}
    			if(!$contents['mony']){
    				echo show("0","请填写汇款金额！");
    				return false;
    			}
	    		if(!preg_match($reg_hukmony,$contents['mony'])){
	    			echo show("0","请填写正确的金额！");
	    			return false;
	    		}
    			if(!$contents['huktime']){
    				echo show("0","请填写汇款时间！");
    				return false;
    			}
    			if(!$contents['way']){
    				echo show("0","请选择汇款方式！");
    				return false;
    			}else if($contents['way']=='2'){
    				if(!$contents['bank']){
    					echo show("0","请填写正确的开户行！");
    					return false;
    				}
    				if(!$contents['bank_num']){
    					echo show("0","请填写银行卡号！");
    					return false;
    				}
    				$reg_bank_num = '/^[0-9]{16,19}$/';
		    		if(!preg_match($reg_bank_num,$contents['bank_num'])){
		    			echo show("0","请填写正确的银行卡号！");
		    			return false;
		    		}

    			}
    			if(!$contents['kpob']){
    				echo show("0","请选择业务类型！");
    				return false;
    			}

                $liss = D("Zsjkp")->find($contents);
	if($liss){
               	 if($liss['addtime']<date("Y-m-d H:i:s",time()-900)){
                  	  echo show("0","请15分钟后申请！！");
                 	   return false;
               	 }
	}else{
		$contents['info_id'] = $lis['id'];

    		$message = D("Zsjkp")->insert($contents);
    			
    		if($message){
    			echo show("1","申请成功！！",$url="index.php?m=Home&c=Sqkp&a=index");
    		}else{
    			echo show("0","申请失败！！");
    		}
	}



    	}
    }
    }
}