<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
use App\Item;
use App\User;

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
}
