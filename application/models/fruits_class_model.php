<?php 
	class Fruits_class_model extends CI_Model {

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
    function search_fruits_class(){
    	$sql = "SELECT * FROM fruits_class";
    	$query_class = $this->db->query($sql);
    	
		//$this->load->model('fruits_class_model');
		
		$class_result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$class_result[$i]=$row;
			$fruits_class_id = $row['fruits_class_id'];
			$query_type = $this->fruits_class_model->search_fruits_type($fruits_class_id);
			//$type_result = array();
			$j = 0;
			foreach($query_type->result_array() as $type_row){
				$class_result[$i][$j] = $type_row;
				$j++;
			}
			$i++;
		}
		return $class_result;
    }
    
    
    /*
     * 获取具体水果品种       
    */
    function search_fruits_type($fruits_class_id){
    	$sql = "SELECT * FROM fruits_type WHERE fruits_class_id=".$fruits_class_id;
    	$query_type = $this->db->query($sql);
    	return $query_type;
    }

}
?>