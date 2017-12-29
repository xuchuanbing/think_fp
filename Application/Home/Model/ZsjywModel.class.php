<?php
namespace Home\Model;
use Think\Model;

class ZsjywModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("Zsjyw");

	}

	public function select(){
		$arrs = $this->db_log->select();
		return $arrs;
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