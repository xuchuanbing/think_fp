<?php
namespace Back\Controller;

use Think\Controller;

class ZsjlyController extends PublicController
{
    public function index()
    {
    	$data = array();
    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
    	$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 15;

    	$lis = D("Zsjly")->getMenus($data,$page,$pageSize);

        $menusCount = D("Zsjly")->getMenusCount($data);
        $datas["status"]="0";
    	$menusCounts = D("Zsjly")->getMenusCount($datas);

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
    	$this->assign('lis',$lis);
              $this->assign("contr",$contr);
    	$this->assign("menusCounts",$menusCounts);
    	return $this->display();
    }

    public function update(){
        if(IS_POST){
            if($_POST){
                $id = $_POST['id'];
                $data['status'] = "1";
                $id = D("Zsjly")->update($data,$id);
                echo $id;
            }
        }
    }
}