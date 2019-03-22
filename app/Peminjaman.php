<?php

namespace App;

use DB;
use App\Traits\Models\Impersonator;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Peminjaman extends Authenticatable
{
    use Notifiable, FillableFields, OrderableTrait, SearchLikeTrait, Impersonator;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser', 'idbarang', 'nama', 'tgl_pinjam', 'bukti', 'nomorbukti', 'label', 'catatan', 'kembali'
    ];
    use SoftDeletes;    
    protected $dates = ['deleted'];
    const DELETED_AT = 'deleted';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    public $timestamps = false;
    protected $table = 'peminjaman';
    protected $primaryKey = 'idpeminjaman';
    /**
     * @return boolean
     */

    public function barang(){
        return $this->belongsTo('App\Barang','idbarang');
    }
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

    public static function addPeminjam($data){
        $helper=DB::table('helper_peminjam')->insert([
            [
                'peminjam_text' => $data->nama,
                'peminjam_bukti' => $data->bukti,
                'peminjam_nomorbukti' => $data->nomorbukti
            ]
        ]);
        return $helper;
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
