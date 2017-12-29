<?php
namespace Back\Controller;

use Think\Controller;

class IndexController extends PublicController
{
    public function index()
    {
        $data = array();
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 15;

        $data['status'] = "1";
        $lis = D("Zsjkp")->getMenus($data,$page,$pageSize);
        $menusCount = D("Zsjkp")->getMenusCount($data);

        $res = new \Think\Page($menusCount,$pageSize);
        $res->lastSuffix = false;//最后一页不显示为总页数
        $res->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $res->setConfig('prev','上一页');
        $res->setConfig('next','下一页');
        $res->setConfig('last','末页');
        $res->setConfig('first','首页');
        $res->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $page_show = bootstrap_page_style($res->show());//重点在这里
        $this->assign('page_show',$page_show);

    	//$show = $res->show();

        //$this->assign("show",$show);
    	$this->assign("lis",$lis);
    	return $this->display();

    }
}