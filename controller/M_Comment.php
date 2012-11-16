<?php 

/**
* 
*/
class M_Comment extends AppModel
{
	
	// 表名
	var $table = 'comment';

	// 表主键
	var $pk = 'comment_id';

	// 表字段
	var $fields = array(
		'comment_id' => 'comment_id',
		'parent_comment_id' => 'parent_comment_id',
		'post_id' => 'post_id',
		'user_id' => 'user_id',
		'title' => 'title',
		'body' => 'body',
		'created' => 'created',
		'modified' => 'modified',
		'status' => 'status',
	);
} 