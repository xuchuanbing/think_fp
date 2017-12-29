<?php
namespace Back\Model;
use Think\Model;

class ZsjlyModel extends Model {

	protected $db_log;

	public function __construct(){

		$this->db_log = M("Zsjly");

	}

	public function getMenus($data,$page,$pageSize=10){

		$offset = ($page-1)*$pageSize;
		$list = $this->db_log->where($data)
							 ->order('id desc')
							 ->limit($offset,$pageSize)
							 ->select();
		return $list;
	}

	public function getMenusCount($data=array()){

		return $this->db_log->where($data)->count();
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