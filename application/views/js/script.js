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

		})()

	/*添加地址*/
	;(function(){

		$('.add-addr').click(function(){

			$(this).removeClass('on');

			$('.add-addr-info-wrap').show();

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
		})
	})()

	;(function(){

		var $add = $('.basket-item').find('.tool .add');
		var $sub = $('.basket-item').find('.tool .sub');

		/*数量加减操作*/
		var num_oprate = function(flag,$this){

			var _price = $this.parents('ul').find('.price').html();

			var $total_price = $this.parents('.basket-item').find('.total-price');

			var $order_total_price = $('#total-price');

			var $val = ori_val = null;

			if(flag==true){
			
				$val = $this.prev('input.number');

				ori_val = parseInt($val.val());

				$val.val(ori_val+1);

				var _total_price = $order_total_price.html();

				$order_total_price.html((_total_price*1.0 + _price*1.0).toFixed(1));
	
			}else{

				$val = $this.next('input.number');

				ori_val = parseInt($val.val());

				if(ori_val <= 1){

					/*确定删除?*/
					if(confirm('您确定要删除此商品吗?')){

					}else{

						return;
					}
				}

				$val.val(ori_val-1);

				var _total_price = $order_total_price.html();

				$order_total_price.html((_total_price*1.0 - _price*1.0).toFixed(1));
			}

			$total_price.html(($val.val()*_price).toFixed(1));
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
		})
	})()

	;(function(){

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
			}
		})
	})()
})

/*by xu*/
$(document).ready(function(){
    /* ======购买水果====== */
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
    $(".buyfruit-item-downshow-item-small").click(function(){
        $(".buyfruit-item-downshow-item-small").removeClass("checked");
        $(this).addClass("checked");
        var id = this.getAttribute('id');
        $(".buyfruit-item-downshow-item2").removeClass("show");
        var showid = id + "-content";
        $("#"+showid).addClass("show");
    });  
    $(".buyfruit-item-downshow-item2-add").click(function(){ 
        var parentid=this.parentNode.getAttribute('id');
        var id = parentid + "-number";
        var number = document.getElementById(id).innerHTML;
        document.getElementById(id).innerHTML = number*1+1;
    });
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
        }
    });
    /* ======预购水果和优惠====== */
    $(".privilege-item-inf-right-add").click(function(){ 
        var parentid=this.parentNode.getAttribute('id');
        var id = parentid + "-number";
        var number = document.getElementById(id).innerHTML;
        document.getElementById(id).innerHTML = number*1+1;
    });
    $(".privilege-item-inf-right-minus").click(function(){
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
        }
    });
    /* ======选择水果====== */
    $(".selectfruit-selectavoritefruit-item").click(function(){
        var id = this.getAttribute('id');
        var picid = id + "-pic";
        var textid = id + "-text"; 
        $("#"+picid).toggleClass("checked");
        $("#"+textid).toggleClass("checked");
    });
    /* ======套餐====== */
    var setmealbuything_arr = new Array();
    $(".setmeal-item-inf-right-add").click(function(){ 
        var parentid=this.parentNode.getAttribute('id');
        var id = parentid + "-number";
        var number = document.getElementById(id).innerHTML;
        document.getElementById(id).innerHTML = number*1+1;
        var arr_name = document.getElementById(parentid+"-name").innerHTML;
        alert(arr_name);
        alert(number);
        setmealbuything_arr["arr_name"] = number;
        //alert(setmealbuything_arr);
    });
    $(".setmeal-item-inf-right-minus").click(function(){
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
        }
        var arr_name = document.getElementById(parentid+"-name").innerHTML;
        setmealbuything_arr["arr_name"] = number;
        alert(setmealbuything_arr);
    });
    $(".privilege-bottom-bar-btn").click(function(){
        alert("haha");
        alert(setmealbuything_arr);
        setmealbuything_json = JSON.stringify(setmealbuything_arr);
        alert(setmealbuything_json);
        setCookie("setmealbuything",setmealbuything_json);
    });
    /* ======专场====== */
    $(".session-bar-item").click(function(){
        $(".session-bar-item-icon").removeClass("checked");
        $(".session-bar-item-text").removeClass("checked");
        var id = this.getAttribute('id');
        var picid = id + "-pic";
        var textid = id + "-text"; 
        $("#"+picid).toggleClass("checked");
        $("#"+textid).toggleClass("checked");
        $(".session-item").css("display","none");
        var arr_contid = id.split('-');
        var contid = arr_contid[0];
        $("#"+contid).css("display","block");
    });
});


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