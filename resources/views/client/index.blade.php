<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<create>
	<title>客户- 客户展示</title>
	</create>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
<h1 class="col-sm-11 control-label">客户展示表</h1>
</center>
<hr>
<a href="{{url('client/create')}}"><button type="button" class="btn btn-primary">添加</button></a>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>客户ID</th>
			<th>客户名称</th>
            <th>客户级别</th>
            <th>客户从事行业</th>
			<th>客户来源</th>
            <th>业务员</th>
            <th>电话(座机)</th>
            <th>手机</th>
			<th>状态</th>
		</tr>
	</thead>

	<tbody>
    @foreach ($client as $k=>$v)
            <th>{{$v->c_id}}</th>
			<th>{{$v->c_name}}</th>
            <th>{{$v->c_rank}}</th>
            <th>{{$v->c_hang}}</th>
			<th>{{$v->c_source}}</th>
            <th>{{$v->s_id}}</th>
            <th>{{$v->c_phone}}</th>
            <th>{{$v->c_mobile}}</th>
			<th>
			<a  href="{{url('/client/edit',['c_id'=>$v->c_id])}}">编辑</a>丨
			<a class="btn btn-danger" id="{{$v->c_id}}" href="javascript:void(0)">删除</a>
			</th>
		</tr>
	@endforeach
		<tr><td colspan=5 align="center">{{ $client->links() }}</td></tr>
	</tbody>
</table>
<script>
//无限刷新分页
$(document).on('click','.page-item a',function(){
	var url =$(this).attr('href');
	$get(url,function(res){
		$('tbody').html(res);
});
return false;
});
$('.btn-danger').click(function(res){
	var id=$(this).attr('id');
	var obj=$(this);
	if(confirm('您确定要删除此条记录吗')){
		$.get('/client/destroy/'+id,function(res){
			if(res.code=='00000'){
				obj.parents('tr').hide();
			}
		},'json');
	}
});
</script>
</body>
</html>