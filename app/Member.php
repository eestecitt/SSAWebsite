<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Member extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'members';

    protected $hidden = ['password', 'remember_token'];

    protected $fillable = [
      'first_name',
      'last_name',
      'birthdate',
      'sex', 'email',
      'password',
      'country',
      'years_study',
      'study_level',
      'uni',
      'faculty',
      'department',
      'number',
      'image',
      'tshirt',
      'cv',
      'city',
      'activated'
    ];

    protected $casts = [
        'admin' => 'boolean',
        'hasCV' => 'boolean',
        'ambassador' => 'boolean'
    ];

    public function getHasCVAttribute()
    {
      return (boolean) $this->cv;
    }

    /**
     * Get the group where this member participates.
     */
    public function group()
    {
      return $this->belongsTo('App\Group');
    }

    public function ambassador()
    {
      return $this->belongsTo('App\LC', 'l_c_id');
    }

    public function getLcAttribute()
    {
      return $this->group->lc;
    }

    public function getFull_nameAttribute()
    {
      return $this->first_name." ".$this->last_name;
    }

}
