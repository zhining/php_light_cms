<?php 
/**
* 	自定义模型
*/
class AppModel extends spModel
{

	
    var $fields = array();	

    /**
     * 按条件删除记录
     *
     * @param conditions 数组形式，查找条件，此参数的格式用法与find/findAll的查找条件参数是相同的
     */
    public function delete($conditions)
    {
        $where = "";
        $orCondition = array();
        $orFlag = FALSE;

        if(is_array($conditions)){
            $join = array();
            foreach( $conditions as $key => $condition ){   // $key 为 字段名
                if (is_array($condition)) {
                    $orFlag = TRUE;
                    foreach ($condition as $k => $value) {
                        $value = $this->escape($value);
                        $orCondition[] = "{$key} = {$value}";
                    }
                } else {
                    $condition = $this->escape($condition);
                    $join[] = "{$key} = {$condition}";    
                }
            }
            // dump($conditions);
            // dump($orCondition);
            if ($orFlag) {
                $where = "WHERE ( ".join(" AND ",$join). join(" OR ", $orCondition) . ")";
            } else {
                $where = "WHERE ( ".join(" AND ",$join). ")";    
            }
        }else{
            if(null != $conditions)$where = "WHERE ( ".$conditions. ")";
        }
        $sql = "DELETE FROM {$this->tbl_name} {$where}";
        // dump($sql);
        return $this->_db->exec($sql);
    }

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

