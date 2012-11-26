<?php

/**
*  
*/
class Main extends AppController
{
	/****************************/
	/*  控制器成员变量          */
	/****************************/

	// 自动显示模板
	var $autoShow = true;

	// 接收参数
	var $args = null;

	// 默认数据模型
	var $modelCategory = null;

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

	/*
 	 * 构造函数,初始化设置
	 **/
	function __construct()
	{
		parent::__construct();

		// 自动显示模板
		$this->autoShow = true;

		// 保存数据对象
		$this->modelUser = spClass('M_User');

		// 过滤不必要的字段
		$this->args = $this->modelUser->fields_filter($this->spArgs());
	}

	// 渲染路径：模板目录/控制器/default.html 
	function __destruct()
	{
		if ($this->autoShow) {
			$this->display($this->file);	
		}
	}
}