<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title> 拜访会议 </title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>拜访会议</h2></center>

<form class="form-horizontal" role="form" method="post" action="{{url('visit/update/'.$info->v_id)}}" enctype="multipart/form-data">
@csrf
	<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
	<div class="col-sm-6">
	    <select class="form-control" name="s_id" id="firstname">
			<option value="0">--请选择--</option>
			@foreach($salesman as $v)
			<option value="{{$v->s_id}}" {{$v->s_id==$info->s_id ? "selected" : ''}}>{{$v->s_name}}</option>
			@endforeach
	    </select>
    </div>
	</div>
	<div class="form-group">
	<label for="firstname" class="col-sm-2 control-label">客户名称</label>
	<div class="col-sm-6">
	    <select class="form-control" name="c_id" id="firstname">
			<option value="0">--请选择--</option>
			@foreach($client as $v)
			<option value="{{$v->c_id}}" {{$v->c_id==$info->c_id ? "selected" : ''}}>{{$v->c_name}}</option>
			@endforeach
	    </select>
    </div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">访问人</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="v_man" id="lastname" value="{{$info->v_man}}" placeholder="请输入访问人">
			<b style="color:red;">{{$errors->first('v_man')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">访问地址</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="v_address" id="lastname" value="{{$info->v_address}}" 
				   placeholder="请输入地址">
			<b style="color:red;">{{$errors->first('v_address')}}</b>
		</div>
	</div>
	
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">访问详情</label>
		<div class="col-sm-9">
			<textarea type="text" class="form-control" name="v_detail" id="lastname">{{$info->v_detail}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">下次访问时间</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" name="v_next_time" id="lastname" value="{{$info->v_next_time}}" 
				   placeholder="请输入下次访问时间">
			<b style="color:red;">{{$errors->first('v_next_time')}}</b>
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