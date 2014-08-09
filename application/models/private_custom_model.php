<?php 
	class Private_custom_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->helper('cookie');
    }
    
    
    /*
    * 获取所有用户定制图标
    * 
    * 返回值: 成功则返回所有水果大类
    *        
    */
    function search_private_custom(){
		if(isset($_SESSION['user_id'])){
			$user_id = $_SESSION['user_id'];
			$sql = "SELECT * FROM private_custom JOIN fruits_class ON fruits_class.fruits_class_id = private_custom.fruit_class_id where user_id=".$user_id." ORDER BY fruits_class_id";
			$query_class = $this->db->query($sql);
		
			$result=array();
			$i=0;
			foreach ($query_class->result_array() as $row){
				$result[$i]=$row;
				$i++;
			}
			return $result;
		}
		else{
			$result = array();
			return $result;
		}
    	
    }

	//更新用户定制图标，根据前端选择情况
	function update_private_custom($select_array){
	
		
		if(isset($_SESSION['user_id'])){

			$user_id = $_SESSION['user_id'];
			
			foreach ($select_array as $key => $value) {
			
				$data = array('user_id'=>$user_id, "fruit_class_id"=>$value);

				$this->db->where($data);
				
				$query = $this->db->get('private_custom');

				if($query->num_rows == 0){	/*插入*/

					$this->db->insert('private_custom', $data); 

				}else{	/*删除*/

					$this->db->delete('private_custom',$data);
				}
			}

			return true;

		}else{

			return false;
		}
		
	}
}
?>