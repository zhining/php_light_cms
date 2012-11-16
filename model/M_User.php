<?php 

/**
* M_User 模型，处理用户数据
*/
class M_User extends AppModel
{
	// 表名
	var $table = 'user';

	// 表主键
	var $pk = 'user_id';

    // 表字段
    var $fields = array(
        'user_id' => 'user_id',  // 用户ID
        'username' => 'username', // 用户名
        'password' => 'password', // 密码
        'email' => 'email',    // 电子邮件
        'url' => 'url',      // 个人主页
        'created' => 'created',  // 创建时间
        'status' => 'status',   // 激活状态
        'role' => 'role',   // 用户身份
    );


    // 我们定义自己的验证规则
    var $addrules = array(
        // 自定义验证规则的函数名可以有两种形式
        // 第一种是 '规则名称' => '验证函数名'，这是当函数是一个单纯的函数时使用
        // 第二种是‘规则名称’=> array('类名', '方法函数名')，这是当函数是一个类的某个方法函数时候使用。
        'youare' => 'checkname', //  '规则名称' => '验证函数名'
        'is_phone' => array('user', 'check_phone'), //‘规则名称’=> array('类名', '方法函数名')
        // 当然我们还可以定义更多的自定义规则
    );

	var $verifier_register = array(
        "rules" => array( // 规则
            'username' => array(  // 用户名
                'notnull' => TRUE, // username不能为空
                'minlength' => 3,  // username长度不能小于3
                'maxlength' => 12, // username长度不能大于12
            ),
            'password' => array(	// 密码
            	'notnull' => TRUE,
            	'minlength' => 3,
            	'maxlength' => 20,
            ),
            'comfirm_password' => array(  // 这里是对第二次输入的密码的验证规则
                'equalto' => 'password', // 要等于'password'，也就是要与上面的密码相等
            ),
            'email' => array(   // 这里是对email的验证规则
                'notnull' => TRUE, // email不能为空
                'email' => TRUE,   // 必须要是电子邮件格式
                'minlength' => 8,  // email长度不能小于8
                'maxlength' => 20, // email长度不能大于20
            ),
        ),
    );

    var $verifier_signup = array(
        "rules" => array( // 规则
            'username' => array(  // 这里是对username的验证规则
                'notnull' => TRUE, // username不能为空
                'minlength' => 3,  // username长度不能小于5
                'maxlength' => 12, // username长度不能大于12
            ),
            'password' => array(    // 密码
                'notnull' => TRUE,
                'minlength' => 3,
                'maxlength' => 20,
            ),
        ),
        "messages" => array( // 提示信息
            'username' => array(
                'notnull' => "用户名不能为空",
                'minlength' => "用户名不能少于3个字符",
                'maxlength' => "用户名不能大于20个字符",
            ),
            'password' => array(
                'notnull' => "密码不能为空",
                'minlength' => "密码不能少于3个字符",
                'maxlength' => "密码不能大于20个字符",
            ),
        )

    );

    
}