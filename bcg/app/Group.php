<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\User;
class Group extends Model
{
    //
  protected $fillable = [
  'name','info','type',
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function items(){
    return $this->hasMany(Item::class);
  }
}
