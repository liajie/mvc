<?php
namespace controllers;
use libs\Controller;
header('content-type:text/html;charset=utf-8');
class Demo extends Controller{

	public function show(){
		var_dump($_GET);
	}
    public  function  insert(){

    }




}