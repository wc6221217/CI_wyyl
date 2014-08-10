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
	<title>专场</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no" />
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
<body>
	<?php
		//print_r($special_performance);
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
		专场
		<div class="index-bar-btn right2"></div>
	</div>
	<div class="session-bar">
		<div class="session-bar-item" id="sessioncont1-item">
			<div class="session-bar-item-icon pregnantwoman checked" id="sessioncont1-item-pic"></div>
			<div class="session-bar-item-text checked" id="session-item1-text"><?=$special_performance['0']['special_performance_name']?></div>
		</div>
		<div class="session-bar-item" id="sessioncont2-item">
			<div class="session-bar-item-icon loseweight" id="sessioncont2-item-pic"></div>
			<div class="session-bar-item-text" id="sessioncont2-item-text"><?=$special_performance['1']['special_performance_name']?></div>
		</div>
		<div class="session-bar-item" id="sessioncont3-item">
			<div class="session-bar-item-icon company" id="sessioncont3-item-pic"></div>
			<div class="session-bar-item-text" id="sessioncont3-item-text"><?=$special_performance['2']['special_performance_name']?></div>
		</div>
	</div>
	<?php
		$i = 0;
		while(isset($special_performance[$i])){
			$item = $special_performance[$i];
			$j = 0;
			while(isset($special_performance[$i][$j])){
	?>
	<div class="session-bar-line">
	</div>
	<div class="session-item show" id="sessioncont1">
		<!--水果大类信息-->
		<div class="setmeal-item">
			<img class="buyfruit-item-pic" src="<?=base_url().'/pic/fruit1.png'?>"/>
			<div class="setmeal-item-pic-new">新</div>
			<div class="setmeal-item-right">
			<!--<div class="setmeal-item-right-name"><</div>-->
				<? //print_r($special_performance);?>
				<div class="setmeal-item-right-name"><?=$special_performance[$i][$j]['fruits_class_name']?></div>
				<div class="setmeal-item-right-popularity">人气:90</div>
				<div class="setmeal-item-right-inf">详情：本西瓜瓤红脆口></div><br/>
				<div class="buyfruit-item-text">186  评价     16  粉丝</div>
			</div>
		</div>
		<div class="buyfruit-item-downnoshow" id="no-show<?=$j?>">
			<div class="buyfruit-item-changebar" >
				<div class="buyfruit-item-changebar-icon up"></div>
			</div>
		</div>
		<div class="buyfruit-item-downshow" id="show<?=$j?>">
			<div class="buyfruit-item-changebar" >
				<div class="buyfruit-item-changebar-icon down"></div>
			</div>
			<div class="buyfruit-item-downshow-item">
				<?php
					$k = 0;
					while(isset($special_performance[$i][$j][$k])){
					
				?>
				<div class="buyfruit-item-downshow-item-small" id="<?='show'.$j.'-item'.$k?>">
					<div class="buyfruit-item-downshow-item-small-text"><?=$special_performance[$i][$j][$k]['type_name']?></div>
					<div class="buyfruit-item-downshow-item-small-down">
						<div class="buyfruit-item-downshow-item-small-icon"></div>
						<div class="buyfruit-item-downshow-item-small-smalltext">40</div>
					</div>
				</div>
				<?php
						$k++;
					}
				?>
			</div>	
			<?php
				$k = 0;
				while(isset($special_performance[$i][$j][$k])){
			?>
			<div class="buyfruit-item-downshow-item2" id="<?='show'.$j.'-item'.$k.'-content'?>">
				<img class="buyfruit-item-downshow-item2-pic" src="./pic/fruit1.png"/>
				<div class="buyfruit-item-downshow-item2-righttext">
					<div class="buyfruit-item-downshow-item2-name"><?=$special_performance[$i][$j][$k]['type_name']?></div>
					<div class="buyfruit-item-downshow-item2-buyway">按个销售</div>
					<div class="buyfruit-item-downshow-item2-moneyandunit">
						<div class="buyfruit-item-downshow-item2-money">￥5.2</div>
						<div class="buyfruit-item-downshow-item2-unit">/斤</div>
					</div>
				</div>
				<div class="special-performance-item-downshow-item2-btn" id="show1-item1_sessioncont1-btn">
					<div style="display:none;" class="type_id"><?=$special_performance[$i][$j][$k]['type_id']?></div>
					<div class="special-performance-item-downshow-item2-minus">-</div>
					<div class="special-performance-item-downshow-item2-number" id="show1-item1_sessioncont1-btn-number">
						<?php
						if(isset($_COOKIE[$special_performance[$i][$j][$k]['type_id']]) && $_COOKIE[$special_performance[$i][$j][$k]['type_id']])
							echo $_COOKIE[$special_performance[$i][$j][$k]['type_id']];
						else
							echo 0;
						?>
					</div>
					<div class="special-performance-item-downshow-item2-add">+</div>
				</div>
			</div>
			<?php
					$k++;
				}
			?>
		</div>
	</div>
		<?php
			$j++;
		}
		?>
	<?php
		$i++;
	}
	?>
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