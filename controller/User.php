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
	var $autoShow = true;

	// 接收参数
	var $args = null;

	// 默认数据模型
	var $modelUser = null;



	/****************************/
	/*  前台部分动作          */
	/****************************/
	function signin()
	{	
		$this->layout_subtitle = '用户登陆';
		if ($this->is('post')) {	// 登陆提交数据

			$this->modelUser->verifier = $this->modelUser->verifier_signin;
			$message = $this->modelUser->spVerifier($this->args);
			if ($message == false) {
				$this->args['password'] = $this->modelUser->encrypt($this->args['password']);
				if ($result = $this->modelUser->find($this->args)) {
					spClass('spAcl')->set($result['role']);
					// dump($result);
					unset($result['password']);
					// SESSION 保存用户信息
					$this->set('currentUser', $result);
					$this->redirect(spUrl('post','admin_index'));
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
		// 取消自动显示模板
		$this->autoShow = false;
		
		spClass('spAcl')->set(VISITOT);
		$this->clear();
		$this->jump(spUrl('Main','index'));
	}



	/****************************/
	/*  后台管理部分：需要权限  */
	/****************************/

	public function admin_index()
	{
		$this->users = $this->modelUser->findAll(null, 'created');
	}

	// 添加用户
	public function admin_signup()
	{
		if ($this->is('post')) {	// 保存数据
			$this->modelUser->verifier = $this->modelUser->verifier_signup;
			$message = $this->modelUser->spVerifier($this->args);
			// dump($message);
			if ($message == false) {
				$this->args['password'] = $this->modelUser->encrypt($this->args['password']);
				$condition = "username = '{$this->args['username']}' OR email = '{$this->args['email']}'";
				$result = $this->modelUser->findAll($condition);
				if (empty($result)) {
					$this->modelUser->create($this->args);
					if ($this->modelUser->affectedRows() >= 1) {
						$this->setFlash('保存成功');
						$this->redirect(spUrl('User', 'admin_index'));
					} else {
						// 设置错误信息
						$this->setFlash('保存失败，输入用户的账户、邮箱可能重复');
					}
				} else {
					// 设置错误信息
					$this->setFlash('保存失败，输入用户的账户、邮箱可能重复');
				}
				
			} else {
				$this->setFlash(array_values($message)[0][0]);
			}	
		}
	}

	public function admin_edit()
	{
		if ($this->is('post')) {	// POST 方法保存数据
			//dump($this->args);
			$user_id = $this->args['user_id'];
			$condition = array('user_id' => $user_id);
			$this->modelUser->update($condition, $this->args);
			// dump($this->args);
			if ($this->modelUser->affectedRows() >= 1) {
				$this->user = $this->modelUser->find($condition);
				$this->setFlash('用户信息修改保存成功');
			} else {
				$this->setFlash('用户信息修改保存失败');
				$this->user = $this->modelUser->find($condition);
			}
		} else {
			$user_id = $this->args['user_id'];
			$condition = array('user_id' => $user_id);
			if (is_numeric($user_id) && $user_id > 0) {
				$this->user = $this->modelUser->find($condition);
			}
		}
	}

	public function admin_ajax_str_delete()
	{
		// 不显示模板
		$this->autoShow = false;

		// 检查权限
		$aclName = spClass('spAcl')->get();
		// dump($aclName == ADMIN);
		if ($aclName != ROOT && $aclName != ADMIN) {
			echo '0';
			exit;
		}

		if ($this->is('post')) {
			$user_id = $this->args['user_id'];
			$condition = array('user_id' => $user_id);
			$this->modelUser->delete($condition);
			if ($this->modelUser->affectedRows() >= 1) {
				echo '1';
			}
		}
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