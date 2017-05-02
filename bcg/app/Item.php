<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
class Item extends Model
{
  protected $fillable = [
    'name', 'info', 'chance',
  ];

  public function group(){
    return $this->belongsTo(Group::class);
  }
}
