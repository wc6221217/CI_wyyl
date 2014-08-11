/*by zhan*/
$(function(){

	/*checkbox  选择*/
		(function(){
			
			/*点checkbox*/
			$('.order-confirm .checkbox').click(function(){

				var $that = $(this);

				$that.parents('ul').find('.checkbox').removeClass('checked');

				$that.addClass('checked');
			})

			/*点标签*/
			$('.order-confirm .checkbox').next().click(function(){

				var $that = $(this);

				$that.parents('ul').find('.checkbox').removeClass('checked');

				$that.prev().addClass('checked');
			})
			$('.my-addr').find('.checkbox').first().addClass('checked');
		})()

	/*添加地址*/
	;(function(){
		
		$('.add-addr').click(function(){
		
			//$(this).removeClass('on');

			//$('.add-addr-info-wrap').show();

		})
		
		var $addr_tool = $('.addr-tool');

		$addr_tool.children().first().click(function(){

			var $that = $(this);

			var $input = $addr_tool.prev().find('input');

			var add_flag = true;

			$.each($input, function(index, val) {
				
				// console.log(index);

				if($(val).val() == ""){

					alert('信息未填写完整');

					add_flag = false;

					return false;

				}else{

					// $that.parents('form').submit();
				}

				if(index==2){

					var reg_name = /^[0-9]{8,11}$/g;

                    if($(val).val().match(reg_name)==null){

                    	add_flag = false;

                      alert('请输入正确的电话号码');
                    }
				}

			});

			if(!add_flag){

				return false;
			}

			$('.add-addr').addClass('on');

		})

		/*取消添加地址*/
		$addr_tool.children().last().click(function(){

			$('.add-addr-info-wrap').hide();

			$('.add-addr').addClass('on');
		});

		$('.my-addr').find('li').first().addClass('on');
		
		$('.my-addr').on('click','li', function () {
			
			$(this).siblings('li').removeClass('on');

			$(this).addClass('on');

		});
		
	}())

	/*登陆,注册*/
	;(function(){

		/*登陆验证*/
		$('#lg-btn').click(function(event) {
			
			if($('#lg-psd-input').val().length<6){

				alert('密码长度错误');

				return false;
			}
			
			var $ps = $('#lg-psd-input').val();
			
			var ps_encoded = $('#login_password_encoded');
			
			ps_encoded.val(hex_sha1($ps));
			
			//alert(ps_encoded.val());
		});

		/*注册验证*/
		$('#reg-btn').click(function(){

			var $tel = $(this).parents('form').find('input').first();

			if($tel.val() == ""){

				alert('请输入电话号码!');

				return false; 
			}

			var $psdinput = $(this).parents('form').find($('input[type=password]'));

			if($psdinput.eq(0).val().length<6||$psdinput.eq(1).val().length<6){

				alert('密码长度小于6位!');

				return false;
			}

			if($psdinput.eq(0).val()!=$psdinput.eq(1).val()){

				alert("两次密码输入不一致");

				return false;
			}
			//alert('yeah!');
			var ps_encoded = $('#encoded_password');
			var ps = $psdinput.eq(0).val();
			var ps_encoded_conform = $('#encoded_password_conform');
			var ps_conform = $psdinput.eq(1).val();
			
			ps_encoded.val(hex_sha1(ps));
			ps_encoded_conform.val(hex_sha1(ps_conform));
			
			if(ps_encoded.val() != ps_encoded_conform.val()){
				alert("加密后不一样");
				return false;
			}
			//alert(ps_encoded.val());
		})
	})()

	;(function(){

		var $add = $('.basket-item').find('.tool .add');
		var $sub = $('.basket-item').find('.tool .sub');

		/*购物篮页面数量加减操作*/
		var num_oprate = function(flag,$this){

			var _price = $this.parents('ul').find('.price').html();

			var $total_price = $this.parents('.basket-item').find('.total-price');

			var $order_total_price = $('#total-price');

			var $val = ori_val = null;

			if(flag==true){
			
				$val = $this.prev('input.number');

				ori_val = parseInt($val.val());
				
				$val.val(ori_val+1);
				
				setCookie($val.attr("id"),$val.val());
				
				var _total_price = $order_total_price.html();
				
				$total_price.html((_total_price*1.0 + _price*1.0).toFixed(1));

			}else{

				$val = $this.next('input.number');

				ori_val = parseInt($val.val());

				var ori_val_pre = ori_val;
				
				if(ori_val <= 1){

					/*确定删除?*/
					if(confirm('您确定要删除此商品吗?')){
						
					}else{

						return;
					}
				}

				$val.val(ori_val-1);

				setCookie($val.attr("id"),$val.val());
				
				var _total_price = parseFloat($order_total_price.html());
				
				$total_price.html((_total_price*1.0 - _price*1.0).toFixed(1));
				
				if($val.val()<=0){
					if(ori_val_pre = 1){
						var basket_number = getCookie('basket_number');
						setCookie('basket_number',basket_number-1);
						var total_number = $('.type-total');
						total_number.html(getCookie('basket_number'));
					}
					//alert($val.val());
					location.reload();
					//var item = $this.parent('li').parent('ul');
					//item.style.display = "none";
				}
				
			}
			
			//$total_price.html(($val.val()*_price).toFixed(1));
		}

		/*数量+1*/
		$add.click(function(){

			num_oprate(true,$(this));

		});

		/*数量-1*/
		$sub.click(function(){

			num_oprate(false,$(this));
			
		});

	})()

	;(function(){

		$('.stars>a').click(function(){

			var _index = $(this).index();

			var _str = '.stars a:lt('+_index+')';

			var _str_gt = '.stars a:gt('+_index+')';

			$(''+_str).addClass('active');

			$(''+_str_gt).removeClass('active');

			$(this).addClass('active')
			
			//改变评分值
			var stars = $(this).parent();
			
			var star_count = stars.find('.active').size();
			
			var comment_marks = stars.next();
			
			comment_marks.val(star_count);
			
		})
	})()

	;(function(){
		
		//删除地址
		$('.my-addr li a').click(function(e){

			e.stopPropagation();	/*阻止冒泡*/

			var $this = $(this);

			if(confirm('您真的要删除此收获地址?')){


				if($this.parent().hasClass('on')){

					/*还有下一条地址*/
					if (!!$this.parent().next()[0]) {

						$this.parent().next().addClass('on');

					}else{

						if (!!$this.parent().prev()[0]) {

							$this.parent().prev().addClass('on');
						
						}
					}
				}
					
				//#ajax
				$this.parent().remove();
				　　
　　			var xmlhttp;
　　			if (window.XMLHttpRequest){
					// code for IE7+, Firefox, Chrome, Opera, Safari
　　 	 			xmlhttp=new XMLHttpRequest();
　　  			}
　　			else{
					// code for IE6, IE5
　　  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
　　  			}
　　			xmlhttp.onreadystatechange=function(){
　　  				if (xmlhttp.readyState==4 && xmlhttp.status==200){
　　    				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
　　    			}
　　  			}
				//此处链接地址将来需要修改为服务器上的地址
				var user_address_id = $this.prev().html();
				//alert(user_address_id);
　　			xmlhttp.open("GET","http://localhost/CI_wyyl/ajax/delete_user_receive.php?user_address_id="+user_address_id,true);
　　			xmlhttp.send();
			}
		})
	})()
})

