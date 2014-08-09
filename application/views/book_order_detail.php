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

	?>
	<div class="menu-wrap">
		<div class="menu">
			<ul>
				<li id="buyfruit" class="left active">
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
				<li id="myorder" class="left">
					<a href="<?=base_url().'first/linkto_myorder'?>">
						<i></i>
						<span>订单</span>
					</a>
				</li>
				<li id="shopbasket" class="left">
					<a href="<?=base_url().'first/linkto_shopping_basket'?>">
						<i class="basket-number">
							<span class="type-total"><?=$_COOKIE['basket_number']?></span>
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
	
	<div class="myorder-line"></div>
	<div class="myorder-order">
		<div class="myorder-order-header">
			<div class="myorder-order-header-icon">i</div>
			<div class="myorder-order-header-text">订单详情</div>
			<a class="myorder-order-header-history" href="<?=base_url().'first/linkto_myorder/1'?>">历史清单>></a>
		</div>
		<div class="myorder-order-ordernumber">订单编号 : <?=$book_order_detail['book_order_detail_id']?></div>
		
		<div class="myorder-order-inf">
			<div class="myorder-order-inf-text">水果详情:</div>
			<div class="myorder-order-inf-item">
				<div class="myorder-order-inf-item-fruitname"><?=$book_order_detail['type_name']?></div>
				<div class="myorder-order-inf-item-weightandmoney">
					<div class="myorder-order-inf-item-weightandmoney-text up">下单重量：<?=$book_order_detail['book_order_detail_amout']?>斤  下单金额：¥ <?=$book_order_detail['book_order_detail_totalmoney']?></div><br/>
					<div class="myorder-order-inf-item-weightandmoney-text down">实际重量：<?=$book_order_detail['book_order_actual_amout']?>斤  实际金额：¥ <?=$book_order_detail['book_order_actual_totalmoney']?></div>
				</div>
				
				<a href="<?=base_url().'first/linkto_comment/'.$book_order_detail['book_order_show_id'].'/'.$book_order_detail['book_order_detail_id']?>">
				<div class="myorder-order-distributioninf-btn">
				评价
				</div>
				</a>
				
			</div>
			
		</div>
		
		
		<div class="myorder-order-distributioninf">
			<div class="myorder-order-distributioninf-text left">下单时间:</div>
			<div class="myorder-order-distributioninf-text right"><?=$book_order_detail['book_order_detail_starttime']?></div>
			<div class="myorder-order-distributioninf-text left">配送时间:</div>
			<div class="myorder-order-distributioninf-text right"><?=$book_order_detail['book_order_detail_starttime']?></div>
			<div class="myorder-order-distributioninf-text left">收货地址:</div>
			<div class="myorder-order-distributioninf-text right"><?=$user_receive['user_address']?><br/><?=$user_receive['user_current_name']?> 收</div>
			<div class="myorder-order-distributioninf-text left">联系电话:</div>
			<div class="myorder-order-distributioninf-text right"><?=$user_receive['user_tel']?></div>
			<div class="myorder-order-distributioninf-text left">订单备注:</div>
			<div class="myorder-order-distributioninf-text right"><?=$book_order_detail['book_order_detail_remarks']?></div>
		</div>
		<!--<div class="myorder-order-distributioninf-btn">取消订单</div>-->
		订单状态：<?=$book_order_detail['book_order_detail_state']+1?>
		<div class="myorder-order-distributionschedule schedule<?=$book_order_detail['book_order_detail_state']+1?>"></div>
		<div class="myorder-order-distributionscheduletext">
			<div class="myorder-order-distributionscheduletext-text left">已下单</div>
			<div class="myorder-order-distributionscheduletext-text mid">已处理</div>
			<div class="myorder-order-distributionscheduletext-text mid">已配送</div>
			<div class="myorder-order-distributionscheduletext-text right">已签收</div>
		</div>
	</div>
	<div class="selectfruit-blank"></div>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>