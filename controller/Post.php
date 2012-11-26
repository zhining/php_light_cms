<?php 

/**
* POST 处理文章
*/
class Post extends AppController
{	
	/****************************/
	/*  控制器成员变量          */
	/****************************/

	// 自动显示模板
	var $autoShow = true;

	// 接收参数
	var $args = null;

	// 默认数据模型
	var $modelPost = null;


	/****************************/
	/* 后台部分： 需要权限      */
	/****************************/

	// 后台文章列表
	public function admin_index()
	{
		// dump($_SESSION);
		$this->posts = $this->modelPost
						    ->spLinker()->findAll(null, 'created desc');	// 按创建时间排序
		$this->model_category = spClass('M_Category');
		$this->categories = $this->model_category
								 ->spLinker()->findAll(array('type' => 'post'), 'rank desc');
		// dump($this->categories);
		// dump($this->posts);
	}

	public function admin_add() 
	{	
		if ($this->is('post')) {	// 提交数据，保存文章
			$message = $this->modelPost->spVerifier($this->args);
			$this->args['modified'] = $this->args['created'] = empty($this->args['created']) 
									 ? date("Y-m-d H:i:s") : $this->args['created']; // 默认创建时间

			$this->args['user_id'] = $this->get('currentUser')['user_id'];		// 登陆用户ID

			if ($message === false) {
				$this->modelPost->create($this->args);		
				if ($this->modelPost->affectedRows() >= 1) {
					$this->setFlash('文章保存成功');
					$this->redirect(spUrl('post','admin_index'));
				} else {
					// 设置错误信息
					$this->setFlash('文章保存失败');
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
			$post_id = $this->args['post_id'];
			$condition = array('post_id' => $post_id);
			// dump($this->args);
			$this->args['modified'] = empty($this->args['modified']) ? date("Y-m-d H:i:s") : $this->args['modified'];
			if ($this->modelPost->update($condition, $this->args)) {

				if (is_numeric($post_id) && $post_id > 0) {
					$this->post = $this->modelPost->find($condition);
					$this->category_id = $this->post['category_id'];
				}
				$this->setFlash('文章保存成功');
			}
		} else {
			$post_id = $this->args['post_id'];

			$condition = array('post_id' => $post_id);
			if (is_numeric($post_id) && $post_id > 0) {
				$this->post = $this->modelPost->find($condition);
				$this->category_id = $this->post['category_id'];
				// dump($this->post);
			}
		}
	}

	// 删除文章
	public function admin_ajax_str_delete()
	{

		// 不显示模板
		$this->autoShow = false;

		// 检查权限
		$aclName = spClass('spAcl')->get();
		if ($aclName != ROOT && $aclName != ADMIN) {
			echo '0';
			exit;
		}

		if ($this->is('post')) {
			$post_id = $this->args['post_id'];
			$condition = array('post_id' => $post_id);
			$this->modelPost->delete($condition);
			if ($this->modelPost->affectedRows() >= 1) {
				echo '1';
			}
		}
	}

	/*
	 *  初始化保存数据模型对象
	 **/
	function __construct()
	{
		parent::__construct();

		// 自动显示模板
		$this->autoShow = true;

		// 保存数据对象
		$this->modelPost = spClass('M_Post');

		// 过滤不必要的字段
		$this->args = $this->modelPost->fields_filter($this->spArgs());

		$this->categoryOption = spClass('M_Category')->generateTreeOption(array('type' => 'post'));
	}

	// 渲染路径：模板目录/控制器/default.html 
	function __destruct()
	{
		if ($this->autoShow) {
			$this->display($this->file);	
		}
	}
}