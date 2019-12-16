<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Komentar_controller extends Controller
{
    public function index(){
    	$title = 'Manage Komentar';
    	$data = \DB::table('komentar as k')->join('artikel as a','a.artikel_id','=','k.artikel_id')->select('a.judul','k.nama','k.email','k.isi','k.created_at','k.komentar_id')->get();

    	return view('admin.komentar.komentar_index',compact('title','data'));
    }

    public function delete($komentar_id){
    	\DB::table('komentar')->where('komentar_id',$komentar_id)->delete();

    	return redirect('admin/komentar');
    }
}