/*by xu*/
$(document).ready(function(){
	/* ======购物篮====== */
	
	
    /* ======购买水果====== */
	/*
	var showid = "show1-item0";
	$("#"+showid).addClass("checked");
	var id ="show1-item0-content";
	$("#"+id).addClass("show");
	//展开或者隐藏大类下面的版块
    $(".buyfruit-item-changebar").click(function(){ 
        var id = this.parentNode.getAttribute('id');
        if(id[0]=='n'){
            $("#"+id).css("display","none");
            var arr_showid = id.split('-');
            var showid = arr_showid[1];
            $("#"+showid).css("display","block");
        }else{
            $("#"+id).css("display","none");
            var noshowid = "no-" + id;
            $("#"+noshowid).css("display","block");
        }

    });
	//在水果品种版块之间切换
    $(".buyfruit-item-downshow-item-small").click(function(){
        $(".buyfruit-item-downshow-item-small").removeClass("checked");
        $(this).addClass("checked");
        var id = this.getAttribute('id');
        $(".buyfruit-item-downshow-item2").removeClass("show");
        var showid = id + "-content";
        $("#"+showid).addClass("show");
    });  
	*/
	
	/* ======购买水果重构====== */
	var showid = "show1-item0";
	$("#"+showid).addClass("checked");
	var id ="show0-item0-content";
	$("#"+id).addClass("show");
	$('.buyfruit-item-downshow-item').next().addClass("show");
	$('.buyfruit-item-downshow-item :first').addClass("checked");
	$('.buyfruit-item-downshow .buyfruit-item-downshow-item2 :first').addClass("checked");

	//展开或者隐藏大类下面的版块
    $(".buyfruit-item-changebar").click(function(){ 
        var id = this.parentNode.getAttribute('id');
		var change_bar = $(this).parent();
		var change_bar_id = change_bar.attr('id');
        if(change_bar_id[0]=='n'){
			change_bar.css("display","none");
			var change_bar_show = $(change_bar).next();
			change_bar_show.css("display","block");
        }else{
            change_bar.css("display","none");
            var change_bar_none = $(change_bar).prev();
            change_bar_none.css("display","block");
        }
		
    });
	//在水果品种版块之间切换
    $(".buyfruit-item-downshow-item-small").click(function(){
        $(this).parent().find(".buyfruit-item-downshow-item-small").removeClass("checked");
        $(this).addClass("checked");
        var id = this.getAttribute('id');
        $(this).parent().parent().find(".buyfruit-item-downshow-item2").removeClass("show");
        var showid = id + "-content";
        $("#"+showid).addClass("show");
    });  
	
	//购买水果页面增加一个单位
    $(".buyfruit-item-downshow-item2-add").click(function(){ 
        var parentid=this.parentNode.getAttribute('id');
        var id = parentid + "-number";
        var number = document.getElementById(id).innerHTML;
        document.getElementById(id).innerHTML = number*1+1;
		var amount = document.getElementById(id).innerHTML;
		var test = parentid+"-type_id"; 
		var type_id = document.getElementById(test).innerHTML;
		setCookie(type_id, amount);
		
		//var price = $(this).parent().prev().find('.buyfruit-item-downshow-item2-money');
		//var total_price = getCookie('total_price');
		//total_price += price;
		
		var basket_number = getCookie('basket_number');
		if(parseInt(number) == 0){
			basket_number++;
			setCookie('basket_number',basket_number);
			var total_number = $('.type-total');
			total_number.html(getCookie('basket_number'));
		}
		//alert(basket_number);
		//alert(getCookie(type_id));
		
    });
	//减少一个单位
    $(".buyfruit-item-downshow-item2-minus").click(function(){
        var parentid=this.parentNode.getAttribute('id');
        var id = parentid + "-number";
        var number = document.getElementById(id).innerHTML;
        if(number==0)
        {
            alert("亲，买一件吧^@^");
        }
        else
        {
			document.getElementById(id).innerHTML = number*1-1;
			var amount = document.getElementById(id).innerHTML;
			var test = parentid+"-type_id"; 
			var type_id = document.getElementById(test).innerHTML;
			setCookie(type_id, amount);
			//alert(getCookie(type_id));
			var basket_number = getCookie('basket_number');
			if(number==1){
				if(basket_number>=1)
					basket_number--;
				else
					basket_number = 0;
				setCookie('basket_number',basket_number);
				var total_number = $('.type-total');
				total_number.html(getCookie('basket_number'));
			}
			//alert(basket_number);
        }
    });
	
	//专场页面增加一个单位，这个部分可以作为一个标准模板
    $(".special-performance-item-downshow-item2-add").click(function(){ 
        var num = $(this).prev();
        var number = num.html();
        num.html(number*1+1);

		var type_id = $(this).parent().find('.type_id').html();
		setCookie(type_id, num.html());
		var basket_number = getCookie('basket_number');
		if(parseInt(number) == 0){
			basket_number++;
			setCookie('basket_number',basket_number);
			var total_number = $('.type-total');
			total_number.html(getCookie('basket_number'));
		}
		
    });
	//减少一个单位
    $(".special-performance-item-downshow-item2-minus").click(function(){
        var num = $(this).next();
        var number = num.html();
		
        if(number==0)
        {
            alert("亲，买一件吧^@^");
        }
        else
        {
			num.html(number*1-1);
			var type_id = $(this).parent().find('.type_id').html();
			setCookie(type_id, num.html());
			var basket_number = getCookie('basket_number');
			if(number==1){
				if(basket_number>=1)
					basket_number--;
				else
					basket_number = 0;
				setCookie('basket_number',basket_number);
				var total_number = $('.type-total');
				total_number.html(getCookie('basket_number'));
			}

        }
    });
	
    /* ======优惠====== */
   $(".privilege-item-inf-right-add").click(function(){ 
        var num = $(this).prev();
        var number = num.html();
        num.html(number*1+1);

		var type_id = $(this).parent().find('.type_id').html();
		setCookie(type_id, num.html());
		var basket_number = getCookie('basket_number');
		if(parseInt(number) == 0){
			basket_number++;
			setCookie('basket_number',basket_number);
			var total_number = $('.type-total');
			total_number.html(getCookie('basket_number'));
		}
		
    });
	//减少一个单位
    $(".privilege-item-inf-right-minus").click(function(){
        var num = $(this).next();
        var number = num.html();
		
        if(number==0)
        {
            alert("亲，买一件吧^@^");
        }
        else
        {
			num.html(number*1-1);
			var type_id = $(this).parent().find('.type_id').html();
			setCookie(type_id, num.html());
			var basket_number = getCookie('basket_number');
			if(number==1){
				if(basket_number>=1)
					basket_number--;
				else
					basket_number = 0;
				setCookie('basket_number',basket_number);
				var total_number = $('.type-total');
				total_number.html(getCookie('basket_number'));
			}

        }
    });
	
	/* ======预购====== */
   $(".prebuy-item-inf-right-add").click(function(){ 
        var num = $(this).prev();
        var number = num.val();
        num.val(number*1+1);

		var type_id = $(this).parent().find('.type_id').html();
		setCookie(type_id, num.html());
		var basket_number = getCookie('basket_number');
		if(parseInt(number) == 0){
			basket_number++;
			setCookie('basket_number',basket_number);
			var total_number = $('.type-total');
			total_number.html(getCookie('basket_number'));
		}
    });
	//减少一个单位
    $(".prebuy-item-inf-right-minus").click(function(){
        var num = $(this).next();
        var number = num.val();
		
        if(number==0)
        {
            alert("亲，买一件吧^@^");
        }
        else
        {
			num.val(number*1-1);
			var type_id = $(this).parent().find('.type_id').html();
			setCookie(type_id, num.val());
			var basket_number = getCookie('basket_number');
			if(number==1){
				if(basket_number>=1)
					basket_number--;
				else
					basket_number = 0;
				setCookie('basket_number',basket_number);
				var total_number = $('.type-total');
				total_number.html(getCookie('basket_number'));
			}
        }
    });
	
    /*定制习惯习惯*/
	
	 /* ======选择水果====== */
    $(".selectfruit-selectavoritefruit-item").click(function(){

    	var clicked = (parseInt($(this).attr('data-click_cnt'))+1)%2;	/*水果习惯状态是否变化*/
    	$(this).attr('data-click_cnt',clicked);
        var id = this.getAttribute('id');
        var picid = id + "-pic";
        var textid = id + "-text"; 
        $("#"+picid).toggleClass("checked");
        $("#"+textid).toggleClass("checked");
    });
	
	;$.each($('.selectfruit-selectavoritefruit-item'), function(index, val) {
		
		$(this).attr('data-click_cnt',0);
	});

	$('.selectfruit-btn').click(function(e) {

		e.preventDefault();

		var str = '';

		$.each($('.selectfruit-selectavoritefruit-item[data-click_cnt=1]'), function(index, val) {
			
			var id = $(this).attr('id').substr(4);
			str= str + id+',';
		});

		str = str.substr(0,str.length-1);

		if(str==''){

			window.location = '../first/display';
			return false;
		}

		// console.log(str);return;

		$.post('../first/do_private_custom', {"ids":str}, function(data, textStatus, xhr) {
				
				if(!data){

					window.location = '../first/linkto_login';

				}else{
					
					window.location = '../first/display';
				}
		});
	});
	
    /* ======套餐====== */
    var setmealbuything_arr = new Array();
    $(".setmeal-item-inf-right-add").click(function(){ 
		//alert("yeah");
        var package_show_id = $(this).parent().find('.package_id').html();
		var num = $(this).prev();
        var number = num.html();
		//alert(number);
        num.html(number*1+1);
		if(number == 0){
			var basket_number = getCookie('basket_number');
			basket_number++;
			setCookie('basket_number',basket_number);
			$(this).parents().find('.basket_number').html(basket_number);
		}
		setCookie(package_show_id,num.html());
		
    });
    $(".setmeal-item-inf-right-minus").click(function(){
		var package_show_id = $(this).parent().find('.package_id').html();
        var num = $(this).next();
        var number = num.html();

        if(number==0)
        {
            alert("亲，买一件吧^@^");
        }
        else
        {
			if(number == 1){
				var basket_number = getCookie('basket_number');
				if(basket_number>=1)
					basket_number--;
				else
					basket_number = 0;
				setCookie('basket_number',basket_number);
				$(this).parents().find('.basket_number').html(basket_number);
			}
			num.html(number*1-1);
        }
        setCookie(package_show_id,num.html());
    });
    $(".privilege-bottom-bar-btn").click(function(){
        
    });
    /* ======专场====== */
    $(this).find('.session-block').first().addClass("show");
    $('.seesion-item:first').addClass("show");
    $(".session-bar-item").click(function(){
        $(".session-bar-item-icon").removeClass("checked");
        $(".session-bar-item-text").removeClass("checked");
        var id = this.getAttribute('id');
        var picid = id + "-pic";
        var textid = id + "-text"; 
        $("#"+picid).toggleClass("checked");
        $("#"+textid).toggleClass("checked");
        $(".session-block").css("display","none");
        //var arr_contid = id.split('-');
        var contid = id + "-block";
        $("#"+contid).css("display","block");
    });
});



