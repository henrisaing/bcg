<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Item;
use Auth;
use App\Card;
use App\AuthCheck;

class ItemController extends Controller
{
    //
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

  public function newItem(Group $group){
    $view = view('items.new', [
      'group' => $group,
    ]);

    return $view;
  }

  public function editItem(Item $item){
    $view = view('items.edit', [
      'item' => $item,
      'rights' => AuthCheck::groupRights($item->group()->get()[0])
    ]);

    return $view;
  }

  public function createItem(Request $request, Group $group){
    if(AuthCheck::groupRights($group)):
      $group->items()->create([
        'name' => $request->name,
        'info' => $request->info,
        'chance' => $request->chance,
      ]);
    endif;
    $view = redirect('/group/'.$group->id.'/items');

    return $view;
  }

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
}
