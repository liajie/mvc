<?php
header('content-type:text/html;charset=utf-8');
	define('APP_PATH',realpath(dirname(__FILE__)));

	define('DS',DIRECTORY_SEPARATOR);
	define('STATIC',APP_PATH.DS.'static'.DS);
	define('LIBS',APP_PATH.DS.'libs'.DS);
	define('VIEWS',APP_PATH.DS.'views'.DS);
	define('RUNTIME',APP_PATH.DS.'runtime'.DS);

	require(LIBS."AutoLoader.class.php");   // 实现自动加载
	// 加载配置
	

	if(new AutoLoader()){
		$router = \libs\Router::getInstance();
		$controller = $router->getCon();
		$action = $router->getAc();
		if($obj = new $controller){
			$obj->$action();
		}else{
			throw(new Exception('对不起，我们这里没有你说的这个mm'));
		}
	}else{
		echo "MVC文件加载错误!";
	}