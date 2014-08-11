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
	<title>购买水果</title>
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
		购买水果
		<div class="index-bar-btn right2"></div>
	</div>
	<?php 
		$i = 0;
		while(isset($fruits[$i])){
	?>
	<div class="buyfruit-item">
		<!--水果大类信息-->
		<div class="setmeal-item session-fruit-class">
			<img class="buyfruit-item-pic" src="<?=base_url().'/pic/fruit1.png'?>"/>
			<div class="setmeal-item-pic-new">新</div>
			<div class="setmeal-item-right">
				<div class="setmeal-item-right-name"><?=$fruits[$i]['fruits_class_name']?></div>
				<div class="setmeal-item-right-popularity">人气:90</div>
				
				<div class="buyfruit-item-text">186  评价     16  粉丝</div>
			</div>
		</div>
		<!--隐藏栏-->
		<div class="buyfruit-item-downnoshow" id="<?='no-show'.$i?>">
			<div class="buyfruit-item-changebar" >
				<div class="buyfruit-item-changebar-icon up"></div>
			</div>
		</div>
		<!--显示栏-->
		<div class="buyfruit-item-downshow" id="<?='show'.$i?>">
			<div class="buyfruit-item-changebar" >
				<div class="buyfruit-item-changebar-icon down"></div>
			</div>
			<!--水果品种栏-->
			<div class="buyfruit-item-downshow-item">
			<?php
				$j = 0;
				while(isset($fruits[$i][$j])){
			?>
				<div class="buyfruit-item-downshow-item-small" id="<?='show'.$i.'-item'.$j?>">
					<div class="buyfruit-item-downshow-item-small-text"><?=$fruits[$i][$j]['type_name']?></div>
					<div class="buyfruit-item-downshow-item-small-down">
						<div class="buyfruit-item-downshow-item-small-icon"></div>
						<div class="buyfruit-item-downshow-item-small-smalltext">40</div>
					</div>
				</div>
			<?php
					$j++;
				}
			?>
			</div>	
			<?php
				$j = 0;
				while(isset($fruits[$i][$j])){
			?>
			<!--水果品种购买版块-->
			<div class="buyfruit-item-downshow-item2" id="<?='show'.$i.'-item'.$j.'-content'?>">
				<img class="buyfruit-item-downshow-item2-pic" src="http://localhost/CI_wyyl/pic/fruit1.png"/>
				
				<div class="buyfruit-item-downshow-item2-righttext">
					<div class="buyfruit-item-downshow-item2-name"><?=$fruits[$i][$j]['type_name']?></div>
					<div class="buyfruit-item-downshow-item2-buyway">按个销售</div>
					<div class="buyfruit-item-downshow-item2-moneyandunit">
						<div class="buyfruit-item-downshow-item2-money">￥ <?=$fruits[$i][$j]['type_price']?></div>
						<div class="buyfruit-item-downshow-item2-unit">/斤</div>
						
					</div>
					<div class="setmeal-item-right-inf"><a href="<?=base_url().'first/linkto_detail/'.$fruits[$i][$j]['type_id']?>">详情：本西瓜瓤红脆口></a></div>
				</div>
				<div class="buyfruit-item-downshow-item2-btn" id="<?='show'.$i.'-item'.$j.'-btn'?>">
					
					<div class="buyfruit-item-downshow-item2-minus">-</div>
					
					<div class="buyfruit-item-downshow-item2-number" id="<?='show1-item'.$j.'-btn-number'?>">
					<?php
						if(isset($_COOKIE[$fruits[$i][$j]['type_id']]) && $_COOKIE[$fruits[$i][$j]['type_id']])
							echo $_COOKIE[$fruits[$i][$j]['type_id']];
						else
							echo 0;
					?>
					</div>
					<div class="buyfruit-item-downshow-item2-add">+</div>
					<div style="display:none;" id="<?='show1-item'.$j.'-btn-type_id'?>"><?=$fruits[$i][$j]['type_id']?></div>
					
				</div>
				
			</div>
			<?php
					$j++;
				}
			?>
		</div>
	</div>
	<?php
		$i++;
		}
	?>
	
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>