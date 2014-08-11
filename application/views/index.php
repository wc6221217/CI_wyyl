<?php
	header("Content-type: text/html; charset=utf-8");
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
	<title>首页</title>
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
		<div class="index-bar-btn left"></div>
		万有引力
		<div class="index-bar-btn right"></div>
	</div>
	<div class="notice-wrap">
		<div>
			<div class="slider">
				<div id='fruit-detail-slider' class='swipe' style='height:150px'>
					<ul>
						<li style='display:block'>
							<div>
								<a href="#">
									<img src="<?=base_url().'img/type-pic.png'?>" alt="">
									<!--<img src="<?=$pic['0']?>">-->
								</a>
							</div>
						</li>
						<li style='display:none'>
							<div>2</div>
						</li>
						<li style='display:none'>
							<div>3</div>
						</li>
						<li style='display:none'>
							<div>4</div>
						</li>
					</ul>
				</div>
				<ul id="position">
		   		   	<li class="on"></li>
		     		<li class=""></li>
		     		<li class=""></li>
		     		<li class=""></li>
		    	</ul>
			</div>
		</div>
	</div>
	<div class="clearfix">
		<div class="index-slectionbox">
			<a href="<?=base_url().'first/linkto_special_performance'?>" class="index-slectionbox-item">
				<div class="index-slectionbox-item-icon session"></div>
				<div class="index-slectionbox-item-text">专场</div>
			</a>
			<a href="<?=base_url().'first/linkto_package'?>" class="index-slectionbox-item">
				<div class="index-slectionbox-item-icon setmeal"></div>
				<div class="index-slectionbox-item-text">套餐</div>
			</a>
			<a href="<?=base_url().'first/linkto_prebuy'?>" class="index-slectionbox-item">
				<div class="index-slectionbox-item-icon prebuy"></div>
				<div class="index-slectionbox-item-text">预购</div>
			</a>
			<a href="<?=base_url().'first/linkto_discount'?>" class="index-slectionbox-item">
				<div class="index-slectionbox-item-icon privilege"></div>
				<div class="index-slectionbox-item-text">优惠</div>
			</a>
		</div>
	</div>
	<div class="clearfix">
		<div class="index-selectfruit">
			<div class="index-selectfruit-text">定制你喜欢的水果</div>
		
			<div class="clearfix">
				<div class="selectfruit-selectavoritefruit">
					<?php 
					if(isset($_SESSION['is_logined']) && $_SESSION['is_logined']=='1'){
					foreach ($private_custom as $key => $value){ ?>
					
					<div class="selectfruit-selectavoritefruit-item">
					<a href="<?=base_url().'first/linkto_buyfruit/#'.$value['fruits_class_id']?>">
					<img  class="selectfruit-selectavoritefruit-item-icon" src="<?=$value['fruits_class_picture']?>" alt="<?=$value['fruits_class_name']?>">
					<div class="selectfruit-selectavoritefruit-item-text" id="item1-text"><?=$value['fruits_class_name']?></div>
					</a>
					</div>
					<?php }
						
					}?>
				</div>
			</div>
			
			<div class="clearfix">
				<div class="index-selectfruit-btn-out">
					<a href="<?=base_url().'first/linkto_private_custom'?>">
						<span class="index-selectfruit-btn"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
	<script src="<?=base_url().'js/swipe.min.js'?>"></script>
		<script>
			$(function(){
				var bullets = $('.slider #position li');
				var slider = new Swipe(document.getElementById('fruit-detail-slider'), {
				    auto: 10000,
				    continuous: true,
				    callback: function(index,pos) {

				      bullets.siblings().removeClass('on');

				      bullets.eq(slider.getPos()).addClass('on');

				    }
				  });
			})
	</script>
</body>
</html>