/* by Cao*/
/* ======cookies相关的函数====== */
//写cookies
function setCookie(name,value) 
{ 
    var Days = 30; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
} 
//读取cookies 
function getCookie(name) 
{ 
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]); 
    else 
        return null; 
} 
//删除cookies 
function delCookie(name) 
{ 
    var exp = new Date(); 
    exp.setTime(exp.getTime() - 1); 
    var cval=getCookie(name); 
    if(cval!=null) 
        document.cookie= name + "="+cval+";expires="+exp.toGMTString(); 
} 

/*sha1
* A JavaScript implementation of the Secure Hash Algorithm, SHA-1, as defined
* in FIPS PUB 180-1
* Version 2.1a Copyright Paul Johnston 2000 - 2002.
* Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
* Distributed under the BSD License
* See http://pajhome.org.uk/crypt/md5 for details.
*/

/*
* Configurable variables. You may need to tweak these to be compatible with
* the server-side, but the defaults work in most cases.
*/
var hexcase = 0; /* hex output format. 0 - lowercase; 1 - uppercase        */
var b64pad = ""; /* base-64 pad character. "=" for strict RFC compliance   */
var chrsz   = 8; /* bits per input character. 8 - ASCII; 16 - Unicode      */

/*
* These are the functions you'll usually want to call
* They take string arguments and return either hex or base-64 encoded strings
*/
//第一个是最常用的
function hex_sha1(s){return binb2hex(core_sha1(str2binb(s),s.length * chrsz));}
function b64_sha1(s){return binb2b64(core_sha1(str2binb(s),s.length * chrsz));}
function str_sha1(s){return binb2str(core_sha1(str2binb(s),s.length * chrsz));}
function hex_hmac_sha1(key, data){ return binb2hex(core_hmac_sha1(key, data));}
function b64_hmac_sha1(key, data){ return binb2b64(core_hmac_sha1(key, data));}
function str_hmac_sha1(key, data){ return binb2str(core_hmac_sha1(key, data));}

