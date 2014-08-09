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
	<title>优惠</title>
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
				<li id="prebuy" class="left  active">
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
		优惠活动
		<div class="index-bar-btn right2"></div>
	</div>
		<div class="privilege-item-pic">
			<div class="slider">
				<div id='fruit-detail-slider' class='swipe' style='height:150px'>
					<ul>
						<li style='display:block'>
							<div>
								<a href="#">
									<img src="img/type-pic.png" alt="">
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
		<?php
			$i = 0;
			while(isset($discount[$i])){
		?>
		<div class="privilege-item-txt">
			周一 烟台大樱桃半价出售，欢迎选购！
		</div>
		<div class="privilege-item-inf">
			<div class="privilege-item-inf-left">
				<div class="privilege-item-inf-icon"></div>
				<div class="privilege-item-inf-name"><?=$discount[$i]['type_name']?></div>
				<div class="privilege-item-inf-buyway">按箱销售</div><br/>
				<div class="privilege-item-inf-moneyandunit">
					<div class="privilege-item-inf-money"><?=$discount[$i]['type_price']?></div>
					<div class="privilege-item-inf-unit">/份</div>
				</div>
				<div class="privilege-item-inf-moneyandunit">
					<div class="privilege-item-inf-money"><?=$discount[$i]['discount_type_price']?></div>
					<div class="privilege-item-inf-unit">/份</div>
					<div class="privilege-item-inf-moneyandunit-linethrough"></div>
				</div>
			</div>
			<div class="privilege-item-inf-right" id="privilege-item1">
				<div style="display:none;" class="type_id"><?=$discount[$i]['discount_type_id']?></div>
				<div class="privilege-item-inf-right-minus">-</div>
				<div class="privilege-item-inf-right-number" id="privilege-item1-number">
				<?php
						if(isset($_COOKIE[$discount[$i]['discount_type_id']]) && $_COOKIE[$discount[$i]['discount_type_id']])
							echo $_COOKIE[$discount[$i]['discount_type_id']];
						else
							echo 0;
					?>
				</div>
				<div class="privilege-item-inf-right-add">+</div>
			</div>
		</div>
		<?php
				$i++;
			}
		?>
		<div class="privilege-item-line"></div>
	</div>
	<div class="selectfruit-blank"></div>
	<div class="privilege-bottom-bar">
		<div class="privilege-bottom-bar-text">
			已选：1  总计：¥ 9.2
		</div>
		<div class="privilege-bottom-bar-btn">
			立刻抢购
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