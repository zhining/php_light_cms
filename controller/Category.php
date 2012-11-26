<?php 

/**
* 
*/
class Category extends AppController
{
	
	/****************************/
	/*  控制器成员变量          */
	/****************************/

	// 自动显示模板
	var $autoShow = true;

	// 接收参数
	var $args = null;

	// 默认数据模型
	var $modelCategory = null;



	/****************************/
	/* 后台部分： 需要权限      */
	/****************************/

	public function admin_index()
	{
		//dump($this->modelCategory);
		//$this->autoShow = false;
		
		$this->categoryOption = $this->modelCategory->generateTreeOption();
		$this->categories = $this->modelCategory->findAll(array('type' => 'post'));
		//dump($this->categories);
	}

	public function admin_add()
	{
		// 不显示模板
		$this->autoShow = false;

		if ($this->is('post')) {
			$this->modelCategory->create($this->args);
			if ($this->modelCategory->affectedRows() >= 1) {
				echo '添加成功';
				$this->redirect(spUrl('Category', 'admin_index'));
				exit;
			}
		}
	}

	// 修改目录
	public function admin_ajax_str_edit()
	{
		// 不显示模板
		$this->autoShow = false;

		if ($this->is('post')) {
			$this->modelCategory
				 ->update(array(
				 	'category_id' => $this->args['category_id']
				   ), $this->args);
			if ($this->modelCategory->affectedRows() >= 1) {
				echo '1';
			}
		}
	}

	public function admin_ajax_str_delete()
	{
		// 不显示模板
		$this->autoShow = false;

		if ($this->is('post')) {
			$category_id = $this->args['category_id'];
			$condition = array('category_id' => $category_id);
			// dump($this->args);
			// 查找是否有下级分类
			if ($childs = $this->modelCategory
						       ->findAll(array('parent_id' => $category_id))) {
				$childsCondition = array();
				foreach ($childs as $key => $value) {
					array_push($childsCondition, $value['category_id']);
				}

				array_push($childsCondition, $category_id);
				$this->modelCategory->delete(array(
					'category_id' => $childsCondition
				));
			} else {
				$this->modelCategory->delete($condition);
			}

			if ($this->modelCategory->affectedRows() >= 1) {
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
		$this->modelCategory = spClass('M_Category');

		// 过滤不必要的字段
		$this->args = $this->modelCategory->fields_filter($this->spArgs());
	}

	// 渲染路径：模板目录/控制器/default.html 
	function __destruct()
	{
		if ($this->autoShow) {
			$this->display($this->file);	
		}
	}
}
