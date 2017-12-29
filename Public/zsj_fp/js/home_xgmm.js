$("#getPhoneCode").click(function(){
	var phone = $("input[name=phone]").val();
	var reg_phone=/^1[0-9]{10}$/;
	if(phone==false){
		delog.error("手机号不能为空 !");
		return false;
	}
	if(!reg_phone.test(phone)){
		delog.error("请输入正确的手机号 !");
		return false;	
	}

	var send_code = Math.random();
	var message = {
		'mobile':phone,
		'send_code':send_code
	}
	$.post("index.php?m=Home&c=Sendsms&a=smszh",message,function(msg){
      	
      	if(msg.status=="1"){


			function invokeSettime(obj){
				var countdown=60;
				settime(obj);
				function settime(obj) {
					if (countdown == 0) {
						$(obj).attr("disabled",false);
						$(obj).text("获取验证码");
						countdown = 60;
						return;
					} else {
						$(obj).attr("disabled",true);
						$(obj).text("(" + countdown + ") s 重新发送");
						countdown--;
					}
					setTimeout(function() {
						settime(obj) 
					}
					,1000)
				}
			}
			new invokeSettime("#getPhoneCode");



      		delog.success(msg.message);
      	}else if(msg.status=='0'){

      		delog.error(msg.message);
      		return false;
      	}
      
	},"json");
})

function doSubmit(){

	var phone = $("input[name=phone]").val();
	if(phone==false){
		delog.error("手机号不能为空 !");
		return false;
	}

	var mobileCode = $("input[name=mobileCode]").val();
	if(mobileCode==false){
		delog.error("请输入验证码 !");
		return false;
	}

	var password = $("input[name=password]").val();
	if(password==false){
		delog.error("请输入密码 !");
		return false;
	}

	var data = $(".form").serializeArray();
	var message = {};
	$(data).each(function(i){
		message[this.name] = this.value;
	});
	//var backlogin = "login/dologin";
	$.post("/Home/xgmm/zhhmm",message,function(msg){
      	
      	if(msg.status=="1"){

      		delog.success(msg.message,"/home/index");
      	}else if(msg.status=="0"){

      		delog.error(msg.message);
      		return false;
      	}
      
	},"json");

	return false;
}