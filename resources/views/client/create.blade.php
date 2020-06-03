<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>客户  - 客户修改</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >
<!--获取错误信息
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif-->
<form class="form-horizontal" role="form" method="post" action="{{url('client/store')}}" enctype="multipart/form-data">
@csrf
<div class="form-group">
<h1 class="col-sm-7 control-label">客户添加页面</h1>
	</div>

	<div class="form-group">
		<label for="firstname" class="col-sm-5 control-label">客户名称</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="c_name" id="firstname" 
				   placeholder="请输入客户名称">
				   <b style="color:red">{{$errors->first('c_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-5 control-label">客户级别</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="c_rank" id="lastname" 
				   placeholder="请输入客户级别">
				   <b style="color:red">{{$errors->first('c_rank')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-5 control-label">客户从事行业</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="c_hang" id="lastname" 
				   placeholder="请输入客户从事从事行业">
                   <b style="color:red">{{$errors->first('c_hang')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-5 control-label">客户来源</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="c_source" id="lastname" 
				   placeholder="请输入客户来源">
                   <b style="color:red">{{$errors->first('c_source')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-5 control-label">业务员</label>
		<div class="col-sm-2">
        <select name="s_id">
        <option value="">请选择业务员</option>
        <option  value="1">张三</option>
        <option value="2">李四</option>
        </select>
            
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-5 control-label">电话(座机)</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="c_phone" id="firstname" 
				   placeholder="请输入电话(座机)">
				   <b style="color:red">{{$errors->first('c_phone')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-5 control-label">手机</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="c_mobile" id="firstname" 
				   placeholder="请输入手机号">
				   <b style="color:red">{{$errors->first('c_mobile')}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>
<script>
//客户名称
$('input[name="c_name"]').blur(function(){
      $(this).next().empty();
      var c_name=$(this).val();
      var reg=/^[\u4e00-\u9fa5\w]{2,50}$/;
      if(!c_name){
       $('input[name="c_name"]').next().text('客户名称不可以为空包含中文.数字.字母.下划线且唯一,长度范围为2-50位');
       return;
      }
    //验证唯一性
     var flag =true;
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
      type:"POST",
      url:"/client/checkName",
      data:{c_name:c_name},
      success:function(msg){
      if(msg>0){
      $('input[name="c_name"]').next().text('账号已存在');
      flag=false;
      }
  }
});
});
//客户级别
$('input[name="c_rank"]').blur(function(){
      $(this).next().empty();
      var c_rank=$(this).val();
      if(!c_rank){
       $('input[name="c_rank"]').next().text('客户级别不能为空');
       return;
      }
    //验证唯一性
     var flag =true;
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
});
//客户从事行业
$('input[name="c_hang"]').blur(function(){
      $(this).next().empty();
      var c_hang=$(this).val();
      if(!c_hang){
       $('input[name="c_hang"]').next().text('客户从事行业不能为空');
       return;
      }
    //验证唯一性
     var flag =true;
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
});

//客户来源
$('input[name="c_source"]').blur(function(){
      $(this).next().empty();
      var c_source=$(this).val();
      if(!c_source){
       $('input[name="c_source"]').next().text('客户来源不能为空');
       return;
      }
    //验证唯一性
     var flag =true;
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
});

//电话
$('input[name="c_phone"]').blur(function(){
      $(this).next().empty();
      var c_phone=$(this).val();
      var reg=/^(0[0-9]{2,3}\-)([2-9][0-9]{6,7})+(\-[0-9]{1,4})?$/;
      if(c_phone){
      if(!reg.test(c_phone)){
       $('input[name="c_phone"]').next().text('电话座机号格式不对');
       return;
      }
      }
    //验证唯一性
     var flag =true;
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
});
//手机
$('input[name="c_mobile"]').blur(function(){
      $(this).next().empty();
      var c_mobile=$(this).val();
      var reg=/^1[3456789]\d{9}$/;
      if(!reg.test(c_mobile)){
       $('input[name="c_mobile"]').next().text('手机号不能为空，或者格式不对');
       return;
      }
    //验证唯一性
     var flag =true;
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
});
</script>
</body>
</html>

