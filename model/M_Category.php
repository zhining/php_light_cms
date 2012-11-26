<?php 

/**
* 目录数据模型
*/
class M_Category extends AppModel
{
	// 数据表
	var $table = 'category';

	// 主键
	var $pk = 'category_id';

	// 表字段
	var $fields = array(
		'category_id' => 'category_id',
		'parent_id' => 'parent_id',
		'type' => 'type',
		'name' => 'name',
		'alias' => 'alias',
		'rank' => 'rank'
	);

	var $linker = array(
        'post' => array(
            'type' => 'hasmany',   // 一对一关联
            'map' => 'post',    // 关联的标识
            'mapkey' => 'category_id',
            'fclass' => 'M_Post', 
            'fkey' => 'category_id',    
            'enabled' => true
        ),
    );

	public function generateTreeOption($condition = array())
	{
		if (empty($condition)) {
			$data = $this->findAll();
		} else {
			$data = $this->findAll($condition);
		}
		import('Category.php');
		
		$cat = new CategoryExtendsion(array('category_id','parent_id','name', 'cname'));
		$s = $cat->getTree($data);	//获取分类数据树结构
		$str = "";
		foreach($s as $vo)
		{
			$str .= "<option data-parent-id='" . $vo['parent_id'] .
					"' data-category-id='" . $vo['category_id'] . 
					"' value='" . $vo['category_id']."'>".$vo['cname']."</option>";
		}
		return $str;
	}
}