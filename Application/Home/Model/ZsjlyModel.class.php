<?php
namespace Home\Model;
use Think\Model;

class ZsjlyModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("Zsjly");

	}

	public function sel(){
		$lis = $this->db_log->select();
		return $lis;
	}

	public function sels($data,$page,$pageSize=10){
		$offset = ($page-1)*$pageSize;
		$lis = $this->db_log->where($data)->order('id desc')->limit($offset,$pageSize)->select();
		return $lis;
	
	}

	public function getMenusCount($data){

		return $this->db_log->where($data)->count();
	}

	public function insert($data=array()){

		if($data && is_array($data)){
			$arr = $this->db_log->create($data);
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
