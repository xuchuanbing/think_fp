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
	$.post("index.php?m=Home&c=Sendsms&a=sms",message,function(msg){
      	
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



      		delog.prompt(msg.message);
      	}else if(msg.status=="0"){

      		delog.error(msg.message);
      		return false;
      	}
      
	},"json");
})





function doSubmit(){

	var username = $("input[name=username]").val();
	var phone = $("input[name=phone]").val();
	var reg=/^[0-9a-zA-Z_]{4,9}$/;
	var reg_phone=/^1[0-9]{10}$/;
	var pass = $("input[name=pass]").val();
	var mobileCode = $("input[name=mobileCode]").val();
	var pass = $("input[name=pass]").val();
	var pass1 = $("input[name=pass1]").val();

	if(username==false){
		delog.error("用户名不能为空 !");
		return false;
	}
	if(!reg.test(username)){
		delog.error("请输入正确的用户名 !");
		return false;	
	}
	if(phone==false){
		delog.error("手机号不能为空 !");
		return false;
	}
	if(!reg_phone.test(phone)){
		delog.error("请输入正确的手机号 !");
		return false;	
	}
	if(mobileCode==false){
		delog.error("验证码不能为空 !");
		return false;
	}
	if(pass==false){
		delog.error("密码不能为空 !");
		return false;
	}
	if(pass1==false){
		delog.error("请再次输入密码 !");
		return false;
	}

	if(pass!=pass1){
		delog.error("第二次密码不重复 !");
		return false;		
	}
	var data = $(".form").serializeArray();
	var message = {};
	$(data).each(function(i){
		message[this.name] = this.value;
	});
	//var backlogin = "login/dologin";
	$.post("index.php?m=Home&c=Newyh&a=register",message,function(msg){
      	
      	if(msg.status=="1"){

      		delog.success(msg.message,"index.php?m=Home&c=Index&a=index");
      	}else if(msg.status=="0"){

      		delog.error(msg.message);
      		return false;
      	}
      
	},"json");


	return false;
}