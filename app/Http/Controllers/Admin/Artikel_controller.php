<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Artikel_controller extends Controller
{
    public function index(){
    	$title = 'List Event';
        $data = \DB::table('artikel as a')->join('users as u','u.id','=','a.user_id')
        ->join('kategori as k','k.id','=','a.id_kategori')
        ->select('a.judul','a.created_at','u.name','k.nama as kategori','a.artikel_id')
        ->where('a.user_id',\Auth::user()->id)->get();

    	return view('admin.artikel.artikel_index',compact('title','data'));
    }

    public function add(){
    	$title = 'Tambah Info Event';
        $kategori = \DB::table('kategori')->orderBy('nama','asc')->get();

    	return view('admin.artikel.artikel_add',compact('title','kategori'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'judul'=>'required',
    		'isi'=>'required',
            'id_kategori'=>'required'
    	]);
        
        //memasukan gambar ke database
    	$file = $request->file('image');

        //variabel dg tipe data array
    	$data = array();

    	if($file){
    		$destinationPath = 'uploads';
    		$file->move($destinationPath,$file->getClientOriginalName());

            $data['id_kategori'] = $request->id_kategori;
    		$data['judul'] = $request->judul;
    		$data['isi'] = $request->isi;
    		$data['user_id'] = \Auth::user()->id;
    		$data['created_at'] = date('Y-m-d H:i:s');
    		$data['updated_at'] = date('Y-m-d H:i:s');
    		$data['gambar'] = $file->getClientOriginalName();
    	}else{
            $data['id_kategori'] = $request->id_kategori;
    		$data['judul'] = $request->judul;
    		$data['isi'] = $request->isi;
    		$data['user_id'] = \Auth::user()->id;
    		$data['created_at'] = date('Y-m-d H:i:s');
    		$data['updated_at'] = date('Y-m-d H:i:s');
    	}

    	\DB::table('artikel')->insert($data);

    	\Session::flash('sukses','Data berhasil di input');

    	return redirect('admin/artikel');
    }

    public function edit($id){
        $title = 'Edit Info Event';
        $dt = \DB::table('artikel')->where('artikel_id',$id)->first();
        $kategori = \DB::table('kategori')->orderBy('nama','asc')->get();
        // dd($title);
        return view('admin.artikel.artikel_edit',compact('dt','title','kategori'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'judul'=>'required',
            'isi'=>'required',
            'id_kategori'=>'required'
        ]);
        // dd($id);
        $file = $request->file('image');

        $data = array();

        if($file){
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());

            $data['id_kategori'] = $request->id_kategori;
            $data['judul'] = $request->judul;
            $data['isi'] = $request->isi;
            $data['user_id'] = \Auth::user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['gambar'] = $file->getClientOriginalName();
        }else{
            $data['id_kategori'] = $request->id_kategori;
            $data['judul'] = $request->judul;
            $data['isi'] = $request->isi;
            $data['user_id'] = \Auth::user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        \DB::table('artikel')->where('artikel_id',$id)->update($data);

        \Session::flash('sukses','Data berhasil di update');

        return redirect('admin/artikel');

    }

    public function delete($id){
        \DB::table('artikel')->where('artikel_id',$id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');
        return redirect('admin/artikel');
    }
}
