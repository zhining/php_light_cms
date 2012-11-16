<?php 

/**
* 
*/
class Comment extends AppController
{

	


	function __construct()
	{
		$this->model_comment = spClass('M_Comment');
		// 过滤不必要的字段
		$this->args = $this->model_comment->fields_filter($this->spArgs());
		parent::__construct();
	}

	// 渲染路径：模板目录/控制器/index.html 
	function __destruct()
	{
		$this->display($this->file);
	}
}
