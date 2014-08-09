<!doctype html>
<html lang="en">
<head>
	<title>套餐</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no" />
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
</head>
<body>
	<div class="menu-wrap">
		<div class="menu">
			<ul>
				<li id="buyfruit" class="left">
					<a href="<?=base_url().'first/display'?>">
						<i></i>
						<span>首页</span>
					</a>
				</li>
				<li id="prebuy" class="left active">
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
							<span class="basket_number"><?=$_COOKIE['basket_number']?></span>
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
		套餐
		<div class="index-bar-btn right2"></div>
	</div>
	<?php
		$count = count($package);
		
		foreach($package as $row){
	?>
	<div class="setmeal-item-line"></div>
	<div class="setmeal-item">
		<img class="setmeal-item-pic" src="./pic/fruit1.png"/>
		<div class="setmeal-item-pic-new">新</div>
		<div class="setmeal-item-right">
			<div class="setmeal-item-right-name" id="setmeal-item1-name"><?=$row['package_name']?></div>
			<div class="setmeal-item-right-popularity">人气:90</div>
			<div class="setmeal-item-right-inf"><a href="<?=base_url().'first/linkto_detail/'.$row['package_show_id']?>"><?=$row['package_remarks']?></a></div>
			<div class="setmeal-item-inf-moneyandunit">
			<div class="setmeal-item-inf-money">￥ <?=$row['package_price']?></div>
			<div class="setmeal-item-inf-unit">/份</div>
		</div>
		</div>
		
		<div class="setmeal-item-inf-right" id="setmeal-item1">
			<div style="display:none;" class="package_id"><?=$row['package_show_id']?></div>
			<div class="setmeal-item-inf-right-minus">-</div>
			<div class="setmeal-item-inf-right-number" id="setmeal-item1-number">
			<?php
				if(isset($_COOKIE[$row['package_show_id']]) && $_COOKIE[$row['package_show_id']])
					echo $_COOKIE[$row['package_show_id']];
				else
					echo 0;
			?>
			</div>
			<div class="setmeal-item-inf-right-add">+</div>
		</div>
	</div>
	<?php
		}
	?>
	
	<div class="selectfruit-blank"></div>
	<div class="privilege-bottom-bar">
		<div class="privilege-bottom-bar-text">
			已选：1  总计：¥ 9.2
		</div>
		<div class="privilege-bottom-bar-btn">
			选好了
		</div>
	</div>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>