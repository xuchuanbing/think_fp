<?php
namespace Back\Controller;

use Think\Controller;

class ZsjtjController extends PublicController
{
    public function index()
    {
        $data = array();
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 15;

        $lis = D("Zsjyw")->getMenus($data,$page,$pageSize);
        $menusCount = D("Zsjyw")->getMenusCount($data);

        $res = new \Think\Page($menusCount,$pageSize);

        $res->lastSuffix = false;//最后一页不显示为总页数
        $res->setConfig('header','<li class="disabled hwh-page-info"><a>共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</a></li>');
        $res->setConfig('prev','上一页');
        $res->setConfig('next','下一页');
        $res->setConfig('last','末页');
        $res->setConfig('first','首页');
        $res->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $page_show = bootstrap_page_style($res->show());//重点在这里

    	//$lis = D('Zsjyw')->select();
    	$contr = strtolower(CONTROLLER_NAME);
        $this->assign('page_show',$page_show);
        $this->assign("lis",$lis);
    	$this->assign("contr",$contr);
    	return $this->display();
    }

    public function add()
    {
    	$contr = strtolower(CONTROLLER_NAME);
    	$this->assign("contr",$contr);
    	return $this->display();
    }

    public function insert()
    {
        if(IS_POST){
    
            $data['yewu'] = $_POST['yewu'];
            if($data['yewu']){
                $id = D("Zsjyw")->insert($data);

                if($id){
                    echo show("1","添加成功!","index.php?m=Back&c=Zsjtj&a=index");
                }else{
                    echo show("0","添加失败!");
                }
            }else{
                echo show("0","请输入内容!!");    
            }
        }else{

            echo show("0","页面不存在!!");
        }
    }

    public function del(){
        if(IS_GET){

            $data['id'] = $_GET['id'];
            $ars = D("Zsjyw")->del($data['id']);
            if($ars){
                echo show("1","删除成功!","index.php?m=Back&c=Zsjtj&a=index");
            }else{
                echo show("0","删除失败!");
            }
        }else{

            echo show("0","页面不存在!!");
        }
        

    }
}