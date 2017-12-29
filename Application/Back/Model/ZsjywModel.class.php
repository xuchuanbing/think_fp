<?php
namespace Back\Model;
use Think\Model;

class ZsjywModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("Zsjyw");

	}

	public function select(){
		$li = $this->db_log->select();
		return $li;
	}

	public function getMenus($data,$page,$pageSize=10){

		$offset = ($page-1)*$pageSize;
		$list = $this->db_log->where($data)->order('id desc')->limit($offset,$pageSize)->select();
		//print_r($list);die;
		return $list;
	}

	public function getMenusCount($data=array()){

		return $this->db_log->where($data)->count();
	}


	public function insert($data=array()){

		if($data && is_array($data)){
			$arr = $this->db_log->create();

			if($arr){
				$id = $this->db_log->add($data);
				return $id;
			}
		}
	}

	public function del($id){
		if($id && is_numeric($id)){
			$ar = $this->db_log->where("id=$id")->delete();
			return $ar;
		}
	}
	
	public function find($data=array()){
		
		if($data && is_array($data)){

			$id = $this->db_log->where($data)->find();
			return $id;	
			
		}

	}
}