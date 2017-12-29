function doSubmit(){

	var username = $("input[name=username]").val();
	var reg=/^[0-9a-zA-Z_]{4,9}$/;
	var reg_code=/^[0-9a-zA-Z]{4}$/
	var pass = $("input[name=pass]").val();
	var code = $("input[name=code]").val();
	if(username==false){
		delog.error("用户名不能为空 !");
		return false;
	}
	if(!reg.test(username)){
		delog.error("请输入正确的用户名 !");
		return false;	
	}
	if(pass==false){
		delog.error("密码不能为空 !");
		return false;
	}
	if(code==false){
		delog.error("验证码不能为空 !");
		return false;
	}
	if(!reg_code.test(code)){
		delog.error("请输入有效验证码 !");
		return false;	
	}
	var data = $(".form").serializeArray();
	var message = {};
	$(data).each(function(i){
		message[this.name] = this.value;
	});
	//console.log(message);
	//var backlogin = "login/dologin";
	$.post("index.php?m=Back&c=Login&a=dologin",message,function(msg){
      	
      	if(msg.status==1){

      		delog.success("登陆成功!","index.php?m=Back&c=Index&a=index");
      	}else if(msg.status==0){

      		delog.error(msg.message);
      	}
      
	},"json");


	return false;
}