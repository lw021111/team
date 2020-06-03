<?php

namespace App\Http\Controllers;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *管理员展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageSize=config('app.pageSize');
        $client=Client::getClientIndex($pageSize);
        //dd($client);
        return view('client.index',['client'=>$client]);
    }

    /**
     * Show the form for creating a new resource.
     *管理员添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return  view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *管理员添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //接值
        $post=$request->except('_token');
        //dd($post);
        $res=Client::create($post);
        //dd($res);
        if($res){
            return redirect('client');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client=Client::where('c_id',$id)->first();
        //dd($client);
        return view('client.edit',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *修改执行页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $post=$request->except('_token');
        //dd($post);
        $res = Client::where('c_id',$id)->update($post);
        if($res!==false){
            return redirect('client');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = Client::destroy($id);
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'删除成功！']);die;
        }
    }
    public function checkName(){
        //echo "123";
        $c_name=request()->c_name;
        if($c_name){
            $where[]=['c_name',$c_name];
        }
        $c_id=request()->c_id??'';
        if($c_id){
            $where[]=['c_id','<>',$c_id];
        }
        //dd($name);
        //dd($c_name);
        $count=Client::where($where)->count();
       // dd($count);
        echo $count;
    }
}
