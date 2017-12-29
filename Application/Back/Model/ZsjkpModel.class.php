<?php
namespace Back\Model;
use Think\Model;

class ZsjkpModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("Zsjkp");

	}

	public function log($data,$page,$pageSize=10){

		$data['status'] = "0";

		$offset = ($page-1)*$pageSize;
		$list = $this->db_log->where($data)->order('id desc')->limit($offset,$pageSize)->select();
		//print_r($list);die;
		return $list;
	}

	public function log0($data=array()){

		$data['status'] = "0";
		return $this->db_log->where($data)->count();
	}

	public function find($data=array()){
		
		if($data && is_array($data)){

			$id = $this->db_log->where($data)->find();
			return $id;	
			
		}

	}

	public function update($data=array(),$id){
		if($data && is_array($data)){
			$data = $this->db_log->create($data);

			if($data){
				$id = $this->db_log->where("id = $id")->save($data);
				return $id;	
			}
		}
	}

	public function getMenus($data,$page,$pageSize=10){
		

		$offset = ($page-1)*$pageSize;
		$list = $this->db_log->where($data)->order('id desc')->limit($offset,$pageSize)->select();
		//print_r($list);die;
		return $list;
	}

	public function getMenusCount($data=array()){
		$data['status'] = "1";
		return $this->db_log->where($data)->count();
	}

}
