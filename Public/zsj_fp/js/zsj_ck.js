$(".zsj_ck").click(function(){

	var company0 = this.parentNode.children[0].innerHTML;
	var company1 = this.parentNode.children[1].innerHTML;
	var company2 = this.parentNode.children[2].innerHTML;
	var company3 = this.parentNode.children[3].innerHTML;
	var company4 = this.parentNode.children[4].innerHTML;
	var company5 = this.parentNode.children[5].innerHTML;
	var company6 = this.parentNode.children[6].innerHTML;
	var company7 = this.parentNode.children[7].innerHTML;
	var company8 = this.parentNode.children[8].innerHTML;
	var e =document.createElement("div");
	e.style="padding-left:10px"
	e.innerHTML = "<div style='margin:4px;'>单位名称&nbsp;：&nbsp;"+company0+"<br/><hr/>单位名称&nbsp;：&nbsp;"+company1+"<br/><hr/>收件人&nbsp;：&nbsp;"+company2+"<br/><hr/>电话&nbsp;：&nbsp;"+company3+"<br/><hr/>税号&nbsp;：&nbsp;"+company4+"<br/><hr/>开票项目&nbsp;：&nbsp;"+company5+"<br/><hr/>汇款时间&nbsp;：&nbsp;"+company6+"<br/><hr/>快递单号&nbsp;：&nbsp;"+company7+"<br/><hr/>汇款金额&nbsp;：&nbsp;"+company8+"元<br/><hr/><div>";
	var cop = e.innerHTML;
	delog.content(company0,cop);
})