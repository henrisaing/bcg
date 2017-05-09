<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
use App\Item;
use App\User;
use Auth;

class Card extends Model
{
  protected $fillable = [
    'slots', 'styles',
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }

    //
  public static function generateCard(Group $group){
    $items = $group->items()->get();
    $itemsArray = [];

    foreach ($items as $item):
      for($i = 0; $i < $item->chance; $i++):
        $itemsArray[]= $item->name;
      endfor;
    endforeach;

    shuffle($itemsArray);
    $arr = array_unique($itemsArray);
    // $arr = $itemsArray;
    shuffle($arr);
    array_splice($arr, 12, 0, 'freebie');
    $output = array_slice($arr, 0, 25);

    return array_chunk($output,5);
  }

  public static function myCards($int){
    $cards = Auth::user()->cards()->get();
    $myCards = [];

    foreach ($cards as $card):
      $myCards[]= $card->id;
    endforeach;

    //fills end of array with blanks
    //nice square card
    $loop = ($int*$int) - count($myCards);
    if($loop > 0):
      for($i = 0; $i < $loop ; $i++):
        $myCards[] = '';
      endfor;
    endif;

    return array_chunk($myCards, $int);
  }

  public static function chunkIdWithName($arr,$int){
    $return = [];

    foreach ($arr as $obj):
      $return[$obj->id] = $obj->name;
    endforeach;

    $loop = ($int*$int) - count($return);
    if($loop > 0):
      for($i = 0; $i < $loop ; $i++):
        $return[] = '';
      endfor;
    endif;


    return array_chunk( $return, $int, true);
  }
}
