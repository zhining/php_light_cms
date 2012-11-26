<?php

/**
* 
*/
class M_Post extends AppModel
{
	// 表名
	var $table = 'post';

	// 表主键
	var $pk = 'post_id';

    // 表字段
    var $fields = array(
        'post_id' => 'post_id',
        'user_id' => 'user_id',
        'title' => 'title',
        'excerpt' => 'excerpt',
        'body' => 'body',
        'category_id' => 'category_id',
        'created' => 'created',
        'modified' => 'modified'
    );

    var $linker = array(
        'category' => array(
            'type' => 'hasone',   // 一对一关联
            'map' => 'category',    // 关联的标识
            'mapkey' => 'category_id',
            'fclass' => 'M_Category', 
            'fkey' => 'category_id',    
            'enabled' => true
        ),
        'user' => array(
            'type' => 'hasone',   // 一对一关联
            'map' => 'user',    // 关联的标识
            'mapkey' => 'user_id',
            'fclass' => 'M_User', 
            'fkey' => 'user_id',    
            'enabled' => true
        ),
    );


    var $verifier = array(
        "rules" => array( // 规则
            'title' => array(   // 文章标题
                'notnull' => TRUE, 
            ),
            'body' => array(   // 文章内容
                'notnull' => TRUE, 
            ),
        ),
        'messages' => array(
            'title' => array(   // 文章标题
                'notnull' => '文章标题不能为空'
            ),
            'body' => array(   // 文章内容
                'notnull' => '文章内容不能为空', 
            ),
        ),
    );
}                  