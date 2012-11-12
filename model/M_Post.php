<?php

/**
* 
*/
class Post extends AppModel
{
	// 表名
	var $table = 'post';

	// 表主键
	var $pk = 'post_id';

	var $verifier = array(
        "rules" => array( // 规则
            'title' => array(  	// 文章标题
                'notnull' => TRUE, 
            ),
            'excerpt' => array(	// 文章摘录
            	'notnull' => TRUE,
            ),
            'body' => array(   // 文章内容
                'notnull' => TRUE, 
            ),
        ),
    );  
}


                    