<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class LC extends Model
{
  protected $fillable = ['name'];
  protected $table = 'l_cs';
  public $timestamps = false;

  /**
   * Get the members that compose this LC.
   */
  public function getMembersAttribute()
  {
    // Get the members of all groups
    $members = Member::all();
    $members = $members->filter(function ($member) {
      return $member->lc == $this;
    });
    return $members;
  }

  /**
   * Get the groups that compose this LC.
   */
  public function groups()
  {
    return $this->hasMany(Group::Class);
  }

  /**
   * Get the ambassador of this LC.
   */
  public function ambassador()
  {
    return $this->hasOne(Member::Class, 'l_c_id');
  }
}
