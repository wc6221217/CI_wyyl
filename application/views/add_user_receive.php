<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>添加收货地址</title>
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
</head>
<body>
	
			<div class="comment-item">
				<div class="star-wrap order-icon-wrap">
					<span class="icon-addr"></span>
					<span>配送地址</span>
				</div>
				<div class="add-addr-info">
					<form action="<?=base_url().'first/do_add_user_receive'?>" method="post">
						<input type="hidden" name="user_id" value="<?php
							if($_SESSION['is_logined']=='1')
								echo $_SESSION['user_id'];
						?>">
						<ul class="clearfix">
							<li>
								<label class="left placeholder icon-refresh"></label>
								<label class="left">
								地址
								</label>
								<input type="text" name="addr" placeholder="请输入送货地址"><br>
							</li>
							<li>
								<label class="left placeholder"></label>
								<label class="left">
								收货人
								</label>
								<input type="text" name="username" placeholder="请输入收货人姓名"><br>
							</li>
							<li>
								<label class="left placeholder"></label>
								<label class="left">
								联系方式
								</label>
								<input type="text" name="tel" placeholder="请输入联系电话"><br>
							</li>
						</ul>
						<div class="addr-tool">
							<input type="submit" value="添加">
							<input type="reset" value="取消">
						</div>
					</form>
				</div>
			</div>

	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>