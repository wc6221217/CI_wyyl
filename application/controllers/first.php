<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class First extends CI_Controller {

	// 构造方法
	function __construct() {
		parent::__construct();
		// 加载计算模型
		//$this->load->database();
		header("Content-type: text/html; charset=utf-8");
		
		$this->load->helper('url');
		//$this->load->helper('ajax');
		$this->load->database();
		$this->load->library('session');
		session_start();
		
		$this->load->model('order_model');
		$this->load->model('user_model');
		$this->load->model('comment_model');
		$this->load->model('order_detail_model');
		$this->load->model('user_receive_model');
		$this->load->model('fruits_class_model');
		$this->load->model('fruits_type_model');
		$this->load->model('private_custom_model');
		$this->load->model('discount_model');
		$this->load->model('book_order_model');
		$this->load->model('book_order_detail_model');
		$this->load->model('package_model');
		$this->load->model('publish_pic_model');  
		$this->load->model('private_custom_model');
		$this->load->model('special_performance_model');
		$this->load->model('shopping_basket_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		
		$this->display();   
	}
	
	public function display(){
		//查找公告栏图片
		$pic = $this->publish_pic_model->search_publish_pic();
		//查找私人定制
		$private_custom = $this->private_custom_model->search_private_custom();
		$data = array('pic'=>$pic,'private_custom'=>$private_custom);
		//print_r($data);
		$this->load->view('index',$data);
	}
	
	//跳转到专场页面
	public function linkto_special_performance(){
		$special_performance = $this->special_performance_model->search_special_performance();
		$data = array('special_performance'=>$special_performance);
		$this->load->view('special_performance_view',$data);
	}
	
	//跳转到套餐页面
	public function linkto_package(){
		$package = $this->package_model->search_package();
		$data = array('package'=>$package);
		$this->load->view('package', $data);
	}
	
	//跳转到预购页面
	public function linkto_prebuy(){
		$book_order_show = $this->book_order_model->search_book_order_show();
		$data = array('book_order_show'=>$book_order_show);
		$this->load->view('prebuy', $data);
	}
	
	//跳转到优惠页面
	public function linkto_discount(){
		$discount = $this->discount_model->search_discount();
		$data = array('discount'=> $discount);
		$this->load->view('privilege', $data); 
	}
	
	//跳转到习惯定制页面
	public function linkto_private_custom(){
		if(!isset($_SESSION['is_logined'])){
			$this->linkto_login();
		}
		else{

			$user_id = $_SESSION['user_id'];
			$custom_fruits = $this->fruits_class_model->search_fruits_class();
			$private_custom = $this->private_custom_model->search_private_custom();

			$data = array(
				'private_custom' => $private_custom,
				'custom_fruits'  => $custom_fruits
				);
			
			$this->load->view('selectfruit', $data);
		}
	}
	
	//传递数据类型待定，未完成
	public function do_private_custom(){

		if($_SESSION['is_logined'] == '0'){

			echo false;

		}else{
		

			$ids = explode(',',($this->input->post("ids")));

		#print_r($ids);return;
			//处理习惯定制
			$this->private_custom_model->update_private_custom($ids);
			// $data = array('user_id'=> $user_id);
			// $this->load->view('index',$data);
			echo true;
		}
	}
	
	//跳转到选购页面
	public function linkto_buyfruit(){
		//查找了所有水果大类以及水果品种的信息
		$fruits = $this->fruits_class_model->search_fruits_class();
		$total_price = $this->shopping_basket_model->cal_total_price();
		$data = array('fruits'=>$fruits);
		$this->load->view('buyfruit', $data);
	}
	
	//跳转到我的订单页面
	public function linkto_myorder(){
		if(isset($_SESSION['is_logined']) && $_SESSION['is_logined'] == '1'){
			$user_id = $_SESSION['user_id'];
			$myorder = $this->order_model->search_all_order($user_id);
			$clear_cookie = false;
			$book_order = $this->book_order_detail_model->search_book_order_detail($user_id);
			$order_count = count($myorder);
			$book_order_count = count($book_order);
			$all_order = array();
			$count = $order_count + $book_order_count;
			$i = 0;
			for(;$i<$order_count;$i++){
				$all_order[$i]['id']=$myorder[$i]['order_id'];
				$all_order[$i]['order_time']=$myorder[$i]['order_time'];
				$all_order[$i]['order_money']=$myorder[$i]['order_money'];
				$all_order[$i]['order_state']=$myorder[$i]['order_state'];
			}
			for($j=0;$j<$book_order_count;$i++,$j++){
				$all_order[$i]['id']=$book_order[$j]['book_order_detail_id'];
				$all_order[$i]['order_time']=$book_order[$j]['book_order_detail_starttime'];
				$all_order[$i]['order_money']=$book_order[$j]['book_order_detail_totalmoney'];
				$all_order[$i]['order_state']=$book_order[$j]['book_order_detail_state'];
			}

			//按下单时间排序
			for ($m = 1; $m<$count; $m++){
				$temp = $all_order[$m];
				for ($n = $m; $n>0 && strcmp($all_order[$n-1]['order_time'],$temp['order_time'])<0; $n--){
					$all_order[$n] = $all_order[$n - 1];
				}
				$all_order[$n] = $temp;
			}
			
			$data = array('myorder'=> $myorder,'clear_cookie'=>$clear_cookie,'all_order'=>$all_order);
			//echo 'order_count:'.$order_count.'<br>';
			//echo 'book_order_count:'.$book_order_count.'<br>';
			
			$this->load->view('myorder', $data);
		}
		else{
			$this->linkto_login();
		}
	}
	
	//跳转到购物篮页面？这个是用js做？
	public function linkto_shopping_basket(){
		//查找了所有水果大类以及水果品种的信息
		if(isset($_SESSION['is_logined']) && $_SESSION['is_logined'] == '1'){
			$shopping_basket = $this->shopping_basket_model->search_shopping_basket();
			$data = array('type_result'=> $shopping_basket['type_result'],'package_result'=> $shopping_basket['package_result']);
			$this->load->view('basket',$data);
		}
		else
			$this->load->view('login');
	}
	
	//跳转到订单确认，未完成
	public function linkto_order_check(){
		if($_SESSION['is_logined'] == '0'){
			$this->linkto_login();
		}
		else{
			$user_id = $_SESSION['user_id'];
		$user_receive = $this->user_receive_model->search_user_receive($user_id);
		//预购订单
		if(null != $this->input->post('book_order')){
			$is_book_order = true;
			$type_id = $this->input->post('type_id');
			//echo $type_id.'<br>'.'yeah';
			$book_order_amount = $this->input->post('book_order_amount');
			$type = $this->fruits_type_model->search_detail($type_id);
			$type_price = $type['type_price'];
			//echo 'type_price:'.$type_price.'<br>';
			$total_money = $type_price * $book_order_amount;
			$book_order_show_id = $this->input->post('book_order_show_id');
			$data = array('user_receive'=> $user_receive,'is_book_order'=>$is_book_order,'type_id'=>$type_id,
				'book_order_amount'=>$book_order_amount,'total_money'=>$total_money,'type_price'=>$type_price,
				'book_order_show_id'=>$book_order_show_id);
		}
		//普通订单
		else
			$data = array('user_receive'=> $user_receive);
			$this->load->view('order', $data);
		}
	}
	
	//处理添加地址
	public function do_add_user_receive(){
		$user_id = $this->input->post('user_id');
		$user_current_name = $this->input->post('username');
		$user_address = $this->input->post('addr');
		$user_tel = $this->input->post('tel');
		$this->user_receive_model->add_user_receive($user_id, $user_current_name, $user_address, $user_tel);
		$this->linkto_order_check();
	}
	
	//处理删除地址
	public function do_delete_user_receive($user_receive_id,$user_id){
		$this->user_receive_model->delete_user_receive($user_receive_id);
		$this->linkto_order_check();
	}
	
	//处理提交订单
	public function do_order_submit(){
		//普通订单
		if(null == $this->input->post('is_book_order')){
			$user_id = $this->input->post('user_id');
		$order_money = $this->input->post('order_money');
		$order_time = $this->input->post('order_time');
		$pay_mode = $this->input->post('pay_mode');
		$order_remarks = $this->input->post('order_remarks');
		$order_deliverytime = $this->input->post('order_deliverytime');
		$user_receive_id = $this->input->post('user_receive_id');
		//$order_detail = $this->input->post('order_detail');
		$this->order_model->add_order($user_id, $order_money, $order_time, $pay_mode, $order_remarks, $order_deliverytime, $user_receive_id);
		
		//跳转到我的订单页面
		//$data = array('user_id', $user_id);
		setcookie("total_price",0);
		setcookie("basket_number",0);
		
		$clear_cookie = true;
		$myorder = $this->order_model->search_all_order($user_id);

			$book_order = $this->book_order_detail_model->search_book_order_detail($user_id);
			$order_count = count($myorder);
			$book_order_count = count($book_order);
			$all_order = array();
			$count = $order_count + $book_order_count;
			$i = 0;
			for(;$i<$order_count;$i++){
				$all_order[$i]['id']=$myorder[$i]['order_id'];
				$all_order[$i]['order_time']=$myorder[$i]['order_time'];
				$all_order[$i]['order_money']=$myorder[$i]['order_money'];
				$all_order[$i]['order_state']=$myorder[$i]['order_state'];
			}
			for($j=0;$j<$book_order_count;$i++,$j++){
				$all_order[$i]['id']=$book_order[$j]['book_order_detail_id'];
				$all_order[$i]['order_time']=$book_order[$j]['book_order_detail_starttime'];
				$all_order[$i]['order_money']=$book_order[$j]['book_order_detail_totalmoney'];
				$all_order[$i]['order_state']=$book_order[$j]['book_order_detail_state'];
			}
			
			//按下单时间排序
			for ($m = 1; $m<$count; $m++){
				$temp = $all_order[$m];
				for ($n = $m; $n>0 && strcmp($all_order[$n-1]['order_time'],$temp['order_time'])<0; $n--){
					$all_order[$n] = $all_order[$n - 1];
				}
				$all_order[$n] = $temp;
			}
			
			$data = array('myorder'=> $myorder,'clear_cookie'=>$clear_cookie,'all_order'=>$all_order);
			//echo 'order_count:'.$order_count.'<br>';
			//echo 'book_order_count:'.$book_order_count.'<br>';
			
			$this->load->view('myorder', $data);
		}
		//预购订单
		else{
			$user_id = $this->input->post('user_id');
			$book_order_detail_totalmoney = $this->input->post('total_money');
			//echo $book_order_detail_totalmoney.'<br>';
			$order_time = $this->input->post('order_time');
			$pay_mode = $this->input->post('pay_mode');
			$book_order_detail_remarks = $this->input->post('order_remarks');
			$book_order_detail_sendtime = $this->input->post('order_deliverytime');
			$user_address_id = $this->input->post('user_receive_id');
			$book_order_show_id = $this->input->post('book_order_show_id');
			$book_order_detail_amount = $this->input->post('book_order_amount');
			
			$book_order_detail_price = $this->input->post('type_price');
			$book_order_detail_starttime = $this->input->post('order_time');
			$book_order_detail_state = 0;
			
			//echo $book_order_show_id;
			$this->book_order_detail_model->add_book_order_detail($book_order_show_id,$user_id,$book_order_detail_amount,
				$book_order_detail_price,$book_order_detail_totalmoney,
				$book_order_detail_starttime,$book_order_detail_remarks,
				$book_order_detail_sendtime,$book_order_detail_state,$user_address_id);
				
			$myorder = $this->order_model->search_all_order($user_id);
			$clear_cookie = true;	//修改为true
			$book_order = $this->book_order_detail_model->search_book_order_detail($user_id);
			$order_count = count($myorder);
			$book_order_count = count($book_order);
			$all_order = array();
			$count = $order_count + $book_order_count;
			$i = 0;
			for(;$i<$order_count;$i++){
				$all_order[$i]['id']=$myorder[$i]['order_id'];
				$all_order[$i]['order_time']=$myorder[$i]['order_time'];
				$all_order[$i]['order_money']=$myorder[$i]['order_money'];
				$all_order[$i]['order_state']=$myorder[$i]['order_state'];
			}
			for($j=0;$j<$book_order_count;$i++,$j++){
				$all_order[$i]['id']=$book_order[$j]['book_order_detail_id'];
				$all_order[$i]['order_time']=$book_order[$j]['book_order_detail_starttime'];
				$all_order[$i]['order_money']=$book_order[$j]['book_order_detail_totalmoney'];
				$all_order[$i]['order_state']=$book_order[$j]['book_order_detail_state'];
			}
			
			//按时间排序
			
			for ($m = 1; $m<$count; $m++){
				$temp = $all_order[$m];
				for ($n = $m; $n>0 && strcmp($all_order[$n-1]['order_time'],$temp['order_time'])<0; $n--){
					$all_order[$n] = $all_order[$n - 1];
				}
				$all_order[$n] = $temp;
			}
			
			$data = array('myorder'=> $myorder,'clear_cookie'=>$clear_cookie,'all_order'=>$all_order);
			//echo 'order_count:'.$order_count.'<br>';
			//echo 'book_order_count:'.$book_order_count.'<br>';
			
			$this->load->view('myorder', $data);
		}
	}
	
	//处理取消订单
	public function do_order_cancel($orer_id){
		$this->order_model->order_cancel($order_id);

		$this->linkto_myorder();
	}
	
	//处理提交预购订单，未完成
	public function do_book_order_submit(){
		
	}
	
	//处理取消预购订单
	public function do_book_order_cancel($book_orer_id){
		$this->book_order_model->book_order_cancel($book_order_id);
		$this->linkto_myorder();
	}
	
	//跳转到充值页面
	public function linkto_charge(){
		$this->load->view('charge');
	}
	
	//跳转到添加评论页面
	public function linkto_comment($fruits_type_id,$order_id){	//这里的fruits_type_id是通用id，包括水果品种、套餐和预购
		if($fruits_type_id>=700000000 && $fruits_type_id<800000000){
			$this->db->where('type_id',$fruits_type_id);
			$temp = $this->db->get('fruits_type');
			$fruit = $temp->row_array();
			$data = array('fruit'=>$fruit,'fruits_type_id'=>$fruits_type_id,'order_id'=>$order_id);
			$this->load->view('comment', $data);
		}
		else if($fruits_type_id>=600000000 && $fruits_type_id<700000000){
			$this->db->where('package_show_id',$fruits_type_id);
			$temp = $this->db->get('package_show');
			$package = $temp->row_array();
			$data = array('package'=>$package,'fruits_type_id'=>$fruits_type_id,'order_id'=>$order_id);
			$this->load->view('comment', $data);
		}
		//预购具体项
		else if($fruits_type_id>=800000000 && $fruits_type_id<900000000){
			$this->db->where('book_order_show_id',$fruits_type_id);
			$temp = $this->db->get('book_order_show');
			$book_order_show = $temp->row_array();
			$type_id = $book_order_show['fruits_type_id'];
			$this->db->where('type_id',$type_id);
			$temp1 = $this->db->get('fruits_type');
			$fruit = $temp1->row_array();
			$book_order_show['type_name'] = $fruit['type_name'];
			$book_order_show['type_price'] = $fruit['type_price'];
			$data = array('book_order_show'=>$book_order_show,'fruits_type_id'=>$fruits_type_id,'order_id'=>$order_id);
			$this->load->view('comment', $data);
		}
	}
	
	//处理添加评论
	public function do_add_comment(){
		if($_SESSION['is_logined'] == '0'){
			$this->linkto_login();
		}
		else{
		
			$user_id = $_SESSION['user_id'];
		$fruits_type_id = $this->input->post('fruits_type_id');
		$comment_marks = $this->input->post('comment_marks');
		$comment_content = $this->input->post('comment_content');
		$comment_time = $this->input->post('comment_time');
		$order_id = $this->input->post('order_id');
		//echo $comment_content.'<br>';
		//echo $order_id;
    	$data = array('user_id'=>$user_id, 'fruits_type_id'=>$fruits_type_id, 'comment_marks'=>$comment_marks,'comment_content'=>$comment_content, 'comment_time'=>$comment_time);
		$this->comment_model->add_comment($data);
		
		//完成之后跳转到订单详情页面
		//$data = array('user_id', $user_id);
		$this->linkto_order_detail($order_id);
		}
	}
	
	//跳转到查看详情页面，包括水果品种、套餐和预购
	public function linkto_detail($type_id){
		//这里需要进行判断，普通水果
		if($type_id>=700000000 && $type_id<800000000){
			$fruits_type_detail = $this->fruits_type_model->search_detail($type_id);
			$comment = $this->comment_model->search_comment($type_id);
			$data = array('fruits_type_detail'=>$fruits_type_detail,'comment'=>$comment);
			$this->load->view('detail',$data);
		}
		//套餐
		else if($type_id>=500000000 && $type_id<600000000){
			$package_detail = $this->package_model->search_detail($type_id);
			$comment = $this->comment_model->search_comment($type_id);
			$data = array('package_detail'=>$package_detail,'comment'=>$comment);
			$this->load->view('detail',$data);
		}
		//预购
		else if($type_id>=800000000 && $type_id<900000000){
			$book_order_detail = $this->book_order_model->search_detail($type_id);
			$comment = $this->comment_model->search_comment($type_id);
			$data = array('book_order_detail'=>$book_order_detail,'comment'=>$comment);
			$this->load->view('detail',$data);
		}
		
	}
	
	//链接到添加收货地址页面，应该需要传递user_id
	public function linkto_add_user_receive(){
		$this->load->view('add_user_receive');
	}
	
	//链接到订单详情页面
	public function linkto_order_detail($order_id){
		if($order_id>=100000000 && $order_id<200000000){
			$order_detail = $this->order_detail_model->search_order_detail($order_id);
			$order = $this->order_model->search_order_by_id($order_id);
			$user_receive = $this->user_receive_model->search_user_receive_by_id($order['user_address_id']);
			$data = array('order_detail'=>$order_detail, 'order'=>$order, 'user_receive'=>$user_receive);
			$this->load->view('order_detail', $data);
		}
		else if($order_id>=200000000 && $order_id<300000000){
			$book_order_detail = $this->book_order_detail_model->search_book_order_detail_by_id($order_id);
			$book_order = $this->book_order_model->search_detail($order_id);
			$user_receive = $this->user_receive_model->search_user_receive_by_id($book_order_detail['user_address_id']);
			$data = array('book_order_detail'=>$book_order_detail, 'book_order'=>$book_order, 'user_receive'=>$user_receive);
			$this->load->view('book_order_detail', $data);
		}

	}
	
	//链接水果详情页面
	public function linkto_detail_test($type_id){
		$fruits_type = $this->fruits_type_model->search_detail($type_id);
		$comment = $this->comment_model->search_comment($type_id);
		$data = array('fruits_type'=>$fruits_type, 'comment'=>$comment);
		$this->load->view('detail', $data);

	}
	
	
	//链接登录界面
	public function linkto_login(){
		$this->load->view('login');
	}
	
	//检查登录
	public function check_login(){
		$user_tel = $this->input->post('tel');
		$user_password = $this->input->post('login_password_encoded');
		$result = $this->user_model->user_login($user_tel, $user_password);
		if($result['flag']){
			$data = array('user_id'=>$result['user_id']);
			$_SESSION['is_logined'] = '1';
			$_SESSION['user_id'] = $result['user_id'];
			
			setcookie('user_tel',$result['user_tel'],time()+3600*24*7);	//cookie保存一周
			setcookie('user_password',$result['user_password'],time()+3600*24*7);
			
			$this->display();
		}
		else{
			$_SESSION['is_logined'] = '0';
			$data = array('message'=>$result['message']);
			$this->load->view('login_failure',$data);
		}
	}
	
	//链接注册页面
	public function linkto_register(){
		$this->load->view('reg');
	}
	
	//处理注册
	public function check_register(){
		$user_tel = $this->input->post('tel');
		$encoded_password = $this->input->post('encoded_password');
		$encoded_password_conform = $this->input->post('encoded_password_conform');
		if($encoded_password != $encoded_password_conform){
			
			echo "密码不一样";
			echo $encoded_password.'<br>';
			echo $encoded_password_conform.'<br>';
		}
		$result = $this->user_model->user_register($user_tel, $encoded_password, $encoded_password_conform);
		if($result['flag'] == true){
			$message = "已注册成功，请登录！";
			$data = array('message'=>$message);
			$this->load->view('login',$data);
		}
		else{
			$data = array('message'=>$result['message']);
			$this->load->view('register_failure',$data);
		}
		
	}
	
	public function do_user_logout(){
		if($_SESSION['is_logined'] == '0'){
			$this->linkto_login();
		}
		else{
			$user_id = $_SESSION['user_id'];
			$this->user_model->user_logout('$user_id');
			$this->display();
		}
	}
	
	public function linkto_test_user_receive(){
		$this->load->view('test_user_receive');
		
	}
}

/* End of file first.php */
/* Location: ./application/controllers/first.php */