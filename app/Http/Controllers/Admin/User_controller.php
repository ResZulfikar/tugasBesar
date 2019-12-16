<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User_controller extends Controller
{
    public function index(){
    	$title = 'Data User';
    	$data = \DB::table('users')->get();

    	return view('admin.user.user_index',compact('title','data'));
    }

    public function add(){
    	$title = 'tambah user';

    	return view('admin.user.user_add',compact('title'));
    }

    public function store(Request $request){
    	\DB::table('users')->insert([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>bcrypt($request->password),
    		'created_at'=>date('Y-m-d H:i:s')
    	]);

    	return redirect('admin/user');
    }

    public function update(Request $request,$id){
        \DB::table('users')->where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        return redirect('admin/user');
    }

    public function edit($id){
        $title = 'Edit User';
        $dt = \DB::table('users')->where('id',$id)->first();

        return view('admin.user.user_edit',compact('dt','title'));
    }

    public function delete($id){
        \DB::table('users')->where('id',$id)->delete();

        return redirect('admin/user');
    }
}
