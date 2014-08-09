<?php 
	class User_receive extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取收货地址     
    */
    function search_user_receive($user_id){
    	$sql = "SELECT * FROM user_receive";
    	$query_class = $this->db->query($sql);
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
	
	//function check_
  
}
?>