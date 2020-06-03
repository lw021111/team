<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title> 业务员修改 </title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>业务员管理</h2></center>

<form class="form-horizontal" role="form" method="post" action="{{url('salesman/update/'.$info->s_id)}}" enctype="multipart/form-data">
@csrf
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="s_name" id="lastname"  value="{{$info->s_name}}"
				   placeholder="请输入名称">
			<b style="color:red;">{{$errors->first('s_name')}}</b>
		</div>
	</div>
	<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">性别</label>
	    <div>
	    	@if(($info->s_sex)==1)
	        <input type="radio" name="s_sex" id="optionsRadios1" value="1" checked> 男
	        <input type="radio" name="s_sex" id="optionsRadios1" value="2"> 女
	        @else
	        <input type="radio" name="s_sex" id="optionsRadios1" value="1"> 男
	        <input type="radio" name="s_sex" id="optionsRadios1" value="2" checked> 女
	        @endif
	    </div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">办公电话</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="s_phone" id="lastname"  value="{{$info->s_phone}}"
				   placeholder="请输入办公电话">
			<b style="color:red;">{{$errors->first('s_phone')}}</b>
		</div>
	</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">手机</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="s_mobile" id="lastname"  value="{{$info->s_mobile}}"
				   placeholder="请输入手机">
			<b style="color:red;">{{$errors->first('s_mobile')}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>