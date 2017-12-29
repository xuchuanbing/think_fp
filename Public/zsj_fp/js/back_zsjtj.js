$(".but").click(function(){
	var tjurl = SECP.tj_url;
	window.location.href = tjurl;
})

function doSubmit(){

	var yewu = $("input[name=yewu]").val();
	if(yewu==""){
		delog.error("请输入内容!!");
		return false;
	}
	var in_url = SECP.insert_url;
	var data = {'yewu':yewu};
	$.post(in_url,data,function(msg){

		if(msg.status==0){
			delog.error(msg.message);
		}else if(msg.status==1){
			delog.success("添加成功!",msg.url);
		}
	},"json")
	return false;
}

$(".del").click(function(){
	var delurl = SECP.del_url;
	$.ajax({
		type: "get",
		url: delurl,
		dataType:"json",
		data: "id="+this.id,
		success: function(msg){
			if(msg.status==1){
				delog.success("删除成功!",msg.url);
			}else{
				delog.error(msg.message);
			}
		}
	});
})