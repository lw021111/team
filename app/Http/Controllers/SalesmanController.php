<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Salesman;
class SalesmanController extends Controller
{
	public function create(){
    	return view('salesman.create');
    }

    public function store(){
    	$validatedData = request()->validate([ 
            's_name' => 'required|unique:salesman', //验证|表名
            's_phone' => 'required',
            's_mobile' => 'required', 
        ],[
            's_name.required'=>'名称必填',
            's_name.unique'=>'名称已存在',
            's_phone.required'=>'办公电话必填',
            's_mobile.required'=>'手机必填',
        ]);
    	$data=request()->except('_token');
    	$res=Salesman::create($data);
    	if($res){
    		return redirect('salesman');
    	}
    }

    //检查名称是否存在
    public function checkName(){
        $s_name=request()->s_name;
        $count=Salesman::where('s_name',$s_name)->count();
        echo $count;
    }

	public function index(){
        $pageSize=config('app.pageSize');
		$info=Salesman::orderby('s_id','desc')->paginate($pageSize);
        //ajax分页
        if(request()->ajax()){
            return view('salesman.ajaxindex',['info'=>$info]);
        }
    	return view('salesman.index',['info'=>$info]);
    }

    public function destroy(){
    	$id=request()->id;
    	$res=Salesman::destroy($id);
    	if($res){
            echo json_encode(['code'=>200,'font'=>'删除成功']);
        }else{
            echo json_encode(['code'=>300,'font'=>'删除失败']);
        }
    }

    public function edit($id){
    	$info=Salesman::find($id);
    	return view('salesman.edit',['info'=>$info]);
    }

    public function update($id){
        $validatedData = request()->validate([ 
            's_name' => 'required', //验证|表名
            's_phone' => 'required',
            's_mobile' => 'required', 
        ],[
            's_name.required'=>'名称必填',
            's_phone.required'=>'办公电话必填',
            's_mobile.required'=>'手机必填',
        ]);
    	$data=request()->except('_token');
    	$res=Salesman::where('s_id',$id)->update($data);
        if($res!==false){
            return redirect('/salesman');
        }
    }
    



}
