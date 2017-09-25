<?php

namespace controllers;
use libs\Controller;
//use libs\Insert;
//use libs\Delete;
use models\Joke;
header('content-type:text/html;charset=utf-8');
class  Index extends Controller {

	public function index(){
		//echo 1;
		 $model = new Joke();
		 $data = $model->select("select * from joke");
//		 var_dump($data);die;
		 $this->assign(['data'=>$data]);
		 $this->display();
		// 渲染模板引擎
//        $data=$model->insert("insert into joke VALUES (null,'小韩','2017-09-28 20:32:58')");
//        var_dump($data);die;
//          $data=$model->delete("delete from  joke WHERE id='5'");
//          var_dump($data);die;
//        $data=$model->save("update joke set username='小杨' WHERE id='4'");
//        var_dump($data);die;

    }

//    public function  insert(){
//        $model=new Joke();
//        $data=$model->insert("insert into joke VALUES (null,'小韩','2017-09-28 20:32:58')");
//
//    }


}