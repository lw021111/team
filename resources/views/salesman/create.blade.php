<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title> 业务员添加 </title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>业务员管理</h2></center>

<form class="form-horizontal" role="form" method="post" action="store" enctype="multipart/form-data">
@csrf
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="s_name" id="lastname" 
				   placeholder="请输入名称">
			<b style="color:red;">{{$errors->first('s_name')}}</b>
		</div>
	</div>
	<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">性别</label>
	    <div>
	        <input type="radio" name="s_sex" id="optionsRadios1" value="1" checked> 男
	        <input type="radio" name="s_sex" id="optionsRadios1" value="2"> 女
	        <b style="color:red;">{{$errors->first('s_sex')}}</b>
	    </div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">办公电话</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="s_phone" id="lastname" 
				   placeholder="请输入办公电话">
			<b style="color:red;">{{$errors->first('s_phone')}}</b>
		</div>
	</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">手机</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="s_mobile" id="lastname" 
				   placeholder="请输入手机">
			<b style="color:red;">{{$errors->first('s_mobile')}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>
<script>
$('input[name="s_name"]').blur(function(){
	$(this).next().empty();
	var s_name=$(this).val();
	var reg=/^[\u4e00-\u9fa5\w]{2,8}$/;
	if(!reg.test(s_name)){
		$(this).next().text('业务员名称是中文,数字,字母,下划线,长度范围为2-8位');
		return;
	}
	//验证唯一性
	$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
	$.post('/salesman/checkName',{s_name:s_name},function(res){
		if(res>0){
			$('input[name="s_name"]').next().text('业务员名称已存在');
		}
	})
});
$('input[name="s_phone"]').blur(function(){
	$(this).next().empty();
	var s_phone=$(this).val();
	if(!s_phone){
		$(this).next().text('办公电话不能为空');
		return;
	}
});
$('input[name="s_mobile"]').blur(function(){
	$(this).next().empty();
	var s_mobile=$(this).val();
	if(!s_mobile){
		$(this).next().text('手机不能为空');
		return;
	}
});

$('button').click(function(){
	var s_name=$('input[name="s_name"]').val();
	var reg=/^[\u4e00-\u9fa5\w]{2,8}$/;
	if(!reg.test(s_name)){
		$('input[name="s_name"]').next().text('名称是中文,数字,字母,下划线,长度范围为2-8位');
		return;
	}
	var flag=true;
	$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
	$.ajax({
		url:"/salesman/checkName",
		type:'post',
		data:{s_name:s_name},
		async:false,
		success:function(res){
			if(res>0){
				$('input[name="s_name"]').next().text('业务员名称已存在');
				flag=false;
			}
		}
	});
	if(!flag) return;
	var s_phone=$('input[name="s_phone"]').val();
	if(!s_phone){
		$('input[name="s_phone"]').next().text('办公电话不能为空');
		return;
	}

	var s_mobile=$('input[name="s_mobile"]').val();
	if(!s_mobile){
		$('input[name="s_mobile"]').next().text('手机不能为空');
		return;
	}
	
	
	$('form').submit();

});


</script>
</body>
</html>