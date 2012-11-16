<?php

/**
*  USER : 处理用户
*/
class User extends AppController
{
	/****************************/
	/*  控制器成员变量          */
	/****************************/

	// 自动显示模板
	var $auto_show = true;

	// 接收参数
	var $args = null;

	// 默认数据模型
	var $model_post = null;

	function signin()
	{	
		if ($this->is('post')) {	// 登陆提交数据

			$this->model_user->verifier = $this->model_user->verifier_signup;
			$message = $this->model_user->spVerifier($this->args);
			
			if ($message == false) {
				$this->args['password'] = $this->model_user->encrypt($this->args['password']);
				if ($result = $this->model_user->find($this->args)) {
					spClass('spAcl')->set($result['role']);

					// SESSION 保存用户信息
					$this->set('username', $result['username']);
					$this->set('nickname', $result['nickname']);

					$this->redirect(spUrl('Main','index'));
				} else {
					// 设置错误信息
					$this->setFlash('用户名或密码错误');
				}
			} else {
				$this->setFlash(array_values($message)[0][0]);
			}
		}
	}

	public function signout()
	{
		spClass('spAcl')->set(VISITOT);
		$this->clear();
		$this->jump(spUrl('Main','index'));
	}



	/***************************
		h后台管理部分
	****************************/

	public function admin_index()
	{
		$this->users = $this->model_user->findAll();
	}

	/*
 	 * 构造函数,初始化设置
	 **/
	function __construct()
	{
		parent::__construct();

		// 自动显示模板
		$this->auto_show = true;

		// 保存数据对象
		$this->model_user = spClass('M_User');

		// 过滤不必要的字段
		$this->args = $this->model_user->fields_filter($this->spArgs());
	}


	// 渲染路径：模板目录/控制器/default.html 
	function __destruct()
	{
		if ($this->auto_show) {
			$this->display($this->file);	
		}
		
	}
}