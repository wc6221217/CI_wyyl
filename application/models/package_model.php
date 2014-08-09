<?php 
	class Package_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取所有套餐
    * 
    *        
    */
    function search_package(){
    	$sql = "SELECT * FROM package_show";
    	$query_class = $this->db->query($sql);
		
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }

	function search_detail($package_id){
		$this->db->where('package_id', $package_id);
		$query = $this->db->get('package');
		$result = $query->row();
		return $result;
	}
	
}
?>