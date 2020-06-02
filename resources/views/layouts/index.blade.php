<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>CRM-@yield('title')</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@section('top')
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">CRM</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li><a href="">客户管理</a></li>
			<li class="active"><a href="">业务员管理</a></li>
			<li><a href="">拜访会议</a></li>
			<li><a href="">综合查询</a></li>
			<li><a href="">统计分析</a></li>
			<li><a href="">系统管理</a></li>
	</div>
	</div>
</nav>
@yield('content')
	
</body>
</html>