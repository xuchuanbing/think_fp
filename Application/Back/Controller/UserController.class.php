<?php
namespace Back\Controller;

use Think\Controller;

class UserController extends PublicController
{
    public function index()
    {
        $data = array();
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 15;
	
		$lis = D("User")->getMenus($data,$page,$pageSize);

        $menusCount = D("User")->getMenusCount($data);

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
    public function edit(){
	if(IS_GET){
		$data['id'] = $_GET['id'];
	}else{
		echo show("0","非法操作!!");
		return false;
	}
    	$contr = strtolower(CONTROLLER_NAME);
	$message = D("User")->find($data);
	$this->assign("message",$message['status']);
    	$this->assign("contr",$contr);
	$this->assign("data",$data);
	return $this->display();
    }

public function update()
{
	if(IS_POST){
		$data['id'] = $_POST['id'];
		$datas['status'] = $_POST['status'];

		$info = D("User")->find($data);
		if($info){
			$id = D("User")->update($datas,$data['id']);
			if($id){
				echo show("1","修改成功!!","index.php?m=Back&c=User&a=index");
			}else{
				echo show("0","修改失败!!");
				return false;
			}
		}else{
			echo show("0","禁止操作！！");
			return false;
		}
	}else{
		echo show("0","非法操作！！！！");
		return false;
	}
}

    public function insert()
    {
        if(IS_POST){
    
            $data['yewu'] = $_POST['yewu'];
            if($data['yewu']){
                $id = D("User")->insert($data);

                if($id){
                    echo show("1","添加成功!","index.php?m=Back&c=Zsjtj&a=index");
                }else{
                    echo show("0","添加失败!");
	     return false;
                }
            }else{
                echo show("0","请输入内容!!");    
	return fales;
            }
        }else{

            echo show("0","页面不存在!!");
	return false;
        }
    }

    public function del(){
        if(IS_POST){

            $data['id'] = $_POST['id'];
            $ars = D("User")->find($data);

	if($ars && is_array($ars)){
		if($ars['status']=='1'){
			$id = D("User")->del($data['id']);
			if($id){
                			echo show("1","删除成功!","index.php?m=Back&c=User&a=index");
           			 }else{
				echo show("0","删除失败!!");
			}

		}elseif($ars['status']=='0'){
                			echo show("0","不能删除前台用户");
				return false;
            			}else{
				echo show("0","非法操作!!");
				return false;
			}
	}else{
		echo show("0","页面不存在!!");
		return false;
	}

        }else{

            echo show("0","页面不存在!!");
	return false;
        }
    }
}