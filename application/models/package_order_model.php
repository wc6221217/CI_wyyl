<?php 
	class Package_order_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取用户所有套餐订单
    * 
    *        
    */
    function search_package_order($user_id){
    	$sql = "SELECT * FROM package_order where user_id= ".$user_id;
    	$query_class = $this->db->query($sql);
		
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }

	//查找普通订单中的所有套餐项
	function search_package_order_by_order_id($order_id){
    	$this->db->where('');
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