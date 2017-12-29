$(".ck").click(function(){

	var company0 = this.parentNode.parentNode.children[0].innerHTML;
	var company1 = this.parentNode.parentNode.children[1].innerHTML;
	var company2 = this.parentNode.parentNode.children[2].innerHTML;
	var company3 = this.parentNode.parentNode.children[3].innerHTML;
	var company4 = this.parentNode.parentNode.children[4].innerHTML;
	var company5 = this.parentNode.parentNode.children[5].innerHTML;
	var company6 = this.parentNode.parentNode.children[6].innerHTML;
	var company7 = this.parentNode.parentNode.children[7].innerHTML;
	var company8 = this.parentNode.parentNode.children[8].innerHTML;
	var company9 = this.parentNode.parentNode.children[9].innerHTML;
	var company10 = this.parentNode.parentNode.children[10].innerHTML;
	var company11 = this.parentNode.parentNode.children[11].innerHTML;
	var e =document.createElement("div");
	e.style="paddingLeft:10px;height:400px;";
	if(company7=="银行卡"){
		e.innerHTML = "<div style='margin:4px;'>单位名称&nbsp;：&nbsp;"+company0+"<br/><hr/>收件人&nbsp;：&nbsp;"+company11+"<br/><hr/>汇款金额&nbsp;：&nbsp;"+company1+"<br/><hr/>收件地址&nbsp;：&nbsp;"+company2+"<br/><hr/>电话&nbsp;：&nbsp;"+company3+"<br/><hr/>税号&nbsp;：&nbsp;"+company4+"<br/><hr/>开票项目&nbsp;：&nbsp;"+company5+"<br/><hr/>汇款时间&nbsp;：&nbsp;"+company6+"<br/><hr/>汇款方式&nbsp;：&nbsp;"+company7+"<br/><hr/>开户行&nbsp;：&nbsp;"+company9+"<br/><hr/> 账号&nbsp;：&nbsp;"+company10+"<br/><hr/>受理状态&nbsp;：&nbsp;"+company8+"<br/><hr/><div>";
	}else{
		e.innerHTML = "<div style='margin:4px;'>单位名称&nbsp;：&nbsp;"+company0+"<br/><hr/>收件人&nbsp;：&nbsp;"+company11+"<br/><hr/>汇款金额&nbsp;：&nbsp;"+company1+"<br/><hr/>收件地址&nbsp;：&nbsp;"+company2+"<br/><hr/>电话&nbsp;：&nbsp;"+company3+"<br/><hr/>税号&nbsp;：&nbsp;"+company4+"<br/><hr/>开票项目&nbsp;：&nbsp;"+company5+"<br/><hr/>汇款时间&nbsp;：&nbsp;"+company6+"<br/><hr/>汇款方式&nbsp;：&nbsp;"+company7+"<br/><hr/>受理状态&nbsp;：&nbsp;"+company8+"<br/><hr/><div>";
	}
	
	var cop = e.innerHTML;
	delog.content(company0,cop);
})


$(".kp").click(function(){

		id = this.id;
		layer.prompt({
		  title: '输入快递单号',
		  formType: 3
		}, function(txt, index){
			$.get("index.php?m=Back&c=Zsjck&a=gets",{'id':id,'kd':txt},function(msg){
		      	if(msg.status=="0"){
		      		delog.error(msg.message);
		      		return false;
		      	}
		      	if(msg.status=="1"){
					delog.success(msg.message,msg.url);
		      	}
			},"json");
			layer.close(index);
		});


})