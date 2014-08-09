<?php 
	class Comment_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 根据水果品种获取评论      
    */
    function search_comment($type_id){
		$this->db->limit(5);
		$this->db->order_by('comment_id','desc');
    	$this->db->where('fruits_type_id',$type_id);
		$query = $this->db->get('comment');
    	
		$result=array();
		$i=0;
		foreach ($query->result_array() as $row){
			$result[$i]=$row;
			$i++;
		}
		return $result;
    }
	
	//添加评论
	function add_comment($data){
    	$query_class = $this->db->insert('comment',$data);
    }
}
?>