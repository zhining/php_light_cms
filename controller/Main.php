<?php

/**
*  
*/
class Main extends AppController
{
	function index()
	{
		
	}

	function view() 
	{
		
		
	}

	// 渲染路径：模板目录/控制器/index.html 
	function __destruct()
	{
		$this->display($this->file);
	}
}