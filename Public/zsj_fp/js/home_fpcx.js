$(".ckxq").click(function(){

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
	e.style="padding-left:10px"
	e.innerHTML = "<div style='margin:4px;'>开票单位&nbsp;：&nbsp;"+company0+"<br/><hr/>收件人&nbsp;：&nbsp;"+company1+"<br/><hr/>手机&nbsp;：&nbsp;"+company2+"<br/><hr/>业务类型&nbsp;：&nbsp;"+company3+"<br/><hr/>申请时间&nbsp;：&nbsp;"+company4+"<br/><hr/>状态&nbsp;：&nbsp;"+company5+"<br/><hr/>快递单号&nbsp;：&nbsp;"+company6+"<br/><hr/>收件地址&nbsp;：&nbsp;"+company7+"<br/><hr/>税号&nbsp;：&nbsp;"+company8+"<br/><hr/>汇款时间&nbsp;：&nbsp;"+company9+"<br/><hr/>汇款金额&nbsp;：&nbsp;"+company10+"元<br/><hr/>汇款方式&nbsp;：&nbsp;"+company11+"<br/><hr/><div>";
	var cop = e.innerHTML;
	delog.content(company0,cop);
})


$(".kd").click(function(){
	var id = this.id;
	var kd_url = "https://m.kuaidi100.com/index_all.html?type=huitongkuaidi&postid="+id;
	window.location.href = kd_url;
})