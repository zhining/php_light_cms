<?php 

/**
* 自定义控制器
*/
class AppController extends spController
{
	function __construct()
	{

		parent::__construct();
		


		/*
		 * 末班变量
		 **/
		$layoutVariables = array(
			'layout_title' => '子标题',
			'path' => PUBLIC_PATH,
			'img_path' => PUBLIC_PATH."/images",
			'css_path' => PUBLIC_PATH."/css",
			'js_path' => PUBLIC_PATH."/js"
		);


		// 注册模板变量
		$engine = $this->v->engine;		
		foreach ($layoutVariables as $key => $value) {
			$engine->assign(array($key=>$value));
		}


		// 注册默认渲染模板变量
		// #actionFile = 控制器/动作.html
		// $file = 控制器/default.html
		
		$def_tpl_name = 'default';
		$def_tpl_type = '.html';

		$this->actionFile = $_SESSION['cur_controller'].'/'
							.$_SESSION['cur_action'].$def_tpl_type;

		$this->file = $_SESSION['cur_controller'].'/'
					  .$def_tpl_name.$def_tpl_type;
	}

}


/**
*  协助生成 HTML代码的类
*/
class HtmlHelper
{

	/*
	 * 生成加载 CSS 或 JS 的 HTML 代码
	 **/
	public function load($path, $type)
	{
		
	}
}
