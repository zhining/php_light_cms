<?php

/**
*  
*/
class User extends AppController
{
	function index()
	{
		
	}

	function signin()
	{	
		if ($this->is('post')) {	// 登陆提交数据
		                        	
			$model_user = spClass('M_User');	// 用户数据模型对象
			$args = $this->spArgs();	// 提交数据

			$model_user->verifier = $model_user->verifier_signup;
			$message = $model_user->spVerifier($args);
			
			if ($message == false) {
				$args['password'] = $model_user->encrypt($args['password']);
				$condition = $model_user->fields_filter($args);
				if ($result = $model_user->find($condition)) {
					spClass('spAcl')->set($result['role']);
					$this->jump(spUrl('Main','index'));
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
		$this->jump(spUrl('Main','index'));
	}


	// 渲染路径：模板目录/控制器/index.html 
	function __destruct()
	{
		$this->display($this->file);
	}
}