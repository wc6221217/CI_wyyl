<?php 
	class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    /*
    * 查询用户
    */
    function search_user($user_id){
    	$sql = "SELECT * FROM user WHERE user_id= ".$user_id;
    	$query_class = $this->db->query($sql);
		
		$result=array();
		$i=0;
		if($query_class->num_rows() > 0)
			$result = $query_class->row();
		return $result;
    }
	
	//用户注册
	function user_register($user_tel, $encoded_password, $encoded_password_conform){
		$flag = true;
		$this->db->where('user_tel',$user_tel);
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			$message = "用户名已注册";
			$flag = false;
		}
		else{
			if(strlen($user_tel)<6){
				$message = "手机长度小于6位";
				$flag = false;
			}
			else{
				if($encoded_password !== $encoded_password_conform){
					$message = "两次输入密码不一致";
					$flag = false;
				}
				else{
					if(strlen($encoded_password) < 6){
						$message = "密码长度小于6位";
						$flag = false;
					}
				}
			}
			if($flag){
				$user_message = array('user_tel' => $user_tel, 'user_password' => $encoded_password);
				$this->db->insert('user',$user_message);
				
				if($this->db->affected_rows()>0){
					$flag = true;
					$message = "注册成功";
				}
				else{
					$flag = false;
					$message ="写入数据库失败";
				}
			}
		}
		$data = array('flag'=>$flag, 'message'=>$message);
		return $data;
	}
	
	//用户登录，未完成
	function user_login($user_tel, $user_password){
		$this->db->where('user_tel',$user_tel);
		$query = $this->db->get('user');
		if($query->num_rows() < 1){
			$message = "用户名不存在";
			$flag = false;
		}
		else{
			$row = $query->row_array();
			if($row['user_password'] != $user_password){
				$message = "用户名或密码不正确";
				$flag = false;
			}
			else{
				$message = "登录成功";
				$flag = true;
				$user_id = $row['user_id'];
			}
		}
		if($flag)
			$data = array('message'=>$message, 'flag'=>$flag, 'user_id'=>$user_id, 'user_tel'=>$user_tel, 'user_password'=>$user_password);
		else
			$data = array('message'=>$message, 'flag'=>$flag);
		return $data;
	}

	//用户注销
	function user_logout($user_id){
		$_SESSION['is_logined'] = '0';
		setcookie('user_tel','');
		setcookie('user_password','');
	}
}
?>