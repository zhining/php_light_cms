<?php

/**
*  
*/
class Main extends AppController
{
	public function index()
	{
		
	}

	public function view() 
	{
		
		
	}

	// 错误页面
	public function error404()
	{
			
	}

	// 渲染路径：模板目录/控制器/index.html 
	function __destruct()
	{
		$this->display($this->file);
	}
}