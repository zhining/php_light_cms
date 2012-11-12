<?php 

/**
* M_User 模型，处理用户数据
*/
class M_User extends AppModel
{
	// 表名
	var $user = 'user';

	// 表主键
	var $pk = 'user_id';

    // 我们定义自己的验证规则
    var $addrules = array(
        // 自定义验证规则的函数名可以有两种形式
        // 第一种是 '规则名称' => '验证函数名'，这是当函数是一个单纯的函数时使用
        // 第二种是‘规则名称’=> array('类名', '方法函数名')，这是当函数是一个类的某个方法函数时候使用。
        'youare' => 'checkname', //  '规则名称' => '验证函数名'
        'is_phone' => array('user', 'check_phone'), //‘规则名称’=> array('类名', '方法函数名')
        // 当然我们还可以定义更多的自定义规则
    );

	var $verifier = array(
        "rules" => array( // 规则
            'username' => array(  // 用户名
                'notnull' => TRUE, // username不能为空
                'minlength' => 5,  // username长度不能小于5
                'maxlength' => 12, // username长度不能大于12
            ),
            'password' => array(	// 密码
            	'notnull' => TRUE,
            	'minlength' => 6,
            	'maxlength' => 20,
            ),
            'email' => array(   // 这里是对email的验证规则
                'notnull' => TRUE, // email不能为空
                'email' => TRUE,   // 必须要是电子邮件格式
                'minlength' => 8,  // email长度不能小于8
                'maxlength' => 20, // email长度不能大于20
            ),
        ),

        "messages" => array( // 提示信息
            'username' => array(
                'notnull' => "姓名不能为空",
                'minlength' => "姓名不能少于5个字符",
                'maxlength' => "姓名不能大于20个字符",
                'youare' => "看来你不是jake", // 没有出现在规则中的信息提示
            ),
        )
    );  
}