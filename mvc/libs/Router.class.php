<?php
namespace libs;

class Router {
	public static $instance = null;

	private $controllerNamespace = '\controllers\\';
	//private $controllerNamespace = '';
	public $controller='Index';
	public $action='index';

	private function __construct(){
		
		if(isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])){
			$pathinfo = $_SERVER['PATH_INFO'];
			$arr_path = explode('/',$pathinfo);

			if(isset($arr_path[1]) && !empty($arr_path[1])) {
				$this->controller = $arr_path[1];
			}
			if(isset($arr_path[2]) && !empty($arr_path[2]) ) {
				$this->action = $arr_path[2];
			}
			// 参数怎么获取
			for($i=3;$i<count($arr_path);$i+=2){
				if(isset($arr_path[$i])){
					$_GET[$arr_path[$i]] = isset($arr_path[$i+1]) ? $arr_path[$i+1] : '';
				}
			}
		}
	}

	public static function getInstance(){
		if(!self::$instance){
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function getCon(){
		if(isset($_GET['c']) && !empty($_GET['c'])){
			$this->controller = $_GET['c'];
		}
		return $this->controllerNamespace.$this->controller;
	}

	public function getAc(){
		if(isset($_GET['c_a']) && !empty($_GET['c_a'])){
			$this->action = $_GET['c_a'];
		}
		return $this->action;
	}

}