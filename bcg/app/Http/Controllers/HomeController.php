<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Item;
use Auth;
use App\Card;
use App\AuthCheck;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    
    return view('home', [
      'groups' => Card::getGroups(),
    ]);
  }

  // moved to GROUPCONTROLLER
  public function new(){
    $view = view('groups.new',[
      'admin' => AuthCheck::isAdmin(),
    ]);

    return $view;
  }

  // moved to GROUPCONTROLLER
  public function editGroup(Group $group){
    $view = view('groups.edit', [
      'group' => $group,
      'rights' => AuthCheck::groupRights($group),
      'admin' => AuthCheck::isAdmin(),
    ]);
    return $view;
  }

  // moved to GROUPCONTROLLER
  public function deleteGroup(Group $group){
    if(AuthCheck::groupRights($group)):
      $group->delete();
    endif;

    $view = redirect('/groups');

    return $view;
  }

  // moved to GROUPCONTROLLER
  public function create(Request $request){
    $type = 'private';

    if($request->type == 'global' && AuthCheck::isAdmin() == false):
      $type = 'private';
    else:
      $type = $request->type;
    endif;

    Auth::user()->groups()->create([
      'name' => $request->name,
      'info' => $request->info,
      'type' => $type,
    ]);

    $view = redirect('/groups');

    return $view;
  }

  // moved to GROUPCONTROLLER
  public function updateGroup(Request $request, Group $group){
    $type = 'private';

    if($request->type == 'global' && AuthCheck::isAdmin() == false):
      $type = 'private';
    else:
      $type = $request->type;
    endif;

    if(AuthCheck::groupRights($group)):
      $group->update([
        'name' => $request->name,
        'info' => $request->info,
        'type' => $type,
      ]);
    endif;

    $view = redirect('/groups');
    return $view;
  }

  // moved to GROUPCONTROLLER
  public function groups(){
    $chunkyGroups = Card::chunkIdWithName(Card::getGroups(),5);
    // $view = view('groups.index', [
    //   'groups' => Auth::user()->groups()->get(),
    //   'chunk' => $chunkyGroups,
    // ]);

    $view = view('groups.index', [
      'chunks' => $chunkyGroups,
      'title' => 'GROUP',
      'url1' => '/group/',
      'url2' => '/items',
      'groups' => Card::getGroups(),
    ]);

    return $view;
  }

  // items
  // moved to ItemController.php
  public function items(Group $group){
    $chunkyItems = Card::chunkIdWithName($group->items()->get(),5);

    $rights = AuthCheck::groupRights($group);

    $view = view('items.index', [
      'chunks' => $chunkyItems,
      'title' => 'ITEMS',
      'url1' => '/item/',
      'url2' => '/edit',
      'group' => $group,
      'rights' => $rights,
    ]);

    // $view = view('items.index',[
    //   'items' => $group->items()->get(),
    //   'group' => $group
    // ]);

    return $view;
  }

  // moved to ItemController.php
  public function newItem(Group $group){
    $view = view('items.new', [
      'group' => $group,
    ]);

    return $view;
  }

  // moved to ItemController.php
  public function editItem(Item $item){
    $view = view('items.edit', [
      'item' => $item,
      'rights' => AuthCheck::groupRights($item->group()->get()[0])
    ]);

    return $view;
  }

  // moved to ItemController.php
  public function createItem(Request $request, Group $group){
    $group->items()->create([
      'name' => $request->name,
      'info' => $request->info,
      'chance' => $request->chance,
    ]);
    $view = redirect('/group/'.$group->id.'/items');

    return $view;
  }


  // moved to ItemController.php
  public function updateItem(Item $item, Request $request){
    if(AuthCheck::groupRights($item->group()->get()[0])):
      $item->update([
        'name' => $request->name,
        'info' => $request->info,
        'chance' => $request->chance,
      ]);
    endif;

    $view = redirect('/group/'.$item->group()->get()[0]->id.'/items');

    return $view;
  }

  // moved to CardController.php
  public function generateCard(Group $group){

    $view = view('card.bingo', [
      'group' => $group,
      'items' => $group->items()->get(),
      'card' => Card::generateCard($group),
    ]);

    return $view;
  }

  // moved to CardController.php
  public function genCard(Group $group){
    $view = view('card.generate', [
      'group' => $group,
      'items' => $group->items()->get(),
      'card' => Card::generateCard($group),
    ]);

    return $view;
  }

  // moved to CardController.php
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

  // moved to CardController.php
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

  // moved to CardController.php
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

  // moved to CardController.php
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

  // moved to CardController.php
  public function myCards(){
    $cards = Card::myCards(5);
  
    $view = view('card.cards', [
      'cards' => $cards,
    ]);

    return $view;
  }
}
