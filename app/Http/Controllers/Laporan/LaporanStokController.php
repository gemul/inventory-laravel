<?php

namespace App\Http\Controllers\Laporan;
use App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;

class LaporanStokController extends Controller
{

    function index(Request $request){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    function stok(Request $request){
        $data=Barang::stok();
        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper( 'a4', 'portrait');
        $pdf->loadHTML( view('laporan.stok', ['data' => $data]) );
        return $pdf->stream( 'Laporan Stok (SILabkom Cetak_'.date('Y-m-d_H:i:s').').pdf' , array('Attachment' => 0) );
    }

}
