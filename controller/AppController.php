<?php 

/**
* 自定义控制器
*/
class AppController extends spController
{

	var $args = null;

	var $model = null;

	// 判断请求方法, 'post', 'get'
	public function is($value)
	{
		if (strtolower($_SERVER['REQUEST_METHOD']) 
				== strtolower($value)) {
			return true;
		}
		return false;
	}

	// SESSION 保存信息
	public function set($name, $value)
	{
		$_SESSION[$GLOBALS['G_SP']['sp_app_id']."_AppController"][$name] = $value;
	}

	// SESSION 读取信息
	public function get($name)
	{
		if (!empty($name)) {
			return $_SESSION[$GLOBALS['G_SP']['sp_app_id']."_AppController"][$name];	
		}
		return $_SESSION[$GLOBALS['G_SP']['sp_app_id']."_AppController"];
	}

	// 清空 SESSION 信息
	public function clear()
	{
		unset($_SESSION[$GLOBALS['G_SP']['sp_app_id']."_AppController"]);
		$_SESSION[$GLOBALS['G_SP']['sp_app_id']."_AppController"] = array();
	}

	// 跳转封装自 jump
	public function redirect($url, $delay = 0)
	{
		return $this->jump($url, $delay);
	}

	// 本页面更新友好提示
	public function setFlash($value = '')
	{
		$this->flash = $value;
	}

	public function __construct()
	{

		parent::__construct();
		
		// SESSION 保存信息
		$_SESSION[$GLOBALS['G_SP']['sp_app_id']."_AppController"] = array();

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
