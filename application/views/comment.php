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
	<title>评论</title>
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
	<form method="post" action="<?=base_url().'first/do_add_comment'?>">
	<input type="hidden" name="fruits_type_id" value="<?=$fruits_type_id?>">
	<input type="hidden" name="order_id" value="<?=$order_id?>">
	<input type="hidden" name="comment_time" value="<?=date("Y-m-d h:i:s")?>">
	
	<div class="comment">
		<span class="line"></span>
		<div class="comment-item">
			<ul class="clearfix">
				<li>
					<div class="pic-wrap">
						<img src="img/type-pic.png" alt="">
					</div>
				</li>
				<li class="name-wrap clearfix">
					<p class="fruit-name right"><?php
						if($fruits_type_id>=700000000 && $fruits_type_id<800000000)
							echo $fruit['type_name'];
						else if($fruits_type_id>=600000000 && $fruits_type_id<700000000)
							echo $package['package_name'];
						else if($fruits_type_id>=800000000 && $fruits_type_id<900000000)
							echo $book_order_show['type_name'];
					?> <br>
					<span>&yen;</span><span class="price"><?php
						if($fruits_type_id>=700000000 && $fruits_type_id<800000000)
							echo $fruit['type_price'];
						else if($fruits_type_id>=600000000 && $fruits_type_id<700000000)
							echo $package['package_price'];
						else if($fruits_type_id>=800000000 && $fruits_type_id<900000000)
							echo $book_order_show['type_price'];
					?></span>
					<span class="last">/ 斤</span>
					</p>
				</li>
				<li class="sale-by">
					<span>按个销售</span>
				</li>
				<li class="tool">
					
				</li>
			</ul>
			<p>
				<span class="left">
					<span class="buy-time">2014-07-04 21:37:19</span><br>
					2.4斤早春红玉
				</span>
				合计：&yen;
				<span class="total-price">16.7</span>
			</p>
			
			<div class="star-wrap">
				<span class="icon-heart"></span>
				<span>评分</span>
				<span class="stars">
					<a href="#" class="active"></a>
					<a href="#" class="active"></a>
					<a href="#" class="active"></a>
					<a href="#" class="active"></a>
					<a href="#" class="active"></a>
				</span>
				<input type="hidden" name="comment_marks" value="5" class="comment_marks">
			</div>
			<div class="write-cmt">
				<span>写评价</span>
			</div>
			<div class="cmt-content">
				<textarea name="comment_content" id="" cols="30" rows="10"></textarea>
			</div>
			
			
			
		</div>
		<input type="submit" class="comment-btn" value="发表评论">


	</div>
	</form>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js?1'?>"></script>
</body>
</html>