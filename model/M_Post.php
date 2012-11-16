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
        'title' => 'title',
        'excerpt' => 'excerpt',
        'body' => 'body',
    );

    var $verifier_post = array(
        "rules" => array( // 规则
            'title' => array(   // 文章标题
                'notnull' => TRUE, 
            ),
            'excerpt' => array( // 文章摘录
                
            ),
            'body' => array(   // 文章内容
                'notnull' => TRUE, 
            ),
        ),
        'messages' => array(
            'title' => array(   // 文章标题
                'notnull' => '文章标题不能为空'
            ),
            'excerpt' => array( // 文章摘录
                
            ),
            'body' => array(   // 文章内容
                'notnull' => '文章内容不能为空', 
            ),
        ),
    );
}                  