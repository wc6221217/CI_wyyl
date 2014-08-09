
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>注册</title>
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css?1'?>">
</head>
<body>
	<div class="user-form">
		<form action="<?=base_url().'first/check_register'?>" method="post">
			<div class="clearfix row">
				<span class="icon-user left"></span>
				<input type="text" name="tel" class="left" placeholder="请输入手机号码">
			</div>
			<div class="clearfix row">
				<span class="icon-lock left"></span>
				<input type="password" name="password" class="left" placeholder="请输入6位以上密码">
				<input type="hidden" name="encoded_password" id="encoded_password">
			</div>
			<div class="clearfix row">
				<span class="icon-lock left"></span>
				<input type="password" name="password_conform" class="left" placeholder="请再输入一次密码">
				<input type="hidden" name="encoded_password_conform" id="encoded_password_conform">
			</div>
			<button type="submit" id="reg-btn" class="reg-btn login-btn">注册</button>
		</form>
	</div>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js?1'?>"></script>
	<script src="<?=base_url().'js/md5.js'?>"></script>
</body>
</html>