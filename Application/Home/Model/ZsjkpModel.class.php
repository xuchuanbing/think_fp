<?php
namespace Home\Model;
use Think\Model;

class ZsjkpModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("Zsjkp");

	}

	public function sels($id,$page,$pageSize=10){
		$offset = ($page-1)*$pageSize;
		$lis = $this->db_log->where("user_id=$id")->order('addtime desc')->limit($offset,$pageSize)->select();
		return $lis;
	}

	public function getMenusCount($id){

		return $this->db_log->where("user_id=$id")->count();
	}


	public function sel(){
		$lis = $this->db_log->where("status='0'")->select();
		return $lis;
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
}
