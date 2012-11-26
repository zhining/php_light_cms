<?php 

/**
* 网站信息配置
*/
class M_Config extends AppModel
{
	// 表名
	var $table = 'config';

	// 表主键
	var $pk = 'config_id';

    // 表字段
    var $fields = array(
        'config_id' => 'config_id',
        'category_id' => 'category_id',
    );
}