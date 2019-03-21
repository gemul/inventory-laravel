<?php

namespace App\Http\Controllers\Peminjaman;

use App\Peminjaman;
use App\Barang;
use App\Kategori;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{

    function index(Request $request){
        $kategori = new Kategori();
        $data=Array(
            'kategoriList' => $kategori->orderBy('nama','desc')->get()
        );
        return view('peminjaman.entri',$data);
    }

    function ajax(Request $request){
        if($request->route('ajaxname')==null){
            return "Error:ajax route not defined";
        }
        switch($request->route('ajaxname')){
            case "tabel-peminjaman":
                $terpinjam = new Peminjaman();
                $data = Array( 'listTerpinjam'=>$terpinjam->whereNull('kembali')->get() );
                return view('peminjaman.ajax.tabel-peminjaman',$data);
            break;
            case "select-barang":
                //request&preprocess
                $page=(isset($request->page))?$request->page:1;
                $perPage=10;
                $curPointer=($page-1)*$perPage;
                //list barang
                $listBarang=Barang::cari($request->search)
                    ->skip($curPointer)
                    ->take($perPage)
                    ->orderBy('nama','asc')
                    ->orderBy('namabarang','asc')
                    ->get();
                $results=Array();
                foreach($listBarang as $item){
                    array_push($results,['id'=>$item->idbarang,'text'=>$item->nama.">".$item->namabarang]);
                }
                //total
                $total=Barang::cari($request->search)->count();
                //pagination
                $displayedCount=$perPage*$page;
                if($displayedCount < $total){
                    $pagination=true;
                }else{
                    $pagination=false;
                }

                return json_encode(['results'=>$results,'pagination'=>['more'=>$pagination]]);
            break;
            case "typeahead-nama":
                $data=Peminjaman::taPeminjam($request->get('query'));
                $result=Array();
                foreach($data as $item){
                    array_push($result,Array(
                        "id"=>$item->peminjam_text,
                        "name"=>$item->peminjam_text,
                        "bukti"=>$item->peminjam_bukti,
                        "nomorbukti"=>$item->peminjam_nomorbukti,
                    ));
                }
                return json_encode([
                    "options" => $result
                ]);
            break;
        }
    }
    function simpanPeminjaman(Request $request){
        //cek dan simpan helper peminjam
        $cek=Peminjaman::getPeminjam($request->nama);
        if($cek==0){
            $peminjam= new Peminjaman();
            $peminjam->username= $request['username'];
            $peminjam->company= $request['company'];
            // add other fields
            $user->save();
        }
        //simpan data peminjaman

        //respon
        return json_encode($request->idbarang);
    }

}