<?php

namespace App;

use App\Traits\Models\Impersonator;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

}
