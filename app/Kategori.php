<?php

namespace App;

use App\Traits\Models\Impersonator;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kategori extends Authenticatable
{
    use Notifiable, FillableFields, OrderableTrait, SearchLikeTrait, Impersonator;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode', 'nama'
    ];
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    /**
     * @return boolean
     */

    public function barang(){
        return $this->hasMany('App\Barang','idkategori');
    }

}
