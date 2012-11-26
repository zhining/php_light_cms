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
		if (is_string($value) && strtolower($_SERVER['REQUEST_METHOD']) 
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
		sleep($delay);
		header('location:'.$url);
	}

	// 本页面更新友好提示
	public function setFlash($value = '')
	{
		$this->flash = $value;
	}

	public function __construct()
	{

		parent::__construct();

		// 网站静态变量设置
		$layoutVariables = array(
			'layout_title' => '子标题',
			'path' => PUBLIC_PATH,
			'img_path' => PUBLIC_PATH."/images",
			'css_path' => PUBLIC_PATH."/css",
			'js_path' => PUBLIC_PATH."/js",
			'currentUser' => array(),
		);

		// 注册模板变量
		$engine = $this->v->engine;		
		foreach ($layoutVariables as $key => $value) {
			$engine->assign(array($key=>$value));
		}

		$currentUser = $this->get('currentUser');
		$this->currentUser = empty($currentUser) ? $this->currentUser : $currentUser ;

		// 注册默认渲染模板变量
		// #actionFile = 控制器/动作.html
		// $file = 控制器/default.html
		
		$templateName = 'default';
		$templateType = '.html';

		$this->actionFile = $_SESSION['currentController'].'/'
							.$_SESSION['currentAction'].$templateType;

		$this->file = $_SESSION['currentController'].'/'
					  .$templateName.$templateType;
	}
	
}
