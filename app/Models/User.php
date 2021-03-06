<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class User extends Authenticatable implements HasMedia,LdapAuthenticatable
{

    use HasFactory, Notifiable;

    use HasRoles;
    use HasMediaTrait;
    use AuthenticatesWithLdap;

    public function services()
    {
        return $this ->belongsTo('App\Models\Service', 'service_id' ,'id');
    }
    public function G_Parlementaire()
    {
        return $this ->belongsTo('App\Models\G_Parlementaire', 'groupe_id' ,'id');

    }
    public function departments()
    {
        return $this ->belongsTo('App\Models\Department', 'department_id' ,'id');
    }
    public function comissions()
    {
        return $this ->belongsTo('App\Models\Comission', 'comission_id' ,'id');
    }

    public function comment()
    {
        return $this ->hasMany('App\Models\Comment');
    }
    public function partage()
    {
        return $this ->hasMany('App\Models\Partage');
    }


    protected $guard_name = 'web';


    public function isAdmin() {
        return (bool) $this->id === 1;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
