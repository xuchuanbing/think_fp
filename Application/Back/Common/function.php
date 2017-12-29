<?php
/**
 * [company 返回公司名]
 * @param  [type] $data [id]
 * @return [type]       [description]
 */
function company($data){
	$datass['user_id'] = $data;
	$message = D("Zsjkp")->find($datass);
	return $message["company"];
}

function phone($id,$num){

	$data['user_id'] = $id;
	$data['id'] = $num;
	$message = D("Zsjinfo")->find($data);
	return $message["phone"];
}
function address($id,$num){

	$data['user_id'] = $id;
	$data['id'] = $num;
	$message = D("Zsjinfo")->find($data);
	return $message["address"];
}

function user($id,$num){

	$data['user_id'] = $id;
	$data['id'] = $num;
	$message = D("Zsjinfo")->find($data);
	return $message["user"];
}

function com($id){
	$data['user_id'] = $id;
	
	$message = D("Zsjinfo")->find($data);
	return $message['company'];
}

function pho($id){
	$data['user_id'] = $id;
	$message = D("Zsjinfo")->find($data);
	return $message['phone'];
}
function power($data){
	if($data=="0"){
		return "前台用户";
	}else{
		return '后台用户';
	}
}