/*
* Perform a simple self-test to see if the VM is working
*/
function sha1_vm_test()
{
return hex_sha1("abc") == "a9993e364706816aba3e25717850c26c9cd0d89d";
}

/*
* Calculate the SHA-1 of an array of big-endian words, and a bit length
*/
function core_sha1(x, len)
{
/* append padding */
x[len >> 5] |= 0x80 << (24 - len % 32);
x[((len + 64 >> 9) << 4) + 15] = len;

var w = Array(80);
var a = 1732584193;
var b = -271733879;
var c = -1732584194;
var d = 271733878;
var e = -1009589776;

for(var i = 0; i < x.length; i += 16)
{
    var olda = a;
    var oldb = b;
    var oldc = c;
    var oldd = d;
    var olde = e;

    for(var j = 0; j < 80; j++)
    {
      if(j < 16) w[j] = x[i + j];
      else w[j] = rol(w[j-3] ^ w[j-8] ^ w[j-14] ^ w[j-16], 1);
      var t = safe_add(safe_add(rol(a, 5), sha1_ft(j, b, c, d)),
                       safe_add(safe_add(e, w[j]), sha1_kt(j)));
      e = d;
      d = c;
      c = rol(b, 30);
      b = a;
      a = t;
    }

    a = safe_add(a, olda);
    b = safe_add(b, oldb);
    c = safe_add(c, oldc);
    d = safe_add(d, oldd);
    e = safe_add(e, olde);
}
return Array(a, b, c, d, e);

}

