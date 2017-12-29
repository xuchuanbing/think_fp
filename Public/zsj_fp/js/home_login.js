function doSubmit(){

	var username = $("input[name=username]").val();
	var reg=/^[0-9a-zA-Z_]{4,11}$/;
	var pass = $("input[name=pass]").val();

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
	var data = $(".form").serializeArray();
	var message = {};
	$(data).each(function(i){
		message[this.name] = this.value;
	});
	//console.log(message);
	//var backlogin = "login/dologin";
	$.post("index.php?m=Home&c=Login&a=dologin",message,function(msg){
      	
      	if(msg.status=="1"){

			delog.success("登陆成功!",msg.url);

      	}else if(msg.status=="0"){

      		delog.error(msg.message);
      	}
      
	},"json");


	return false;
}