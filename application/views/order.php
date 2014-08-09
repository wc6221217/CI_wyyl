<?php
	//echo $book_order_amount.'<br>';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>订单确认</title>
	<link rel="stylesheet" href="<?=base_url().'css/reset.css'?>">
	<link rel="stylesheet" href="<?=base_url().'css/style.css'?>">
</head>
<body>
	<form action="<?=base_url().'first/do_order_submit'?>" id="" method="post">
		<input type="hidden" name="user_id" value="<?php
							if($_SESSION['is_logined']=='1')
								echo $_SESSION['user_id'];
						?>
		">
		<input type="hidden" name="is_book_order" value="<?=isset($is_book_order)?>">
		<input type="hidden" name="type_price" value="<?php
		
			if(isset($type_price))
				echo $type_price;
		?>">
		<input type="hidden" name="book_order_show_id" value="<?php
			if(isset($is_book_order) && isset($book_order_show_id))
				echo $book_order_show_id;
		?>">
		<input type="hidden" name="type_id" value="<?php
		
			if(isset($type_id))
				echo $type_id;
		?>">
		<input type="hidden" name="book_order_amount" value="<?php
		if(isset($book_order_amount))
				echo $book_order_amount;
		
		?>">
		<input type="hidden" name="total_money" value="<?php
		if(isset($total_money))
				echo $total_money;
		?>">
		<input type="hidden" name="order_time" value="<?=date('Y-m-d H:i:s', time())?>">
		<div class="order-submit-wrap">
			<div class="order-submit">
				<div>
					合计：&yen;<span class="total">
					<?php
					if(isset($total_money))
						echo $total_money;
					else
						echo $_COOKIE['total_price'];
					?>
					</span>
					<input type="hidden" value="<?=$_COOKIE['total_price']?>" name="order_money">
					<button >
						<span>提交订单</span>
					</button>
				</div>		
			</div>
			<div class="clearfix"><!-- hotfix-点击a背景边框高亮偏移bug --></div>
		</div>

		<div class="comment order-confirm">
			<span class="line"></span>
			<div class="comment-item">
				<div class="money-wrap">
					<a href="#">
						<div class="add-addr on">
							<div class="">
								<span class="left"></span>
								<a href="<?=base_url().'first/linkto_add_user_receive'?>"><p class="left">添加地址</p></a>
							</div>
						</div>
					</a>
					<div class="my-addr">
						<ul>
							<?php
								$i=0;
								$num_rows = count($user_receive);
								//echo $num_rows;
								foreach($user_receive as $row){
							?>
							<li class="">
								
								<p> <label class="checkbox" for="user_receive">
								</label><?=$row['user_address']?>- <?=$row['user_current_name']?></p>
								<p class="tel"><?=$row['user_tel']?></p>
								<!--这里是用刷新全部页面完成的，可以用ajax优化-->
								<a href="<?=base_url().'first/do_delete_user_receive/'.$row['user_address_id'].'/1'?>">&times;</a>
							</li>
							<input type="radio" checked="checked" name="user_receive_id" style="display:none;" value="<?=$row['user_address_id']?>">
							<?php
									$i++;
								}
							?>
						</ul>
						
					</div>
				</div>
			</div>
			
			<div class="comment-item">
				<div class="star-wrap order-icon-wrap">
					<span class="icon-time"></span>
					<span>配送时间</span>
				</div>
				<div class="pay-wrap time-wrap">
					<ul class="clearfix">
						<?php
							if(!isset($is_book_order) || !$is_book_order){
						?>
						<li>
							<label class="checkbox" for="radiobox-now">
							</label>
							<label for="radiobox-now">
							立即送 (30分钟左右)
							</label>
							<input type="radio" checked="checked" name="send-mode" value="0" id="radiobox-now">
						</li>
						<?php
							}
						?>
						<li class="send-in-time">
							<label class="checkbox checked" for="radiobox-time">
							</label>
							<label for="radiobox-time">
							定时送
							</label>
							<input type="radio" name="send-mode" value="1" id="radiobox-time">
							<select name="send-time" id="time-choose">
								<option value="1">早上 7:00-8:00</option>
								<option value="2">中午 11:30-12:30</option>
								<option value="3">晚上 17:00-19:00</option>
							</select>
						</li>
					</ul>
				</div>
			</div>
			<div class="comment-item">
				<div class="star-wrap order-icon-wrap">
					<span class="icon-pay"></span>
					<span>支付方式</span>
				</div>
				<div class="pay-wrap">
					<ul class="clearfix">
						<li>
							<label class="checkbox checked" for="radiobox1">
							</label>
							<label for="radiobox1">
							现金支付
							</label>
							<input type="radio" name="pay-mode" checked="checked" value="1" id="radiobox1">
						</li>
						<li>
							<label class="checkbox" for="radiobox2">
							</label>
							<label for="radiobox2">
							余额支付
							</label>
							<input type="radio" name="pay-mode" value="2" id="radiobox2">
						</li>
						<li>
							<label class="checkbox" for="radiobox3">
							</label>
							<label for="radiobox3">
							支付宝支付
							</label>
							<input type="radio" name="pay-mode" value="3" id="radiobox3">
						</li>
					</ul>
				</div>
			</div>
			<div class="comment-item">
				<div class="star-wrap order-icon-wrap">
					<span class="icon-pay"></span>
					<span>订单备注</span>
				</div>
				<div class="note-wrap">
					<textarea name="order_remarks" id="" cols="30" rows="10" placeholder="备注"></textarea>
				</div>
			</div>
		</div>
	</form>
	<script src="<?=base_url().'js/jquery.min.js'?>"></script>
	<script src="<?=base_url().'js/script.js'?>"></script>
</body>
</html>