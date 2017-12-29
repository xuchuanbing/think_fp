$(".ly_xq").click(function(){
	var id = this.parentNode.parentNode.children[0].innerHTML;
	var content = this.parentNode.parentNode.children[5].innerHTML;
	$.post("index.php?m=Back&c=Zsjly&a=update",{"id":id},function(msg){
		delog.yemian(content);
	},"json")

})