<?php
namespace Home\Controller;

use Think\Controller;

class FpzxController extends PublicController
{
    public function index()
    {
    	$data['user_id'] = session('homeusers')['id'];

        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $REQUEST['pageSize'] ? $REQUEST['pageSize'] : 15;

        $lis = D("Zsjly")->sels($data,$page,$pageSize);
        $menusCount = D("Zsjly")->getMenusCount($data);

        $res = new \Think\Page($menusCount,$pageSize);
        $res->lastSuffix = false;//最后一页不显示为总页数
        $res->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $res->setConfig('prev','上一页');
        $res->setConfig('next','下一页');
        $res->setConfig('last','末页');
        $res->setConfig('first','首页');
        $res->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $page_show = bootstrap_page_style($res->show());//重点在这里


    	//$lis = D('Zsjly')->sels($data);
    	$contr = strtolower(CONTROLLER_NAME);
        $this->assign("page_show",$page_show);
    	$this->assign("lis",$lis);
    	$this->assign("contr",$contr);
    	return $this->display();
    }

    public function insert(){
    	if(IS_POST){
    		if($_POST['title']){
    			$content['company_title'] = $_POST['title'];
    		}else{
    			echo show("0","请输入标题！！");
    			return false;
    		}
    		if($_POST['content']){
    			$content['company_cont'] = $_POST['content'];
    		}else{
    			echo show("0","请输入内容！");
    			return false;
    		}
    		$content['user_id'] = session("homeusers")['id'];

    		//print_r($content);die;
    		$id = D('Zsjly')->find($content);
    		if($id){
    			echo show('0',"信息已经提交，请勿重复提交！！");
    			return false;
    		}else{
                $content['datetime'] = date("Y-m-d H:i:s",time());
                //print_r($content);die;
	    		$id = D('Zsjly')->insert($content);
	    		if($id){
	    			echo show("1","提交成功！！",$url="index.php?m=Home&c=fpzx&a=index");
	    		}else{
	    			echo show("0","提交失败！！");
	    			return false;
	    		}		
    		}

    	}else{

    		echo show("0","页面不存在！！");
    		return false;
    	}
    }
}