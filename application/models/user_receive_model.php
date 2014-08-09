<?php 
	class User_receive_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 查询用户所有收货地址
    */
    function search_user_receive($user_id){
    	$sql = "SELECT * FROM user_receive WHERE user_id= ".$user_id;
    	$query_class = $this->db->query($sql);
		
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
	
	//添加收货地址
	function add_user_receive($user_id, $user_current_name, $user_address, $user_tel){
		$data = array('user_id'=>$user_id, 'user_current_name'=>$user_current_name,'user_address'=>$user_address,'user_tel'=>$user_tel);
		$this->db->insert('user_receive',$data);
	}
	
	//删除收货地址
	function delete_user_receive($user_receive_id){
		$this->db->where('user_address_id', $user_receive_id);
		$this->db->delete('user_receive');
	}
	
	function search_user_receive_by_id($user_receive_id){
		$this->db->where('user_address_id', $user_receive_id);
		$temp = $this->db->get('user_receive');
		$user_receive = $temp->row_array();
		return $user_receive;
	}
	
}

/* End of file user_receive_model.php */
/* Location: ./application/models/user_receive_model.php */