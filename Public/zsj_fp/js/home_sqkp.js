function doSubmit(){
	var company1 = $("input[name=company1]").val();
	var shao = $("input[name=shao]").val();
	var mony = $("input[name=mony]").val();
	var huktime = $("input[name=huktime]").val();
	var way = $("#demo option:selected").val();
	var kpob = $(".txt1 option:selected").val();

	if(company1==""){
		delog.error("开票单位不能为空！");
		return false;
	}
	if(shao==""){
		delog.error("税号不能为空！");
		return false;	
	}
	var reg_shao = /^[0-9]{15,20}$/;
	if(!reg_shao.test(shao)){
		delog.error("税号格式不正确！");
		return false;
	}
	if(mony==""){
		delog.error("请填写汇款金额！");
		return false;	
	}
	var reg_hukmony = /^[0-9.]{1,6}$/;
	if(!reg_hukmony.test(mony)){
		delog.error("请填写正确的金额！");
	}
	if(huktime==""){
		delog.error("请填写汇款时间！");
		return false;	
	}
	if(way==2){
		var bank = $("input[name=bank]").val();
		var bank_num = $("input[name=bank_num]").val();
		var reg_bank_num = /^[0-9]{16,19}$/;
		if(bank==""){
			delog.error("请填写正确的开户行！");
			return false;
		}
		if(bank_num==""){
			delog.error("请填写银行卡号！");
			return false;
		}
		if(!reg_bank_num.test(bank_num)){
			delog.error("请填写正确的银行卡号！");
			return false;
		}
	}
	if(way==""){
		delog.error("请选择汇款方式！");
		return false;		
	}
	if(kpob==""){
		delog.error("请选择业务类型！");
		return false;		
	}

var message = {};
var data = $(".form1").serializeArray();
$(data).each(function(i){
	message[this.name] = this.value;
})

var url = "index.php?m=Home&c=Sqkp&a=insert";
$.post(url,message,function(data){          
	if(data.status=="1"){
		delog.success(data.message,data.url);
	}else if(data.status=="0"){
		delog.error(data.message);
		return false;
	}
}, "json");
	return false;
}