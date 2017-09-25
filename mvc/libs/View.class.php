<?php

namespace libs;

class View {

	// 属性
	public $templateFile ; // 默认为当前控制器文件夹下方法名.html

	public $data;

 	public function assign($item){

 			$this->data = $item;
 		
	}


	public function display($templateFile=''){
		$data = $this->data;
		extract($data);
		// 找到哪个控制器方法
		// 将文件包含进来
		$fileContent = file_get_contents($templateFile);
		$file = $this->parseTemplate($fileContent);
		include $file;
	}


	public function parseTemplate($content){
		$filename = md5($content);
		$filename = RUNTIME.$filename.'.php';
		if(!file_exists($filename)){

			// 解析文件
			// 其他规则放到前面
			$content = preg_replace('#\{foreach#', '<?php foreach', $content);
			$content = preg_replace('#\{endforeach\}#', '<?php endforeach; ?>', $content);
			$content = preg_replace('#\{#iU','<?= ', $content);
			$content = preg_replace('#\}#iU','?>', $content);

			file_put_contents($filename,$content);
		}
		return $filename;
	}


}