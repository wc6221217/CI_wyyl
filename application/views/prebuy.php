<?php
	if(isset($_COOKIE['basket_number'])){
		$basket_number = $_COOKIE['basket_number'];
		//echo $basket_number;
	}
	else
		$basket_number = 0;
?>
<!doctype html>
<html lang="en">
<head>
	<title>预购</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no" />
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
</head>
<body>
	<?php
		//print_r($book_order_show);
		header("Content-type: text/html; charset=utf-8");
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
							<span class="type-total"><?=$basket_number?></span>
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
		预购活动
		<div class="index-bar-btn right2"></div>
	</div>
	<div></div>
	
	<?php
		//print_r($book_order_show);
		$i = 0;
		while(isset($book_order_show[$i])){
	?>
	<form name="<?='prebuy'.$book_order_show[$i]['book_order_show_id']?>" action="<?=base_url().'first/linkto_order_check'?>" method="post">
		<input type="hidden" name="user_id" value="
			<?php
				if($_SESSION['is_logined']=='1')
					echo $_SESSION['user_id'];
			?>
		">
		<input type="hidden" name="book_order" value="true">
		<input type="hidden" name="book_order_show_id" value="<?=$book_order_show[$i]['book_order_show_id']?>">
		<input type="hidden" name="type_price" value="<?=$book_order_show[$i]['type_price']?>">
	<div class="privilege-item">
		<div class="privilege-item-pic"></div>
		<div class="privilege-item-txt">
			已有 <?=$book_order_show[$i]['book_order_total']?> 人预购  
			<?php
				echo date('m-d',strtotime($book_order_show[$i]['book_order_send_time']));
			?>发货
		</div>
		<div class="privilege-item-inf">
			<div class="privilege-item-inf-left">
				<div class="privilege-item-inf-icon"></div>
				<div class="privilege-item-inf-name"><?//=print_r($book_order_show);?></div>
				<div class="privilege-item-inf-name"><?=$book_order_show[$i]['type_name']?></div>
				<div class="privilege-item-inf-buyway">按箱销售</div><br/>
				<div class="privilege-item-inf-moneyandunit">
					<div class="privilege-item-inf-money"><?=$book_order_show[$i]['type_price']?></div>
					<div class="privilege-item-inf-unit">/份</div>
				</div>
			</div>
			<div class="prebuy-item-inf-right" id="privilege-item1">
				<input type="hidden" class="type_id" value="<?=$book_order_show[$i]['fruits_type_id']?>" name="type_id">
				<div class="prebuy-item-inf-right-minus">-</div>
				<input class="prebuy-item-inf-right-number" id="privilege-item1-number" value="0" name="book_order_amount">
				<div class="prebuy-item-inf-right-add">+</div>
			</div>
		</div>
		<div class="privilege-item-line"></div>
	</div>
	
	<input class="privilege-bottom-bar-btn" type="submit" value="立即抢购">
	</form>
	<?php
			$i++;
		}
	?>
	<div class="selectfruit-blank"></div>
	
	
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>