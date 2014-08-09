<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>登陆</title>
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css?1'?>">
</head>
<body>
	<?php
		if(isset($message)){
			echo $message;
		}
	?>
	<div class="user-form">
		<form action="<?=base_url().'first/check_login'?>" method="post">
			<div class="clearfix row">
				<span class="icon-user left"></span>
				<input type="text" name="tel" id="lg-tel-input" class="left" placeholder="请输入手机号码">
			</div>
			<div class="clearfix row">
				<span class="icon-lock left"></span>
				<input type="password" id="lg-psd-input" name="password" class="left" placeholder="请输入6位以上密码">
				<input type="hidden" id="login_password_encoded" name="login_password_encoded">
			</div>
			<div class="forget-passwd">
				<a href="#">忘记密码</a>
			</div>
			<button type="submit" class="login-btn" id="lg-btn">登陆</button>
		</form>
		<div class="no-account">
			<a href="<?=base_url().'first/linkto_register'?>">还没账号? 快速注册吧&gt;&gt;</a>
		</div>
	</div>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>