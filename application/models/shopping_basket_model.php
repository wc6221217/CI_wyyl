<?php 
	class Shopping_basket_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->helper('cookie');
    }
    
    
    /*
    * 获取购物篮内容
    */
    function search_shopping_basket(){
		$query_type = $this->db->get('fruits_type');
		$type_result = array();
		$i = 0;
		foreach($query_type->result_array() as $row){
			$type_result[$i] = $row;
			$i++;
		}
		$query_package = $this->db->get('package_show');
		$package_result = array();
		$j = 0;
		foreach($query_package->result_array() as $row){
			$package_result[$j] = $row;
			$j++;
		}
		$data = array('type_result'=>$type_result,'package_result'=>$package_result);
		return $data;
		
    }
    
    
	//添加水果品种到购物篮
	function add_fruits_type($user_id,$type_id,$type_name,$type_amount,$type_price){
		if($this->input->get_cookie('shoppingcart_count') === NULL){
			$this->input->set_cookie('shoppingcart_count',1);
			$new_count = $this->input->get_cookie('shoppingcart_count');
		}
		else
			$new_count = $this->input->get_cookie('shoppingcart_count') + 1;
		
		
		//将字符串存储到cookie中
		$shopping_detail = $user_id . "|" . $type_id ."|".$type_name."|".$type_amount."|".$type_price."|".($type_amount * $type_price);
		$this->input->set_cookie($new_count,$shopping_detail);
	}
	
	//从购物篮修改水果品种数量，要不交给前端用js来写？
	function update_fruits_type(){
		
	}
	
	//从购物篮移除水果品种
	function delete_fruits_type(){
		
	}
	
	

	//添加套餐到购物篮
	function add_pacakge($user_id, $package_id, $package_name, $package_amount, $package_price, $package_detail){
		if($this->input->get_cookie('shoppingcart_count') === NULL){
			$this->input->set_cookie('shoppingcart_count',1);
			$new_count = $this->input->get_cookie('shoppingcart_count');
		}
		else
			$new_count = $this->input->get_cookie('shoppingcart_count') + 1;
		
		
		//将字符串存储到cookie中
		$shopping_detail = $user_id . "|" . $package_id ."|".$package_name."|".$package_amount."|".$package_price."|".($package_amount * $package_price);
		$this->input->set_cookie($new_count,$shopping_detail);
	}
	
	
	
	//计算购物篮中总价
	function cal_total_price(){
		$total_price = 0.0;
	$query_type = $this->db->get('fruits_type');
		$type_result = array();
		$i = 0;
		foreach($query_type->result_array() as $row){
			$type_result[$i] = $row;
			$i++;
		}
		$query_package = $this->db->get('package_show');
		$package_result = array();
		$j = 0;
		foreach($query_package->result_array() as $row){
			$package_result[$j] = $row;
			$j++;
		}
		$i = 0;
		foreach($type_result as $row){
			$type_id = $row['type_id'];
			if(isset($_COOKIE[$type_id]) && $_COOKIE[$type_id]>0){
				$i++;
				$total_price += number_format($row['type_price']*$_COOKIE[$type_id], 1);
				setcookie('total_price',$total_price);
			}
		}
		foreach($package_result as $row){
			$package_show_id = $row['package_show_id'];
			if(isset($_COOKIE[$package_show_id]) && $_COOKIE[$package_show_id]>0){
				$i++;
				$total_price += number_format($row['package_price']*$_COOKIE[$package_show_id], 1);
				setcookie('total_price',$total_price);
			}
		}
	}
	
}

/* End of file shopping_basket_model.php */
/* Location: ./application/models/shopping_basket_model.php */