/*
* Perform the appropriate triplet combination function for the current
* iteration
*/
function sha1_ft(t, b, c, d)
{
if(t < 20) return (b & c) | ((~b) & d);
if(t < 40) return b ^ c ^ d;
if(t < 60) return (b & c) | (b & d) | (c & d);
return b ^ c ^ d;
}

/*
* Determine the appropriate additive constant for the current iteration
*/
function sha1_kt(t)
{
return (t < 20) ? 1518500249 : (t < 40) ? 1859775393 :
         (t < 60) ? -1894007588 : -899497514;
}

/*
* Calculate the HMAC-SHA1 of a key and some data
*/
function core_hmac_sha1(key, data)
{
var bkey = str2binb(key);
if(bkey.length > 16) bkey = core_sha1(bkey, key.length * chrsz);

var ipad = Array(16), opad = Array(16);
for(var i = 0; i < 16; i++)
{
    ipad[i] = bkey[i] ^ 0x36363636;
    opad[i] = bkey[i] ^ 0x5C5C5C5C;
}

var hash = core_sha1(ipad.concat(str2binb(data)), 512 + data.length * chrsz);
return core_sha1(opad.concat(hash), 512 + 160);
}

/*
* Add integers, wrapping at 2^32. This uses 16-bit operations internally
* to work around bugs in some JS interpreters.
*/
function safe_add(x, y)
{
var lsw = (x & 0xFFFF) + (y & 0xFFFF);
var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
return (msw << 16) | (lsw & 0xFFFF);
}

/*
* Bitwise rotate a 32-bit number to the left.
*/
function rol(num, cnt)
{
return (num << cnt) | (num >>> (32 - cnt));
}

/*
* Convert an 8-bit or 16-bit string to an array of big-endian words
* In 8-bit function, characters >255 have their hi-byte silently ignored.
*/
function str2binb(str)
{
var bin = Array();
var mask = (1 << chrsz) - 1;
for(var i = 0; i < str.length * chrsz; i += chrsz)
    bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (32 - chrsz - i%32);
return bin;
}

/*
* Convert an array of big-endian words to a string
*/
function binb2str(bin)
{
var str = "";
var mask = (1 << chrsz) - 1;
for(var i = 0; i < bin.length * 32; i += chrsz)
    str += String.fromCharCode((bin[i>>5] >>> (32 - chrsz - i%32)) & mask);
return str;
}

/*
* Convert an array of big-endian words to a hex string.
*/
function binb2hex(binarray)
{
var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
var str = "";
for(var i = 0; i < binarray.length * 4; i++)
{
    str += hex_tab.charAt((binarray[i>>2] >> ((3 - i%4)*8+4)) & 0xF) +
           hex_tab.charAt((binarray[i>>2] >> ((3 - i%4)*8 )) & 0xF);
}
return str;
}

