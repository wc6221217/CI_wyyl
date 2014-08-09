<?php 
	class Special_performance_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 获取所有专场里面的所有水果
    */
    function search_special_performance(){
    	$query_class = $this->db->get('special_performance');
		$result=array();
		$i=0;
		foreach ($query_class->result_array() as $row){
			$result[$i]=$row;
			$special_performance_id = $row['special_performance_id'];
			$this->db->where('special_performance_id',$special_performance_id);
			$query_detail = $this->db->get('special_performance_detail');
			$j = 0;
			foreach($query_detail->result_array() as $item){
				$fruits_class_id = $item['fruits_class_id'];
				$this->db->where('fruits_class_id',$fruits_class_id);
				$this->db->select('fruits_class_name');
				$query_fruits_class_name = $this->db->get('fruits_class');
				//echo $j.'<br>';
				//echo $query_fruits_class_name->num_rows().'<br>';
				//print_r($query_fruits_class_name);
				if($query_fruits_class_name->num_rows()>0){
					$temp = $query_fruits_class_name->row_array();
					$fruits_class_name = $temp['fruits_class_name'];	//诡异的bug，$temp['fruits_class_name']可以正确echo，但是仍然报错
					$item['fruits_class_name'] = $fruits_class_name;
					$result[$i][$j] = $item;
					$fruits_class_id = $item['fruits_class_id'];
					$this->db->where('fruits_class_id',$fruits_class_id);
					$query_type = $this->db->get('fruits_type');
					$k = 0;
					foreach($query_type->result_array() as $itemlist){
						$result[$i][$j][$k] = $itemlist;
						$k++;
					}
				}
				$j++;
			}
			$i++;
		}
		return $result;
    }

	//获取专场具体品种项
	function search_special_performance_order($special_performance_id){
		//$sql = "INSERT into ordinary_order ";
		$this->db->where('special_performance_id', $special_performance_id);
		$query = $this->db->get('special_performance');
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