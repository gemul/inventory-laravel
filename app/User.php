<?php

namespace App;

use App\Traits\Models\Impersonator;
use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\SearchLikeTrait;
use App\Traits\Models\FillableFields;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, FillableFields, OrderableTrait, SearchLikeTrait, Impersonator;
    
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';
    protected $table = 'user';
    protected $primaryKey = 'iduser';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'username', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * @return boolean
     */
    public function isAdmin()
    {
        return true;
       // return (int) $this->is_admin === 1;
    }

    /**
     * @return string
     */
    public function getLogoPath()
    {
        return Utils::logoPath($this->logo_number);
    }

    /**
     * @return mixed
     */
    public function getRecordTitle()
    {
        return $this->name;
    }

    public function hakAkses($hak)
    {
        return in_array($hak,json_decode($this->hak));
    }
}
