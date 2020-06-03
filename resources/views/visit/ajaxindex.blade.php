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