var delog = {

 	//成功弹出层success
	success:function(msg,url){
		layer.open({
		  	title: '信息',
		  	content: msg,
		  	icon:1,
		  	yes: function(){
		    	location.href=url;
		 	 }
		});
	},

 	//错误弹出层error
	error:function(msg){
		layer.open({
		  	title: '信息',
		  	content: msg,
		  	icon: 2
		});
	},

	//信息提示弹出层
	prompt:function(msg){
		layer.open({
		  	title: '信息',
		  	content: msg,
		  	icon: 0
		});
	},

	//查看
	content:function(company,content){
		layer.open({
		  type: 1, 	//Page层类型
		  area: ['400px', '450px'],
		  title: company,
		  shade: 0.6, 	//遮罩透明度
		  maxmin: true, 	//允许全屏最小化
		  anim: 2, 	//0-6的动画形式，-1不开启
		  content: content
		});  
	},

	//页面层
	yemian:function(msg){
		layer.open({
		  type: 1,
		  skin: 'layui-layer-rim', //加上边框
		  area: ['420px', '240px'], //宽高
		  content: msg
		});
	}

}