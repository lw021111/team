<?php

namespace App\Http\Controllers;
use  App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        //
        return view('login.login');
    }
    public function logindo(Request $request)
    {
        //
        $post=$request->except('_token');
       //dd($post);
       //dd($post['admin_name']);
       $admin=Admin::where('admin_name',$post['admin_name'])->first();
       //dd($post);
      //dd($admin);
       if(!$admin){
        return redirect('/login')->with('msg','用户名或密码错误');
    }
    
    if($admin->admin_pwd!=$post['admin_pwd']){
        return redirect('/login')->with('msg','用户名或密码错误');
    }

    
       //七天免登录
       if(isset($post['isremember'])){
        Cookie::queue('admin',serialize($admin),60*24*7);
    }

    session(['admin'=>$admin]);
    
     return redirect('/client');
    }
}
