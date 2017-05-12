<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Group;
use App\Item;
use App\Card;

class AuthCheck extends Model
{
    //

  public static function ownsCard(Card $card){
    $return = false;

    if($card->user_id == Auth::user()->id):
      $return = true;
    endif;

    return $return;
  }

  public static function groupRights(Group $group){
    $return = false;

    if(Auth::user()->admin || $group->user_id == Auth::user()->id):
      $return = true;
    endif;

    return $return;
  }

  public static function isAdmin(){
    $return = false;

    if(Auth::user()->admin):
      $return = true;
    endif;

    return $return;
  }
}
