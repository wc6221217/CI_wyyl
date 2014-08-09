<?php 
	class Publish_pic_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取所有水果大类
    * 
    * 返回值: 成功则返回所有水果大类
    *        
    */
    function search_publish_pic(){
    	$sql = "SELECT * FROM publish_pic";
    	$query_class = $this->db->query($sql);
    	
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }

}
?>