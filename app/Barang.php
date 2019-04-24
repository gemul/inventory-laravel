<?php

namespace App;

use App\Traits\Models\Impersonator;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Barang extends Authenticatable
{
    use Notifiable, FillableFields, OrderableTrait, SearchLikeTrait, Impersonator;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idkategori','kode', 'namabarang', 'spesifikasi', 'catatan'
    ];
    use SoftDeletes;    
    protected $dates = ['deleted'];
    const DELETED_AT = 'deleted';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    protected $table = 'barang';
    protected $primaryKey = 'idbarang';
    /**
     * @return boolean
     */

    public function kategori(){
        return $this->belongsTo('App\Kategori','idkategori');
    }
    public function transaksi(){
        return $this->hasMany('App\Transaksi','idbarang');
    }

    public function scopeCari($query,$keyword){
        return $query->join('kategori','barang.idkategori','=','kategori.idkategori')
                    ->where('namabarang','like',"%".$keyword."%")
                    ->orWhere('nama','like',"%".$keyword."%");
    }

    public static function stok(){
        $result=Array();
        $query=DB::table('barang')
            ->select('barang.idbarang','nama','namabarang')
            ->join('kategori', 'barang.idkategori','=','kategori.idkategori')
            ->get();
        foreach($query as $barang){
            $stok= DB::table('transaksi')
                ->selectRaw("SUM(CASE WHEN jenis = 'masuk' THEN jumlah ELSE 0 END) AS total_masuk, " .
                    "SUM(CASE WHEN jenis = 'keluar' THEN jumlah ELSE 0 END) AS total_keluar")
                ->where('idbarang','=',$barang->idbarang)
                ->first();
            $result[]=['idbarang'=>$barang->idbarang,'kategori'=>$barang->nama,'nama'=>$barang->namabarang,'stok'=>($stok->total_masuk - $stok->total_keluar)];
        }
        return $result;
    }

}
