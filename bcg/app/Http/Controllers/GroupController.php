<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Item;
use Auth;
use App\Card;
use App\AuthCheck;
use App\User;

class GroupController extends Controller
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
  
  public function new(){
    $view = view('groups.new',[
      'admin' => AuthCheck::isAdmin(),
    ]);

    return $view;
  }

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

  public function editGroup(Group $group){
    $view = view('groups.edit', [
      'group' => $group,
      'rights' => AuthCheck::groupRights($group),
      'admin' => AuthCheck::isAdmin(),
    ]);
    return $view;
  }

  public function deleteGroup(Group $group){
    if(AuthCheck::groupRights($group)):
      $group->delete();
    endif;

    $view = redirect('/groups');

    return $view;
  }

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
  
}
