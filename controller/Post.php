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
	var $auto_show = true;

	// 接收参数
	var $args = null;

	// 默认数据模型
	var $model_post = null;


	/****************************/
	/*  前台部分： VISITOR    	*/
	/****************************/
	
	// 文章列表
	public function index()
	{
		
	}

	// 查看文章
	public function view()
	{
		$post_id = $this->args['post_id'];
		if (is_int($post_id) && $post_id > 0) {
			$this->model_post = spClass('M_Post');
			$condition = array($this->model_post->pk => $post_id);
			$result = $this->model_post->find($condition);
			if ($result) {

			} else {
				$this->jump(spUrl('Main', 'error404'));
			}
		}
	}

	/****************************/
	/* 后台部分： 需要权限      */
	/****************************/

	// 后台文章列表
	public function admin_index()
	{
		$this->posts = $this->model_post->findAll();
	}

	public function admin_add() 
	{	
		if ($this->is('post')) {	// 提交数据，保存文章

			$this->model_post->verifier = $this->model_post->verifier_post;
			$message = $this->model_post->spVerifier($this->args);
			if ($message == false) {
				if ($result = $this->model_post->create($this->args)) {
					$this->jump(spUrl('Post','index'));
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
			if ($this->model_post->update($condition, $this->args)) {

				if (is_numeric($post_id) && $post_id > 0) {
					$this->post = $this->model_post->find($condition);
				}
				$this->setFlash('文章保存成功');
			}
		} else {
			$post_id = $this->args['post_id'];
			$condition = array('post_id' => $post_id);
			if (is_numeric($post_id) && $post_id > 0) {
				$this->post = $this->model_post->find($condition);
			}
		}
	}

	// 删除文章
	public function admin_ajax_delete()
	{

		// 不显示模板
		$this->auto_show = false;

		if ($this->is('post')) {
			$post_id = $this->args['post_id'];
			$condition = array('post_id' => $post_id);
			if ($this->model_post->delete($condition)) {
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
		$this->auto_show = true;

		// 保存数据对象
		$this->model_post = spClass('M_Post');

		// 过滤不必要的字段
		$this->args = $this->model_post->fields_filter($this->spArgs());
	}

	// 渲染路径：模板目录/控制器/default.html 
	function __destruct()
	{
		if ($this->auto_show) {
			$this->display($this->file);	
		}
		
	}
}