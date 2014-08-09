<?php 
	class Discount_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 根据水果大类获取水果品种      
    */
    function search_discount(){
    	$sql = "SELECT * FROM discount";
    	$query_class = $this->db->query($sql);
		$result=array();
		$i = 0;
		foreach ($query_class->result_array() as $row){
			$type_id = $row['discount_type_id'];
			$this->db->where('type_id',$type_id);
			$temp = $this->db->get('fruits_type');
			$temp1 = $temp->row_array();
			$type_name = $temp1['type_name'];
			$type_price = $temp1['type_price'];
			$row['type_name'] = $type_name;
			$row['type_price'] = $type_price;
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
  
}
?>