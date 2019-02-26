<?php

namespace App;

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

}
