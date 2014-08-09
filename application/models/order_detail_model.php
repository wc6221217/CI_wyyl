<?php 
	class Order_detail_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取所有普通订单具体项
    */
    function search_order_detail($order_id){
    	$this->db->where('order_id',$order_id);
		$fruits = $this->db->get('order_detail');
		$result=array();
		$i=0;
		foreach ($fruits->result_array() as $row){
			$type_id = $row['type_id'];
			$this->db->select('type_name');
			$this->db->where('type_id',$type_id);
			$temp1 = $this->db->get('fruits_type');
			$temp2 = $temp1->row_array();
			$row['type_name'] = $temp2['type_name'];
			$result[$i]=$row;
			$i++;
		}
		
		$this->db->where('order_id',$order_id);
		$packages = $this->db->get('package_order');
		foreach ($packages->result_array() as $row){
			$package_show_id = $row['package_show_id'];
			$this->db->select('package_name');
			$this->db->where('package_show_id',$package_show_id);
			$temp1 = $this->db->get('package_show');
			$temp2 = $temp1->row_array();
			$row['package_name'] = $temp2['package_name'];
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
	
	
}
?>