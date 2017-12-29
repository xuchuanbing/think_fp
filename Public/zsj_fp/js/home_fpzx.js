$(".but").click(function(){
	var title = $('input[name=title]').val();
	var content = $(".con").val();
	if(title==""){
		delog.error("请输入标题！！");
		return false;
	}
	if(content==""){
		delog.error("请输入内容！");
		return false;
	}

	var message = {
	'title':title,
	'content':content
	}
	$.post("index.php?m=Home&c=Fpzx&a=insert",message,function(msg){

		if(msg.status==0){
			delog.error(msg.message);
			return false;
		}
		if(msg.status==1){
			delog.success(msg.message,msg.url);
		}
	},"JSON")
})


$(".dj").click(function(){
	var company2 = this.parentNode.children[2].innerHTML;
	delog.yemian(company2);
})