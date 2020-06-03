<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>CRM-业务员列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">CRM</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li><a href="">客户管理</a></li>
			<li><a href="{{url('salesman')}}">业务员管理</a></li>
			<li class="active"><a href="{{url('visit')}}">拜访会议</a></li>
			<li><a href="">综合查询</a></li>
			<li><a href="">统计分析</a></li>
			<li><a href="">系统管理</a></li>
	</div>
	</div>
</nav>
<center><h1>拜访会议列表</h1></center>
<a href="{{url('visit/create')}}" class="btn btn-primary">添加</a><hr>
<table class="table table-hover">
	
	<thead>
		<tr>
			<th>业务员名称</th>
			<th>客户名称</th>
			<th>访问时间</th>
			<th>访问人</th>
			<th>访问地址</th>
			<th>访问详情</th>
			<th>下次访问时间</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($info as $k=>$v)
		<tr @if($k%2==0) class="warning" @else class="danger" @endif>
			<td>{{$v->s_name}}</td>
			<td>{{$v->c_name}}</td>
			<td>{{date('Y-m-d H:i:s',$v->v_time)}}</td>
			<td>{{$v->v_man}}</td>
			<td>{{$v->v_address}}</td>
			<td>{{$v->v_detail}}</td>
			<td>{{$v->v_next_time}}</td>
			<td>
				<a href="{{url('visit/edit/'.$v->v_id)}}" class="btn btn-warning">编辑</a> || 
				<a href="javascript:;" v_id="{{$v->v_id}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
		<tr><td colspan=8 align="center">{{$info->links()}}</td></tr>
	</tbody>
</table>
<script>
//无刷新分页
$(document).on('click','.page-item a',function(){
	var url=$(this).attr('href');
	$.get(url,function(res){
		$('tbody').html(res);
	});
	return false;
});
$(document).on('click','.btn-danger',function(){
	var _this=$(this);
	var id=_this.attr('v_id');
	if(confirm('是否确认删除')){
		$.ajax({
			url:"{{url('visit/destroy')}}",
			type:'post',
			data:{id:id},
			dataType:'json',
			success:function(res){
				if(res.code==200){
					_this.parents("tr").remove();
				}else{
					alert(res.font);
				}
			}
		})
	}
})

</script>
</body>
</html>