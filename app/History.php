<?php

namespace App;

use DB;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class History
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser', 'idbarang', 'nama', 'tgl_pinjam', 'bukti', 'nomorbukti', 'label', 'catatan', 'kembali'
    ];
    const CREATED_AT = 'created';
    public $timestamps = false;
    protected $table = 'history';
    protected $primaryKey = 'idhistory';
    /**
     * @return boolean
     */

    public function user(){
        return $this->belongsTo('App\User','iduser');
    }

    public static function taPeminjam($keyword){
        $data=DB::table('helper_peminjam')
            ->select('peminjam_text','peminjam_bukti','peminjam_nomorbukti')
            ->where('peminjam_text','like',"%".$keyword."%")
            ->whereNull('deleted')
            ->get();
        return $data;
    }

    public static function getPeminjam($nama){
        $data=DB::table('helper_peminjam')
            ->select('peminjam_text')
            ->where('peminjam_text','=',$nama)
            ->whereNull('deleted')
            ->count();
        return $data;
    }

    public static function addHistory($jenis,$detail){
        $history=DB::table('history')->insert([
            [
                'iduser' => Auth::user()->iduser,
                'jenis' => $jenis,
                'detail' => $detail
            ]
        ]);
        return $history;
    }

    public static function updatePeminjam($data){
        $helper=DB::table('helper_peminjam')
            ->where('peminjam_text', $data->nama)
            ->update([
                'peminjam_bukti' => $data->bukti,
                'peminjam_nomorbukti' => $data->nomorbukti
            ]);
        return $helper;
    }
    public static function pengembalian($idpeminjaman,$kembali,$kembali_catatan){
        $helper=DB::table('peminjaman')
            ->where('idpeminjaman', $idpeminjaman)
            ->update([
                'kembali' => $kembali,
                'kembali_catatan' => $kembali_catatan,
            ]);
        return $helper;
    }

}
