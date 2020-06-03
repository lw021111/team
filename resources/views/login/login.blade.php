<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员  - 登录页面</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
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

<form class="form-horizontal" role="form" method="post" action="{{url('/login/logindo')}}" enctype="multipart/form-data">
@csrf
	<div class="form-group">
	<h1 class="col-sm-7 control-label">登录页面</h1>
	</div>
	<center>
	<b style="color:red">{{session('msg')}}</b>
	</center>
	<div class="form-group">
	<label for="firstname" class="col-sm-5 control-label">用户名</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="admin_name" id="firstname" 
				   placeholder="请输入用户名">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-5 control-label">密码</label>
		<div class="col-sm-2">
			<input type="password" class="form-control" name="admin_pwd" id="lastname" 
				   placeholder="请输入密码">
		</div>
	</div>
    
	<div class="form-group">
    <div class="col-sm-offset-5 col-sm-10">
      <div class="checkbox">
        <label>
          <input name='isremember' type="checkbox">七天免登录
        </label>
      </div>
    </div>
  </div>
	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-10">
			<button type="submit" class="btn btn-default">登录</button>
		</div>
	</div>
</form>
</body>
</html>