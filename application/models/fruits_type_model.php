<?php 
	class Fruits_type_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 根据水果大类获取水果品种      
    */
    function search_fruits_type($fruits_class_id){
    	$sql = "SELECT * FROM fruits_type where fruits_class_id = ".$fruits_class_id;
    	$query_class = $this->db->query($sql);
		
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
  
	//根据水果品种取详细信息
	function search_detail($type_id){
		$sql = "SELECT * FROM fruits_type where type_id = ".$type_id;
		$query_class = $this->db->query($sql);
		
		$result=array();
		$result = $query_class->row_array();
		return $result;
	}
	
	//根据水果品种取评论
	function search_comment($type_id){
		$sql = "SELECT * FROM fruits_type where type_id = ".$type_id;
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