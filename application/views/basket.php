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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>购物篮</title>
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</head>

<body>
	<?php
		$total_price = 0.0;
		/*
		foreach($shopping_basket as $row){
			echo 'type_id:'.$row['type_id'].'<br>';
			if(isset($_COOKIE[$row['type_id']]) && $_COOKIE[$row['type_id']]>0)
			echo 'amount:'.$_COOKIE[$row['type_id']].'<br>';
		}
		*/
	?>
	<div id="data" style="display:none;">
		<div id="num_rows"><?=count($shopping_basket)?></div>
		<?php
			$i=0;
			while(isset($shopping_basket[$i])){
			
		?>
			<div id="<?='data'.$i?>"><?=$shopping_basket[$i]['type_id']?></div>
		<?php
				$i++;
			}
		?>
	</div>
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
				<li id="myorder" class="left">
					<a href="<?=base_url().'first/linkto_myorder'?>">
						<i></i>
						<span>订单</span>
					</a>
				</li>
				<li id="shopbasket" class="left active">
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
	<div class="basket-submit-wrap">
			<div class="basket-submit">
				<div>
					<!-- <div class="select-all left">
						<label class="checkbox">
						</label>
						全选
					</div> -->
					
					<button onClick="javascript:window.location.href='<?=base_url().'first/linkto_order_check'?>'">
						<span>结算 </span>
					</button>
				</div>		
			</div>
			<div class="clearfix"><!-- hotfix-点击a背景边框高亮偏移bug --></div>
		</div>

	<div class="basket-none" style="display:none;">
		<div class="basket-bg"></div>
		<p>购物车为空哦，快去选购吧!</p>
	</div>
	<div class="basket">
		
		<span class="line"></span>
		<div class="basket-item">
			<?php
				$i = 0;

				foreach($type_result as $row){
					$type_id = $row['type_id'];
					if(isset($_COOKIE[$type_id]) && $_COOKIE[$type_id]>0){
						$i++;
			?>
			<ul class="clearfix fruit-type">
				<li>
					<!-- <label class="checkbox checked" for="checkbox1">
					</label>
					<input type="checkbox" checked="checked" value="" id="checkbox1"> -->
					<div class="pic-wrap">
						<img src="img/type-pic.png" alt="">
					</div>
				</li>
				<li class="name-wrap clearfix">
					<p class="fruit-name right"><?=$row['type_name']?> <br>
					<span>&yen; </span><span class="price"><?=$row['type_price']?></span>
					<span class="last">/ 斤</span>
					</p>
				</li>
				<li class="sale-by">
					<span>按个销售</span>
				</li>
				<li class="tool">
					<div class="amount-wrap line-top">
						<a href="javascript:;" class="change-mount mount-sub"></a>
						<input type="text" name="{$value['name']}"  class="mount" value="<?=$_COOKIE[$type_id]?>" id="<?=$type_id?>">
						<a href="javascript:;" class="change-mount mount-add"></a>
					</div>
				</li>
			</ul>
			<?php
						$total_price += number_format($row['type_price']*$_COOKIE[$type_id], 1);
						setcookie('total_price',$total_price);
					}
				}
			?>
			<?php

				foreach($package_result as $row){
					$package_show_id = $row['package_show_id'];
					if(isset($_COOKIE[$package_show_id]) && $_COOKIE[$package_show_id]>0){
						$i++;
			?>
			<ul class="clearfix">
				<li>
					<!-- <label class="checkbox checked" for="checkbox1">
					</label>
					<input type="checkbox" checked="checked" value="" id="checkbox1"> -->
					<div class="pic-wrap">
						<img src="img/type-pic.png" alt="">
					</div>
				</li>
				<li class="name-wrap clearfix">
					<p class="fruit-name right"><?=$row['package_name']?> <br>
					<span>&yen; </span><span class="price"><?=$row['package_price']?></span>
					<span class="last">/ 斤</span>
					</p>
				</li>
				<li class="sale-by">
					<span>按个销售</span>
				</li>
				<li class="tool">
					<a href="#" class="sub"></a>
					<input class="number" name="number" value="<?=$_COOKIE[$package_show_id]?>" readonly="readonly" id="<?=$package_show_id?>"/>
					<a href="#" class="add"></a>
				</li>
			</ul>
			<?php
						$total_price += number_format($row['package_price']*$_COOKIE[$package_show_id], 1);
						setcookie('total_price',$total_price);
					}
				}
			?>
			<p>
				共<span class="amount"><?=$i?></span>份水果,合计：&yen; <input class="total-price" id="total-price" value="<?=$total_price?>"/>
			</p>
		</div>
		
		
	</div>
	
</body>
</html>