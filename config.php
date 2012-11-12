<?php 

define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
define("TPL_PATH", dirname(__FILE__).'/tpl');
define("PUBLIC_PATH", '/public');
define('UPLOAD_PATH', PUBLIC_PATH.'/uploads');


$spConfig = array(

	'mode' => 'debug', // 应用程序模式，默认为调试模式
	                   // 
	'db' => array(  // 数据库连接配置
		'driver' => 'mysql',   // 驱动类型
		'host' => 'localhost', // 数据库地址
		'port' => 3306,        // 端口
		'login' => 'root',     // 用户名
		'password' => '123456',      // 密码
		'database' => 'speedphp',      // 库名称
		'prefix' => '',           // 表前缀
		'persistent' => FALSE,    // 是否使用长链接
	),

	'view' => array( // 视图配置
		'enabled' => TRUE, // 开启视图
		'config' =>array(
			'template_dir' => APP_PATH.'/tpl', // 模板目录
			'compile_dir' => APP_PATH.'/tmp', // 编译目录
			'cache_dir' => APP_PATH.'/tmp', // 缓存目录
			'left_delimiter' => '<{',  // smarty左限定符
			'right_delimiter' => '}>', // smarty右限定符
			'auto_literal' => TRUE, // Smarty3新特性
		),
		'debugging' => FALSE, // 是否开启视图调试功能，在部署模式下无法开启视图调试功能
		'engine_name' => 'Smarty', // 模板引擎的类名称，默认为Smarty
		'engine_path' => SP_PATH.'/Drivers/Smarty/Smarty.class.php', // 模板引擎主类路径
		'auto_ob_start' => FALSE, // 是否自动开启缓存输出控制
		'auto_display' => FALSE, // 是否使用自动输出模板功能
		'auto_display_sep' => '/', // 自动输出模板的拼装模式，/为按目录方式拼装，_为按下划线方式，以此类推
		'auto_display_suffix' => '.html', // 自动输出模板的后缀名
	),

	'default_controller' => 'Main', // 默认的控制器名称
	'default_action' => 'index',  // 默认的动作名称

	'url' => array(
        'url_path_info' => TRUE, // 是否使用path_info方式的URL
        'url_path_base' => 'index.php', // URL的根目录访问地址
    ),
);


require(SP_PATH."/SpeedPHP.php");

import($GLOBALS['G_SP']['controller_path'].'/AppController.php');
import($GLOBALS['G_SP']['model_path'].'/AppController.php');




// 更新控制器和动作的记录
if (!isset($_SESSION['cur_controller'])) {	// 如果是第一次访问
    $_SESSION['cur_controller'] = $__controller;
    $_SESSION['cur_action'] = $action;

	$_SESSION['pre_controller'] = $__action;
	$_SESSION['pre_action'] = $__controller;

} else {	// 第二次访问
    $_SESSION['pre_controller'] = $_SESSION['cur_controller'];
	$_SESSION['pre_action'] = $_SESSION['cur_action'];
}

// 记录当前控制器和动作
$_SESSION['cur_action'] = $__action;
$_SESSION['cur_controller'] = $__controller;


