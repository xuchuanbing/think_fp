
/*企业信息*/
$(".sub1").click(function(){
	var company=$("#company").val();
	var address=$("#address").val();
	var addressee=$("#addressee").val();
	var wap=$("#wap").val();
	if(company==""){
		alert("单位名称不能为空");
		return false;
	}
	if(address==""){
		alert("收件地址不能为空");
		return false;
	}
	if(addressee==""){
		alert("收件人不能为空");
		return false;
	}
	if(wap==""){
		alert("手机号不能为空");
		return false;
	}
	$('.form1').submit(function() {
					alert("提交成功");
				});
})
/*申请开票*/
$(".sub2").click(function(){
	var  office=$("#office").val();
	var  duty=$("#duty").val();
	var  time=$("#time").val();
	var  way=$("#way").val();
	var  money=$("#money").val();
	if(office==""){
		alert("开票单位不能为空");
		return false;
	}
	if(duty==""){
		alert("税号不能为空");
		return false;
	}
	if(time==""){
		alert("汇款时间不能为空");
		return false;
	}
	if(way==""){
		alert("汇款方式不能为空");
		return false;
	}
	if(money==""){
		alert("汇款金额不能为空");
		return false;
	}
	$('.form2').submit(function() {
					alert("提交成功");
				});
})
/*发票查询*/
$(".sub4").click(function(){
	var  office=$("#office").val();
	var  xm=$("#xm").val();
	var  time=$("#time").val();
	var  jd=$("#jd").val();
	var  money=$("#money").val();
	if(office==""){
		alert("开票单位不能为空");
		return false;
	}
	if(xm==""){
		alert("项目不能为空");
		return false;
	}
	if(time==""){
		alert("时间不能为空");
		return false;
	}
	if(jd==""){
		alert("进度不能为空");
		return false;
	}
	if(money==""){
		alert("金额不能为空");
		return false;
	}
	$('.form3').submit(function() {
					alert("提交成功");
				});
})
/*a标签的背景色的变化*/
$(function(){
$(".ly .form11 table tr td a").on("click",function(){
$(".ly .form11 table tr td a").css("background-color","#15abe9");
$(this).css("background-color","#c9c9c9");
})
});

/*开票记录*/
/*mc  单位名称
dz   收件地址
peo   手机
 duty     税号
time   汇款时间
 way      汇款方式
money         汇款金额*/
$(".sub6").click(function(){
	var mc=$("#mc").val();
	var dz=$("#dz").val();
	var peo=$("#peo").val();
	var pho=$("#pho").val();
	var duty=$("#duty").val();
	var time=$("#time").val();
	var way=$("#way").val();
	var money=$("#money").val();
	if(mc==""){
		alert("单位名称不能为空");
		return false;
	}
	if(dz==""){
		alert("收件地址不能为空");
		return false;
	}
	if(peo==""){
		alert("收件人不能为空");
		return false;
	}
	if(peo==""){
		alert("手机号不能为空");
		return false;
	}
	if(pho != '') {
		if(!(/^1[34578]\d{9}$/.test(pho))) {
			alert("手机号码有误，请重填");
			return false;
			}
    }
	if(duty==""){
		alert("税号不能为空");
		return false;
	}
	if(time==""){
		alert("汇款时间不能为空");
		return false;
	}
	if(way==""){
		alert("汇款方式不能为空");
		return false;
	}
	if(money==""){
		alert("汇款金额不能为空");
		return false;
	}
/*	if ($(":radio:checked").length == 0)
     {
      alert("你的性别未选择");
      }*/
	$('.form22').submit(function() {
					alert("提交成功");
				});
})
/*注册用户名*/
$(".tj").click(function(){
	var yhm=$("#yhm").val();
	var in_pd=$("#in_pd").val();
	var yhmcf=$("#yhmcf").val();
	var sjh=$("#sjh").val();
  if(yhm==""){
  	alert("用户名不能为空");
  	return false;
  }
  if(in_pd==""){
  	alert("密码不能为空");
  	return false;
  }
  if(yhmcf==""){
  	alert("重复密码不能为空");
  	return false;
  }
  if(sjh==""){
  	alert("手机号不能为空");
  	return false;
  }
  $('.formdl').submit(function() {
					alert("提交成功");
				});
})
/*修改密码*/
$(".sub8").click(function(){
	var ypass=$("#ypass").val();
	var xpass=$("#xpass").val();
	var cfpass=$("#cfpass").val();
	
  if(ypass==""){
  	alert("原密码不能为空");
  	return false;
  }
  if(xpass==""){
  	alert("新密码不能为空");
  	return false;
  }
  if(cfpass==""){
  	alert("重复密码不能为空");
  	return false;
  }

  $('.form8').submit(function() {
					alert("提交成功");
				});
})

$("#getPhoneCode").click(function(){
				function invokeSettime(obj){
    var countdown=60;
    settime(obj);
    function settime(obj) {
        if (countdown == 0) {
            $(obj).attr("disabled",false);
            $(obj).text("获取验证码");
            countdown = 60;
            return;
        } else {
            $(obj).attr("disabled",true);
            $(obj).text("(" + countdown + ") s 重新发送");
            countdown--;
        }
        setTimeout(function() {
                    settime(obj) }
                ,1000)
    }
}

  new invokeSettime("#getPhoneCode");
			})

