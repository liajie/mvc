<?php

namespace libs;

class Controller {
	public $viewObject;

	public function __construct(){
		$this->viewObject = new View;
	}
	public function display($fileName=''){
		// 获取得到模板路径
		if(empty($fileName)){

			$c = Router::getInstance()->controller;
			$a = Router::getInstance()->action;

			$fileName = VIEWS.$c.DS.$a.'.html';
		}
		
		$this->viewObject->display($fileName); 
	}

	public function assign($data){
		$this->viewObject->assign($data);
	}



}