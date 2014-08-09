<?php 
	class User_login extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
     * 获取证券账户的所有委托单
    * account_id: 证券账号
    * 返回值: 成功则返回账户下所有委托单信息的json数据
    *        失败则返回'fail'
    */
    function check($account_id){
    	$sql = "SELECT * FROM se_1_commision_order WHERE account_id='$account_id' and valid=1";
    	$query = $this->db->query($sql);
    	if ($query->num_rows() > 0)
		{
			$commisions=array();
			$i=0;
			foreach ($query->result_array() as $row)
			{
				$commisions[$i]=$row;
				$i++;
			}
			return json_encode($commisions);
		}
    	else{
	    	return 'fail';
    	}
    }

}
?>