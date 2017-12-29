function doSubmit(){
	var id= $("input[name=id]").val();
	var name = $("input[name='yewu']:checked").val();
	var message = {"id":id,"status":name};
	var edi_url = "index.php?m=Back&c=User&a=update";

	$.post(edi_url,message,function(msg){
		if(msg.status=='0'){
			delog.error(msg.message);
		}
		if(msg.status=="1"){
			delog.success(msg.message,msg.url);
		}
	},"json")

	return false;
}