/*
* Convert an array of big-endian words to a base-64 string
*/
function binb2b64(binarray)
{
var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
var str = "";
for(var i = 0; i < binarray.length * 4; i += 3)
{
    var triplet = (((binarray[i   >> 2] >> 8 * (3 - i   %4)) & 0xFF) << 16)
                | (((binarray[i+1 >> 2] >> 8 * (3 - (i+1)%4)) & 0xFF) << 8 )
                | ((binarray[i+2 >> 2] >> 8 * (3 - (i+2)%4)) & 0xFF);
    for(var j = 0; j < 4; j++)
    {
      if(i * 8 + j * 6 > binarray.length * 32) str += b64pad;
      else str += tab.charAt((triplet >> 6*(3-j)) & 0x3F);
    }
}
return str;
}



/*md5
* A JavaScript implementation of the RSA Data Security, Inc. MD5 Message
* Digest Algorithm, as defined in RFC 1321.
* Version 2.1 Copyright (C) Paul Johnston 1999 - 2002.
* Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
* Distributed under the BSD License
* See http://pajhome.org.uk/crypt/md5 for more info.
*/

/*
* Configurable variables. You may need to tweak these to be compatible with
* the server-side, but the defaults work in most cases.
*/
var hexcase = 0; /* hex output format. 0 - lowercase; 1 - uppercase        */
var b64pad = ""; /* base-64 pad character. "=" for strict RFC compliance   */
var chrsz   = 8; /* bits per input character. 8 - ASCII; 16 - Unicode      */

/*
* These are the functions you'll usually want to call
* They take string arguments and return either hex or base-64 encoded strings
*/
function hex_md5(s){ return binl2hex(core_md5(str2binl(s), s.length * chrsz));}
function b64_md5(s){ return binl2b64(core_md5(str2binl(s), s.length * chrsz));}
function str_md5(s){ return binl2str(core_md5(str2binl(s), s.length * chrsz));}
function hex_hmac_md5(key, data) { return binl2hex(core_hmac_md5(key, data)); }
function b64_hmac_md5(key, data) { return binl2b64(core_hmac_md5(key, data)); }
function str_hmac_md5(key, data) { return binl2str(core_hmac_md5(key, data)); }

/*
* Perform a simple self-test to see if the VM is working
*/
function md5_vm_test()
{
return hex_md5("abc") == "900150983cd24fb0d6963f7d28e17f72";
}

