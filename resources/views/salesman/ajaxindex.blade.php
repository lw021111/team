@foreach ($info as $k=>$v)
		<tr @if($k%2==0) class="warning" @else class="danger" @endif>
			<td>{{$v->s_id}}</td>
			<td>{{$v->s_name}}</td>
			<td>{{$v->s_sex==1?'男':'女'}}</td>
			<td>{{$v->s_phone}}</td>
			<td>{{$v->s_mobile}}</td>
			<td>
				<a href="{{url('salesman/edit/'.$v->s_id)}}" class="btn btn-warning">编辑</a> || 
				<a href="javascript:;" s_id="{{$v->s_id}}" class="btn btn-danger">删除</a>
			</td>
		</tr>
		@endforeach
		<tr><td colspan=6 align="center">{{$info->links()}}</td></tr>