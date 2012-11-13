<?php 
/**
* 	自定义模型
*/
class AppModel extends spModel
{
	



	function __construct(){
        // 一些操作
        
        parent::__construct();
    }	

    // 加密数据
    public function encrypt($str = null)
    {
        return md5(substr(md5($str), 7, 15));
    }
}


?>
