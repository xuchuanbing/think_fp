<?php
namespace Home\Model;
use Think\Model;

class NewyhModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("adminuser");

	}

	public function log($data=array()){
		
		if($data && is_array($data)){

			$arr = $this->db_log->where($data)->find();
			if($arr){

				return $arr;	
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

	public function insert($data=array()){
		
		if($data && is_array($data)){
			
			$arrs = $this->db_log->create($data);

			if($arrs){

				$id = $this->db_log->add($data);
				
				if($id){
					return $id;
				}else{
					return "0";
				}
			}

		}else{

			return "0";
		}
	}
}