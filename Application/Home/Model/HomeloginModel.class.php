<?php
namespace Home\Model;
use Think\Model;

class HomeloginModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("adminuser");

	}

	public function log($data=array()){
		
		if($data && is_array($data)){

			$id = $this->db_log->where($data)->find();
			if($id){

				return $id;	
			}
			
		}

	}
}
