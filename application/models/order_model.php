<?php 
	class Order_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
		//$this->load->helper('cookie');
    }
    
    
    /*
    * 获取用户所有普通订单，未完成
    */
    function search_all_order($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->order_by('order_id','desc');
    	$query_order = $this->db->get('order');
		
		$this->db->where('user_id',$user_id);
		$query_book_order_detail = $this->db->get('book_order_detail');
		
		$result=array();
		$i=0;
		foreach ($query_order->result_array() as $row){
			$order_id = $row['order_id'];
			$this->db->where('order_id',$order_id);
			$query_order_detail = $this->db->get('order_detail');
			$result[$i]=$row;
			$j = 0;
			foreach($query_order_detail->result_array() as $item){
				$order_detail_id = $item['order_detail_id'];
				$type_id = $item['type_id'];
				if($order_detail_id>=300000000 && $order_detail_id<400000000){
					$this->db->where('type_id',$type_id);
					$query_type = $this->db->get('fruits_type');
					$temp = $query_type->num_rows();
					$type_name = $temp['type_name'];
				}
				else if($order_detail_id>=400000000 && $order_detail_id<500000000){
					$this->db->where('package_show_id',$package_show_id);
					$query_type = $this->db->get('package_show');
					$temp = $query_type->num_rows();
					$type_name = $temp['package_name'];
				}
				$item['type_name'] = $type_name;
				$result[$i][$j] = $item;
			}
			
			$i++;
		}
		return $result;
    }

	//确认订单！
	function add_order($user_id, $order_money, $order_time, $pay_mode, $order_remarks, $order_deliverytime, $user_receive_id){
		//插入订单表
		$data = array('user_id'=>$user_id, 'order_money'=>$order_money, 'order_time'=>$order_time, 
			'pay_mode'=>$pay_mode, 'order_remarks'=>$order_remarks, 
			'order_deliverytime'=>$order_deliverytime, 'user_address_id'=>$user_receive_id
		);
		$this->db->insert('order',$data);
		$order_id = $this->db->insert_id();
		//将所有cookie存入order_detail表，然后清空cookie
		
		$fruits = $this->db->get('fruits_type');
		$i = 0;
		foreach($fruits->result_array() as $row){
			if(get_cookie($row['type_id']) > 0){
				$this->db->select('type_price');
				$this->db->where('type_id',$row['type_id']);
				$temp = $this->db->get('fruits_type');
				$temp1 = $temp->row_array();
				//print_r($temp1);
				$order_detail_price = $temp1['type_price'];
				$data = array('order_id'=>$order_id, 'type_id'=>$row['type_id'], 
				'order_detail_order_weight'=>get_cookie($row['type_id']),'order_detail_price'=>$order_detail_price,
				'order_detail_money'=> (get_cookie($row['type_id'])*$order_detail_price));
				$this->db->insert('order_detail', $data);
				setcookie($row['type_id'],'');
				$i++;
				//echo $row['type_id'].':'.$_COOKIE[$row['type_id']].'<br>';
			}
		}
		//套餐
		$package = $this->db->get('package_show');
		$i = 0;
		foreach($package->result_array() as $row){
			if(get_cookie($row['package_show_id']) > 0){
				$this->db->select('package_price');
				$this->db->where('package_show_id',$row['package_show_id']);
				$temp = $this->db->get('package_show');
				$temp1 = $temp->row_array();
				//print_r($temp1);
				$package_order_price = $temp1['package_price'];
				$data = array('order_id'=>$order_id, 'package_show_id'=>$row['package_show_id'], 
				'package_order_total_amount'=>get_cookie($row['package_show_id']),'package_order_price'=>$package_order_price);
				$this->db->insert('package_order', $data);
				setcookie($row['package_show_id'],'');
				$i++;
				//echo $row['type_id'].':'.$_COOKIE[$row['type_id']].'<br>';
			}
		}
		
		setcookie("total_price","0");
		setcookie("basket_number","0");
		
	}
	
	//取消订单，未完成
	function cancel_order($order_id){
		//$sql = "INSERT into ordinary_order ";
		
		$this->db->where('order_id',$order_id);
		$this->db->delete('ordinary_order');
	}
	
	function search_order_by_id($order_id){
		$this->db->where('order_id',$order_id);
		$temp = $this->db->get('order');
		$order = $temp->row_array();
		return $order;
	}
}
?>