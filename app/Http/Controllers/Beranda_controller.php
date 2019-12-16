<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Beranda_controller extends Controller
{
	public function index(){
		// postingan diurut berdasarkan created_at descending tabel artikel
        $artikel = \DB::table('artikel as a')->join('kategori as k','k.id','=','a.id_kategori')->select('a.judul','a.isi','a.gambar','a.created_at','k.nama as kategori','a.artikel_id')->orderby('created_at','desc')->paginate(5);
        $random = \DB::table('artikel as a')->join('kategori as k','k.id','=','a.id_kategori')->select('a.judul','a.isi','a.gambar','a.created_at','k.nama as kategori','a.artikel_id')->limit(2)->inRandomOrder()->get();

        return view('welcome',compact('artikel','random'));
	}
	
	public function search(Request $request){
        $search = $request->search;
		$artikel = \DB::table('artikel as a')->join('kategori as k','k.id','=','a.id_kategori')->where('a.judul','like','%'.$search.'%')
		->orWhere('a.isi','like','%'.$search.'%')
		->select('a.judul','a.isi','a.gambar','a.created_at','k.nama as kategori','a.artikel_id')
		->orderby('created_at','desc')->paginate(10);

        return view('welcome',compact('artikel'));
    }
	
    public function detail($artikel_id){
    	$artikel = \DB::table('artikel as a')->join('users as u','a.user_id','=','u.id')->where('a.artikel_id',$artikel_id)->first();
    	
    	$komentar = \DB::table('komentar')->where('artikel_id',$artikel_id)->get();
    	$total_komentar = \DB::table('komentar')->where('artikel_id',$artikel_id)->count();

    	return view('detail',compact('artikel','komentar','total_komentar'));
    }

    public function komentar(Request $request, $artikel_id){
    	\DB::table('komentar')->insert([
    		'artikel_id'=>$artikel_id,
    		'nama'=>$request->nama,
    		'email'=>$request->email,
    		'isi'=>$request->isi,
    		'created_at'=>date('Y-m-d H:i:s')
    	]);

    	return redirect('detail/'.$artikel_id);
	}
	
	public function artikel_kategori($kategori_id){

		$data = \DB::table('artikel as a')->join('kategori as k','k.id','=','a.id_kategori')
		->where('a.id_kategori',$kategori_id)
		->select('a.judul','a.isi','a.gambar','a.created_at','k.nama as kategori','a.artikel_id')
		->orderby('created_at','desc')->get();

        return view('kategori',compact('data'));
    }
}
