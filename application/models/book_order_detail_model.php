<?php 
	class Book_order_detail_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取所有预购订单 
    */
    function search_book_order_detail($user_id){
		$this->db->where('user_id',$user_id);
    	$this->db->order_by('book_order_detail_id','desc');
    	$query_class = $this->db->get('book_order_detail');
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
	
	//添加预购订单
	function add_book_order_detail($book_order_show_id,$user_id,$book_order_detail_amout,$book_order_detail_price,$book_order_detail_totalmoney,
		$book_order_detail_starttime,$book_order_detail_remarks,$book_order_detail_sendtime,$book_order_detail_state,$user_address_id){
		$data = array('book_order_show_id'=>$book_order_show_id,'user_id'=>$user_id,'book_order_detail_amout'=>$book_order_detail_amout,
		'book_order_detail_price'=>$book_order_detail_price,'book_order_detail_totalmoney'=>$book_order_detail_totalmoney,
		'book_order_detail_starttime'=>$book_order_detail_starttime,'book_order_detail_remarks'=>$book_order_detail_remarks,
		'book_order_detail_sendtime'=>$book_order_detail_sendtime,'book_order_detail_state'=>$book_order_detail_state,
		'user_address_id'=>$user_address_id);
		$this->db->insert('book_order_detail',$data);
	}
  
	//获取预购订单
	function search_book_order_detail_by_id($book_order_detail_id){
		$this->db->where('book_order_detail_id',$book_order_detail_id);
		$temp = $this->db->get('book_order_detail');
		$result=array();
		$i=0;
		$row = $temp->row_array();
			$book_order_show_id = $row['book_order_show_id'];
			$this->db->select('fruits_type_id');	
			$this->db->where('book_order_show_id',$book_order_show_id);
			$temp1 = $this->db->get('book_order_show');
			$temp2 = $temp1->row_array();
			$type_id = $temp2['fruits_type_id'];
			
			$this->db->select('type_name');
			$this->db->where('type_id',$type_id);
			$temp1 = $this->db->get('fruits_type');
			$temp2 = $temp1->row_array();

			$row['type_name'] = $temp2['type_name'];
			$result=$row;
		return $result;
	}
}
?>