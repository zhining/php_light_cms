<?php 
/**
* 	自定义模型
*/
class AppModel extends spModel
{

	
    var $fields = array();	

    /*
     * 构造树节点
     **/
    public function generateTree()
    {
    
    }

    /* 
     *  加密数据
     **/ 
    public function encrypt($str = null)
    {
        return md5(substr(md5($str), 7, 15));
    }

    /*
     * 与 $this->fields 作比较，返回焦急
     **/
    public function fields_filter($array)
    {
        return array_intersect_key($array, $this->fields);
    }

    function __construct()
    {
        // 一些操作
        
        parent::__construct();
    }
}

