<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Salesman;
use App\Visit;
use App\Client;
class VisitController extends Controller
{
    public function create(){
    	$salesman=Salesman::all();
    	$client=Client::all();
    	return view('visit.create',['salesman'=>$salesman,'client'=>$client]);
    }

    public function store(){
        $validatedData = request()->validate([ 
            'v_man' => 'required', //验证|表名
            'v_address' => 'required',
        ],[
            'v_man.required'=>'访问人必填',
            'v_address.required'=>'访问地址必填',
        ]);
    	$data=request()->except('_token');
    	$data['v_time']=time();
    	$res=Visit::create($data);
    	if($res){
    		return redirect('visit');
    	}
    }

    public function index(){
    	$pageSize=config('app.pageSize');
    	$info=Visit::leftjoin("salesman","visit.s_id","=","salesman.s_id")
    					->leftjoin("client","visit.c_id","=","client.c_id")
    					->orderby('v_id','desc')
    					->paginate($pageSize);
    	//ajax分页
        if(request()->ajax()){
            return view('visit.ajaxindex',['info'=>$info]);
        }
    	return view('visit.index',['info'=>$info]);
    }

    public function destroy(){
    	$id=request()->id;
    	$res=Visit::destroy($id);
    	if($res){
            echo json_encode(['code'=>200,'font'=>'删除成功']);
        }else{
            echo json_encode(['code'=>300,'font'=>'删除失败']);
        }
    }

    public function edit($id){
    	$info=Visit::find($id);
    	$salesman=Salesman::all();
    	$client=Client::all();
    	return view('visit.edit',['info'=>$info,'salesman'=>$salesman,'client'=>$client]);
    }

    public function update($id){
        $validatedData = request()->validate([ 
            'v_man' => 'required', //验证|表名
            'v_address' => 'required',
        ],[
            'v_man.required'=>'访问人必填',
            'v_address.required'=>'访问地址必填',
        ]);
    	$data=request()->except('_token');
    	$data['v_time']=time();
    	$res=Visit::where('v_id',$id)->update($data);
        if($res!==false){
            return redirect('/visit');
        }
    }



}