/*
* Calculate the MD5 of an array of little-endian words, and a bit length
*/
function core_md5(x, len)
{
/* append padding */
x[len >> 5] |= 0x80 << ((len) % 32);
x[(((len + 64) >>> 9) << 4) + 14] = len;

var a = 1732584193;
var b = -271733879;
var c = -1732584194;
var d = 271733878;

for(var i = 0; i < x.length; i += 16)
{
    var olda = a;
    var oldb = b;
    var oldc = c;
    var oldd = d;

    a = md5_ff(a, b, c, d, x[i+ 0], 7 , -680876936);
    d = md5_ff(d, a, b, c, x[i+ 1], 12, -389564586);
    c = md5_ff(c, d, a, b, x[i+ 2], 17, 606105819);
    b = md5_ff(b, c, d, a, x[i+ 3], 22, -1044525330);
    a = md5_ff(a, b, c, d, x[i+ 4], 7 , -176418897);
    d = md5_ff(d, a, b, c, x[i+ 5], 12, 1200080426);
    c = md5_ff(c, d, a, b, x[i+ 6], 17, -1473231341);
    b = md5_ff(b, c, d, a, x[i+ 7], 22, -45705983);
    a = md5_ff(a, b, c, d, x[i+ 8], 7 , 1770035416);
    d = md5_ff(d, a, b, c, x[i+ 9], 12, -1958414417);
    c = md5_ff(c, d, a, b, x[i+10], 17, -42063);
    b = md5_ff(b, c, d, a, x[i+11], 22, -1990404162);
    a = md5_ff(a, b, c, d, x[i+12], 7 , 1804603682);
    d = md5_ff(d, a, b, c, x[i+13], 12, -40341101);
    c = md5_ff(c, d, a, b, x[i+14], 17, -1502002290);
    b = md5_ff(b, c, d, a, x[i+15], 22, 1236535329);

    a = md5_gg(a, b, c, d, x[i+ 1], 5 , -165796510);
    d = md5_gg(d, a, b, c, x[i+ 6], 9 , -1069501632);
    c = md5_gg(c, d, a, b, x[i+11], 14, 643717713);
    b = md5_gg(b, c, d, a, x[i+ 0], 20, -373897302);
    a = md5_gg(a, b, c, d, x[i+ 5], 5 , -701558691);
    d = md5_gg(d, a, b, c, x[i+10], 9 , 38016083);
    c = md5_gg(c, d, a, b, x[i+15], 14, -660478335);
    b = md5_gg(b, c, d, a, x[i+ 4], 20, -405537848);
    a = md5_gg(a, b, c, d, x[i+ 9], 5 , 568446438);
    d = md5_gg(d, a, b, c, x[i+14], 9 , -1019803690);
    c = md5_gg(c, d, a, b, x[i+ 3], 14, -187363961);
    b = md5_gg(b, c, d, a, x[i+ 8], 20, 1163531501);
    a = md5_gg(a, b, c, d, x[i+13], 5 , -1444681467);
    d = md5_gg(d, a, b, c, x[i+ 2], 9 , -51403784);
    c = md5_gg(c, d, a, b, x[i+ 7], 14, 1735328473);
    b = md5_gg(b, c, d, a, x[i+12], 20, -1926607734);

    a = md5_hh(a, b, c, d, x[i+ 5], 4 , -378558);
    d = md5_hh(d, a, b, c, x[i+ 8], 11, -2022574463);
    c = md5_hh(c, d, a, b, x[i+11], 16, 1839030562);
    b = md5_hh(b, c, d, a, x[i+14], 23, -35309556);
    a = md5_hh(a, b, c, d, x[i+ 1], 4 , -1530992060);
    d = md5_hh(d, a, b, c, x[i+ 4], 11, 1272893353);
    c = md5_hh(c, d, a, b, x[i+ 7], 16, -155497632);
    b = md5_hh(b, c, d, a, x[i+10], 23, -1094730640);
    a = md5_hh(a, b, c, d, x[i+13], 4 , 681279174);
    d = md5_hh(d, a, b, c, x[i+ 0], 11, -358537222);
    c = md5_hh(c, d, a, b, x[i+ 3], 16, -722521979);
    b = md5_hh(b, c, d, a, x[i+ 6], 23, 76029189);
    a = md5_hh(a, b, c, d, x[i+ 9], 4 , -640364487);
    d = md5_hh(d, a, b, c, x[i+12], 11, -421815835);
    c = md5_hh(c, d, a, b, x[i+15], 16, 530742520);
    b = md5_hh(b, c, d, a, x[i+ 2], 23, -995338651);

    a = md5_ii(a, b, c, d, x[i+ 0], 6 , -198630844);
    d = md5_ii(d, a, b, c, x[i+ 7], 10, 1126891415);
    c = md5_ii(c, d, a, b, x[i+14], 15, -1416354905);
    b = md5_ii(b, c, d, a, x[i+ 5], 21, -57434055);
    a = md5_ii(a, b, c, d, x[i+12], 6 , 1700485571);
    d = md5_ii(d, a, b, c, x[i+ 3], 10, -1894986606);
    c = md5_ii(c, d, a, b, x[i+10], 15, -1051523);
    b = md5_ii(b, c, d, a, x[i+ 1], 21, -2054922799);
    a = md5_ii(a, b, c, d, x[i+ 8], 6 , 1873313359);
    d = md5_ii(d, a, b, c, x[i+15], 10, -30611744);
    c = md5_ii(c, d, a, b, x[i+ 6], 15, -1560198380);
    b = md5_ii(b, c, d, a, x[i+13], 21, 1309151649);
    a = md5_ii(a, b, c, d, x[i+ 4], 6 , -145523070);
    d = md5_ii(d, a, b, c, x[i+11], 10, -1120210379);
    c = md5_ii(c, d, a, b, x[i+ 2], 15, 718787259);
    b = md5_ii(b, c, d, a, x[i+ 9], 21, -343485551);

    a = safe_add(a, olda);
    b = safe_add(b, oldb);
    c = safe_add(c, oldc);
    d = safe_add(d, oldd);
}
return Array(a, b, c, d);

}

/*
* These functions implement the four basic operations the algorithm uses.
*/
function md5_cmn(q, a, b, x, s, t)
{
return safe_add(bit_rol(safe_add(safe_add(a, q), safe_add(x, t)), s),b);
}
function md5_ff(a, b, c, d, x, s, t)
{
return md5_cmn((b & c) | ((~b) & d), a, b, x, s, t);
}
function md5_gg(a, b, c, d, x, s, t)
{
return md5_cmn((b & d) | (c & (~d)), a, b, x, s, t);
}
function md5_hh(a, b, c, d, x, s, t)
{
return md5_cmn(b ^ c ^ d, a, b, x, s, t);
}
function md5_ii(a, b, c, d, x, s, t)
{
return md5_cmn(c ^ (b | (~d)), a, b, x, s, t);
}

/*
* Calculate the HMAC-MD5, of a key and some data
*/
function core_hmac_md5(key, data)
{
var bkey = str2binl(key);
if(bkey.length > 16) bkey = core_md5(bkey, key.length * chrsz);

var ipad = Array(16), opad = Array(16);
for(var i = 0; i < 16; i++)
{
    ipad[i] = bkey[i] ^ 0x36363636;
    opad[i] = bkey[i] ^ 0x5C5C5C5C;
}

var hash = core_md5(ipad.concat(str2binl(data)), 512 + data.length * chrsz);
return core_md5(opad.concat(hash), 512 + 128);
}

/*
* Add integers, wrapping at 2^32. This uses 16-bit operations internally
* to work around bugs in some JS interpreters.
*/
function safe_add(x, y)
{
var lsw = (x & 0xFFFF) + (y & 0xFFFF);
var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
return (msw << 16) | (lsw & 0xFFFF);
}

