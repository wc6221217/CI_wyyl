<?php 
	class Book_order_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取所有预购
    * 
    *        
    */
    function search_book_order_show(){
    	$sql = "SELECT * FROM book_order_show";
    	$query_class = $this->db->query($sql);
		
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$type_id = $row['fruits_type_id'];
			$this->db->where('type_id', $type_id);
			$query_type_name = $this->db->get('fruits_type');
			$temp = $query_type_name->row_array();
			$type_name = $temp['type_name'];
			$type_price = $temp['type_price'];
			$row['type_name'] = $type_name;
			$row['type_price'] = $type_price;
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
	
	function search_detail($book_order_id){
		$this->db->where('book_order_show_id', $book_order_id);
		$query = $this->db->get('book_order_show');
		$result = $query->row_array();
		return $result;
	}

}
?>