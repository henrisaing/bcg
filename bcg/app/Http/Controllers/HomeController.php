<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Item;
use Auth;
use App\Card;

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
    return view('home');
  }

  public function new(){
    $view = view('groups.new');

    return $view;
  }

  public function create(Request $request){
    Auth::user()->groups()->create([
      'name' => $request->name,
      'info' => $request->info,
      'type' => $request->type,
    ]);

    $view = redirect('/groups');

    return $view;
  }

  public function groups(){
    $view = view('groups.index', [
      'groups' => Auth::user()->groups()->get()
    ]);

    return $view;
  }

  // items

  public function items(Group $group){
    $view = view('items.index',[
      'items' => $group->items()->get(),
      'group' => $group
    ]);

    return $view;
  }

  public function newItem(Group $group){
    $view = view('items.new', [
      'group' => $group,
    ]);

    return $view;
  }

  public function createItem(Request $request, Group $group){
    $group->items()->create([
      'name' => $request->name,
      'info' => $request->info,
      'chance' => $request->chance,
    ]);
    $view = redirect('/group/'.$group->id.'/items');

    return $view;
  }

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
}
