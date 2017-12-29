<?php
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->sess();
    }

    public function sess(){

    	$hs = $this->log();

        if(!$hs){

        	redirect(U('Login/login'));
        }
    
    }

    public function log(){
    	return session('homeusers');
    }
}