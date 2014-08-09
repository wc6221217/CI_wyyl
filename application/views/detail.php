<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>水果详情</title>
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
							<span class="type-total"><?=$_COOKIE['basket_number']?></span>
						</i>
						<span>购物篮</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="clearfix"><!-- hotfix-点击a背景边框高亮偏移bug --></div>
	</div>

	<div class="comment detail">
		<span class="line"></span>
		<div class="comment-item">
			<ul class="clearfix">
				<li class="name-wrap clearfix">
					<p class="fruit-name right">
						<span class="icon-edit"></span>
						<?=$fruits_type_detail['type_name']?>
					</p>
				</li>
				<li class="sale-by">
					<span>按个销售</span>
				</li>

				<li class="detail-price-wrap">
					<span>&yen;</span><span class="price"><?=$fruits_type_detail['type_price']?></span>
					<span class="last">/ 斤</span>
				</li>
			</ul>
			<p>
				<?=$fruits_type_detail['type_detail']?>
			</p>
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
			<div class="new-cmt">
				<span>最新评价</span>
			</div>
			<div class="detail-content">
				<ul>
					<?php
						foreach($comment as $item){
					?>
					<li>
						<span >评分：<?=ceil($item['comment_marks'])?></span>
						<span class="left username"><?=$item['user_name']?></span>
						<span class="right">
							<?php
								$i=0;
								while($i<ceil($item['comment_marks'])){
							?>
							<i class="icon-orange-star"></i>
							<?php
									$i++;
								}
							?>
						</span>
						<p>
					   		<?=$item['comment_content']?>
						</p>
					</li>
					<?php
						}
					?>
				</ul>
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