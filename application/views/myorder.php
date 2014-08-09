<?php
	header("Content-type: text/html; charset=utf-8");
	//$basket_number = $_COOKIE['basket_number'];
	if(isset($clear_cookie) && $clear_cookie){
		setcookie("basket_number", "0",time()+3600*24*30);
		setcookie("total_price", "0",time()+3600*24*30);
		//setcookie("total_price","0");
		//setcookie("basket_number","0");
		$basket_number = 0;
	}
	else if(isset($_COOKIE['basket_number'])){
		$basket_number = $_COOKIE['basket_number'];
		//echo $basket_number;
	}
	else
		$basket_number = 0;
?>
<!doctype html>
<html lang="en">
<head>
	<title>我的订单</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no" />
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
</head>
<body>
	<?php
		//echo $basket_number;
	?>
	<div class="menu-wrap">
		<div class="menu">
			<ul>
				<li id="buyfruit" class="left">
					<a href="<?=base_url().'first/display'?>">
						<i></i>
						<span>首页</span>
					</a>
				</li>
				<li id="prebuy" class="left">
					<a href="<?=base_url().'first/linkto_buyfruit'?>">
						<i></i>
						<span>选购</span>
					</a>
				</li>
				<li id="myorder" class="left  active">
					<a href="<?=base_url().'first/linkto_myorder'?>">
						<i></i>
						<span>订单</span>
					</a>
				</li>
				<li id="shopbasket" class="left">
					<a href="<?=base_url().'first/linkto_shopping_basket'?>">
						<i class="basket-number">
							<span class="type-total">
							<?php
								if(isset($clear_cookie) && $clear_cookie && isset($basket_number))
									echo $basket_number;
								else if(isset($basket_number))
									echo $basket_number;
								else
									echo $_COOKIE['basket_number'];
							?></span>
						</i>
						<span>购物篮</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="clearfix"><!-- hotfix-点击a背景边框高亮偏移bug --></div>
	</div>
	<div class="index-bar">
		<div class="index-bar-btn left2"></div>
		我的订单
		<div class="index-bar-btn right2"></div>
	</div>
	<div class="myorder-userinf">
		<div class="myorder-userinf-pic"></div>
		<div class="myorder-userinf-text">
			<div class="myorder-userinf-text-nametext">用户名称</div>
			<div class="myorder-userinf-text-name">水果达人</div><br/>
			<div class="myorder-userinf-text-userpoints">积分 : 0</div>
		</div>
		<div class="myorder-userinf-btn">修改</div>
		<a href="<?=base_url().'first/do_user_logout'?>" class="myorder-moneyinf-btn">注销登录</a>
	</div>
	<div class="myorder-moneyinf">
		<div class="myorder-moneyinf-money">账户余额 : ￥ 0.00</div>
		<a href="" class="myorder-moneyinf-btn">账户充值</a>
	</div>
	
	<?php
		$i = 0;
		while(isset($all_order[$i])){
		
	?>
	<div class="myorder-line"></div>
	<div class="myorder-order">
		<div class="myorder-order-header">
			<div class="myorder-order-header-icon">i</div>
			<div class="myorder-order-header-text">订单详情</div>
		</div>
		<div class="myorder-order-ordernumber">订单编号 : <?=$all_order[$i]['id']?> 下单时间：<?=$all_order[$i]['order_time']?>
			<a href="<?=base_url().'first/linkto_order_detail/'.$all_order[$i]['id']?>"><div class="myorder-order-distributioninf-btn">查看详情</div></a>
		</div>

		<div class="myorder-order-statistics">合计: ¥<?=$all_order[$i]['order_money']?>
			<div class="myorder-order-distributioninf-btn">取消订单</div>
		</div>
		
		
		
	</div>
	<?php
		$i++;
		}
	?>
	<div class="selectfruit-blank"></div>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>