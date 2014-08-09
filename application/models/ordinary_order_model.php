<?php 
	class Ordinary_order_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取所有普通订单
    */
    function search_ordinary_order($user_id){
    	$sql = "SELECT * FROM ordinary_order where user_id= ".$user_id;
    	$query_class = $this->db->query($sql);
		
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }

	//确认订单！
	function add_ordinary_order($user_id){
		//$sql = "INSERT into ordinary_order ";
		$data = array();
		$this->db->where('user_id',$user_id);
		$this->db->insert('ordinary_order',$data);
	}
	
}
?>