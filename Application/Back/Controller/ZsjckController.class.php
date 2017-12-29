<?php
namespace Back\Controller;

use Think\Controller;

class ZsjckController extends PublicController
{
    public function index()
    {

        $data = array();
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 15;

        $lis = D("Zsjkp")->log($data,$page,$pageSize);
        $menusCount = D("Zsjkp")->log0($data);

        $res = new \Think\Page($menusCount,$pageSize);
        $res->lastSuffix = false;//最后一页不显示为总页数
        $res->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $res->setConfig('prev','上一页');
        $res->setConfig('next','下一页');
        $res->setConfig('last','末页');
        $res->setConfig('first','首页');
        $res->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $page_show = bootstrap_page_style($res->show());//重点在这里

    	$contr = strtolower(CONTROLLER_NAME);

        $this->assign('page_show',$page_show);
    	$this->assign("contr",$contr);
    	$this->assign("lis",$lis);
    	return $this->display();
    }

    public function gets(){
    	if(IS_GET){

    		$data['id'] = $_GET['id'];
    		$lis = D("Zsjkp")->find($data);

    		if($lis && is_array($lis)){

    			if(!$lis['company'] && !$lis['address'] && !$lis['mony'] && !$lis['phone'] && !$lis['shao'] && !$lis['kpob'] && !$lis['huktime'] && !$lis['way']){
    				echo show("0","信息不完善，开票失败！");
    				return false;
    			}
    			if($lis['status']==0){
    				$datas['status'] = 1;
                    $datas['action'] = $_GET['kd'];
    				$mess = D("Zsjkp")->update($datas,$data['id']);
    				if($mess){
    					echo show("1","开票成功！！","index.php?m=Back&a=Zsjck&a=index");
    				}else{
    					echo show("0","开票失败或已开票！！");
    					return false;
    				}
    			}else{
    				echo show("0","已开票！！");
    				return false;
    			}
    		}else{
    			echo show("0","页面不存在！！");
    			return false;
    		}
    	}else{
    		echo show("0","页面不存在！！");
    		return false;
    	}
    }
}