<?php
namespace Back\Model;
use Think\Model;

class BackloginModel extends Model {

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

