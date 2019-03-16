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
        return view('peminjaman.entri');
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
        }
    }

}