/*
* Bitwise rotate a 32-bit number to the left.
*/
function bit_rol(num, cnt)
{
return (num << cnt) | (num >>> (32 - cnt));
}

/*
* Convert a string to an array of little-endian words
* If chrsz is ASCII, characters >255 have their hi-byte silently ignored.
*/
function str2binl(str)
{
var bin = Array();
var mask = (1 << chrsz) - 1;
for(var i = 0; i < str.length * chrsz; i += chrsz)
    bin[i>>5] |= (str.charCodeAt(i / chrsz) & mask) << (i%32);
return bin;
}

/*
* Convert an array of little-endian words to a string
*/
function binl2str(bin)
{
var str = "";
var mask = (1 << chrsz) - 1;
for(var i = 0; i < bin.length * 32; i += chrsz)
    str += String.fromCharCode((bin[i>>5] >>> (i % 32)) & mask);
return str;
}

/*
* Convert an array of little-endian words to a hex string.
*/
function binl2hex(binarray)
{
var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
var str = "";
for(var i = 0; i < binarray.length * 4; i++)
{
    str += hex_tab.charAt((binarray[i>>2] >> ((i%4)*8+4)) & 0xF) +
           hex_tab.charAt((binarray[i>>2] >> ((i%4)*8 )) & 0xF);
}
return str;
}

/*
* Convert an array of little-endian words to a base-64 string
*/
function binl2b64(binarray)
{
var tab = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
var str = "";
for(var i = 0; i < binarray.length * 4; i += 3)
{
    var triplet = (((binarray[i   >> 2] >> 8 * ( i   %4)) & 0xFF) << 16)
                | (((binarray[i+1 >> 2] >> 8 * ((i+1)%4)) & 0xFF) << 8 )
                | ((binarray[i+2 >> 2] >> 8 * ((i+2)%4)) & 0xFF);
    for(var j = 0; j < 4; j++)
    {
      if(i * 8 + j * 6 > binarray.length * 32) str += b64pad;
      else str += tab.charAt((triplet >> 6*(3-j)) & 0x3F);
    }
}
return str;
}

$(function(){

/*水果数量加减*/
	;(function(){

		$('.mount-add').click(function(e){

			var $mount = $(this).siblings('.mount');

			var _price =  parseFloat($(this).parents('.fruit-type').find('.price').html());
			// console.log(_price );

			var ori_val = parseFloat($('.total-price').val());
			// console.log(ori_val);

			$mount.val(parseFloat($mount.val()*1.0+ 1).toFixed(1));

			setCookie($mount.attr("id"),$mount.val());

			$('.total-price').val((ori_val+_price).toFixed(1));
		})

		$('.mount-sub').click(function(e){

			var $mount = $(this).siblings('.mount');

			var _price =  parseFloat($(this).parents('.fruit-type').find('.price').html());

			var ori_val = parseFloat($('.total-price').val());

			var _size = 1;	/*小于1的情况下可能是半斤*/

			if($mount.val()<=1){

				if(confirm('您确定要删除此商品吗?')){

					_size = $mount.val();

					$mount.val(0);

				}else{

					return false;
				}

			}else{

				$mount.val(parseFloat($mount.val()*1.0 - 1).toFixed(1));
			}

			if($(this).hasClass('basket-mount-sub')){

				if($mount.val() == 0){

					$(this).parents('ul').remove();
				}
			}

				setCookie($mount.attr("id"),$mount.val());
				
				// var _total_price = parseFloat($order_total_price.html());
				
				// $total_price.html((_total_price*1.0 - _price*1.0).toFixed(1));
				
				if($mount.val()<=0){

						var basket_number = getCookie('basket_number');

						setCookie('basket_number',basket_number-1);

						var total_number = $('.type-total');

						total_number.html(getCookie('basket_number'));

						location.reload();
				}

				var _price =  parseFloat($(this).parents('.fruit-type').find('.price').html());

				var ori_val = parseFloat($('.total-price').val());

				$('.total-price').val((ori_val-_price*_size).toFixed(1));

			
		})
	}())

	;(function(){

		var _ori_amount = null;

		$('.mount').focus(function(event) {
			
			_ori_amount = $(this).val();
		});

		$('.mount').blur(function(event) {

			var id = $(this).attr('id');

			if($(this).val().length > 0){

					if(parseFloat($(this).val())+"" == "NaN"){

						$(this).val(0);
						
					}else{

						$(this).val(parseFloat($(this).val()));
					}

				}
				if(parseFloat($(this).val())<0){

					$(this).val(0);
				}
				if($(this).val().length==0){

					$(this).val(0);
				}

				setCookie(id,$(this).val());

				var diff = parseFloat($(this).val()) - parseFloat(_ori_amount);

				var _price =  parseFloat($(this).parents('.fruit-type').find('.price').html());
			// console.log(_price );

			var ori_val = parseFloat($('.total-price').val());
			// console.log(ori_val);

			var new_val = ori_val + diff * _price;

			$('.total-price').val((new_val).toFixed(1));

		});

	})();
})
