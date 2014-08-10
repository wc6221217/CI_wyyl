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
	<title>选择水果</title>
	<!-- <meta name="viewport"content="target-densitydpi =device-dpi, width=device-width " /> -->
	<meta name="viewport" content="width=device-width,user-scalable=no" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no" />
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
</head>
<body>
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
		定制你喜欢的水果
		<div class="index-bar-btn right2"></div>
	</div>
	<div class="selectfruit-favoritefruit-bar">
		<div class="selectfruit-favoritefruit-bar-icon"></div>
		<div class="selectfruit-favoritefruit-bar-text">水果习惯</div>
	</div>
	<div class="selectfruit-selectavoritefruit">
	<?php foreach ($custom_fruits as $key => $value): ?>
		<?php  $checked = ""; ?> 
	<?php foreach ($private_custom as $key_cf => $value_cf): ?>
		<?php 
			if($value_cf['fruit_class_id']==$value['fruits_class_id']){
				$checked = " checked";
				break;
			}else{
				$checked = "";
			}
		?>
	<?php endforeach ?>
		<div class="selectfruit-selectavoritefruit-item" id="<?="item".$value['fruits_class_id']?>">
			<img class="selectfruit-selectavoritefruit-item-icon<?=$checked?>" src="<?=$value['fruits_class_picture']?>" id="item<?=$value['fruits_class_id']?>-pic" alt="<?=$value['fruits_class_name']?>">
			<div class="selectfruit-selectavoritefruit-item-text<?=$checked?>" id="item<?=$value['fruits_class_id']?>-text"><?=$value['fruits_class_name']?></div>
		</div>
	<?php endforeach ?>
	</div>
	<a href="#" class="selectfruit-btn">完成习惯定制</a>
	<div class="selectfruit-blank"></div>

	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>