$(".edits").click(function(){
	var id=this.id;
	var edit_url = "index.php?m=Back&c=User&a=edit&id="+id;
	window.location.href = edit_url;
})







$(".dels").click(function(){

	var id=this.id;
	var del_url = "index.php?m=Back&c=User&a=del&id="+id;
	var data = {"id":id};
	$.post(del_url,data,function(msg){
		if(msg.status=="0"){
			delog.error(msg.message);
		}
		if(msg.status=="1"){
			delog.success(msg.message,msg.url);
		}
	},"json")
})