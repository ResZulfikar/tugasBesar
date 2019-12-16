<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Kategori_controller extends Controller
{
    public function index(){
        $title = 'Manage Kategori';
        //variabel untuk meng-query / menampung data yg dipanggil
        //join ini untuk menggabung tabel user dengan ketegori
        //dmna tabel user dpt dipanggil variabel kategori utk mendapat nama admin yg masuk
        
        $kategori = \DB::table('kategori as k')->join('users as u','k.user_id','=','u.id')
        ->select('k.nama','u.name','k.created_at','k.id','k.updated_at')->get();


        return view('admin.kategori.kategori_index', compact('title','kategori'));
    }

    public function add(){
        $title = 'Tambah Kategori';
        $users =\DB::table('users')->get();

    	return view('admin.kategori.kategori_add',compact('title'));
    }

    //mengambil nilai inputan dari form tambah kategori maka menggunakan
    //parameter request
    public function store(Request $request){
        //validasi utk menandakan pada form wajib mengisi
        //field nama di tag input di kategori_add.blade.php wajib mengisi 
        $this->validate($request,[
            'nama'=>'required'
        ]);
            //setiap inputan di kategori_add akan ditampung di $nama
        $nama = $request -> nama;

        //dimasukan ke database kategoir
        \DB::table('kategori')->insert([
            'nama'=>$nama,
            'user_id'=>\Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        return redirect('admin/kategori');
    }

    public function edit($id){
        $title = 'Edit Kategori';
        $kategori = \DB::table('kategori')->where('id',$id)->first();

        return view('admin.kategori.kategori_edit',compact('kategori','title'));
    }

    public function update(Request $request, $id){
        \DB::table('kategori')->where('id',$id)->update([
            'nama'=>$request->nama,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        return redirect('admin/kategori');
    }

    
    public function delete($id){
        \DB::table('kategori')->where('id',$id)->delete();

        return redirect('admin/kategori');
    }
}
