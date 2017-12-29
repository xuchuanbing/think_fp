function doSubmit(){

	var company = $("input[name=company]").val();
	var address = $("input[name=address]").val();
	var user = $("input[name=user]").val();
	var phone = $("input[name=phone]").val();

	if(company==false){
		delog.error("单位名称不能为空 !");
		return false;
	}

	if(address==false){
		delog.error("收件地址不能为空 !");
		return false;
	}

	if(user==false){
		delog.error("收件人不能为空 !");
		return false;
	}

	var data = $(".form1").serializeArray();
	var message = {};
	$(data).each(function(i){
		message[this.name] = this.value;
	});

	$.post("index.php?m=Home&c=Index&a=insert",message,function(msg){
      	
      	if(msg.status==1){

			delog.success(msg.message,msg.url);

      	}else if(msg.status==0){

      		delog.error(msg.message);
      	}
      
	},"json");


	return false;
}