<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Item;
use Auth;
use App\Card;
use App\AuthCheck;

class CardController extends Controller
{
    //
  public function generateCard(Group $group){

    $view = view('card.bingo', [
      'group' => $group,
      'items' => $group->items()->get(),
      'card' => Card::generateCard($group),
    ]);

    return $view;
  }

  public function genCard(Group $group){
    $view = view('card.generate', [
      'group' => $group,
      'items' => $group->items()->get(),
      'card' => Card::generateCard($group),
    ]);

    return $view;
  }

  public function saveCard(Request $request){
    $card = Auth::user()->cards()->create([
      'slots' => serialize($request->input('slot')),
      'styles' => serialize($request->input('style')),
    ]);
    //serialize unideal, but quick functional and dirty
    //good enough for now
    $view = redirect('/card/'.$card->id);
    return $view;
  }

  public function userCard(Card $card){
    $slots = unserialize($card->slots);
    $styles = unserialize($card->styles);

    $chunkySlots = array_chunk($slots, 5);
    $chunkyStyles = array_chunk($styles, 5);

    $view = view('card.single', [
      'slots' => $chunkySlots,
      'styles' => $chunkyStyles,
      'card' => $card,
      'owner' => AuthCheck::ownsCard($card),
    ]);

    return $view;
    // return $card;
  }

  public function updateCard(Card $card, Request $request){
    if(AuthCheck::ownsCard($card)):
      $card->update([
        'slots' => serialize($request->input('slot')),
        'styles' => serialize($request->input('style')),
      ]);
    endif;
    $view = redirect('/card/'.$card->id);

    return $view;
  }

  // for ajax form posts on bingo card click
  public function ajaxPost(Card $card, Request $request){
    if(AuthCheck::ownsCard($card)):
      $data = $card->update([
        'slots' => serialize($request->input('slot')),
        'styles' => serialize($request->input('style')),
      ]);
    else:
      $data = 1;
    endif;
    
    return response()->json($data, 200);
  }

  public function myCards(){
    $cards = Card::myCards(5);
  
    $view = view('card.cards', [
      'cards' => $cards,
    ]);

    return $view;
  }
}
