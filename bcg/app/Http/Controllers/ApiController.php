<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Item;
use Auth;
use App\Card;
use App\AuthCheck;
use App\User;

class ApiController extends Controller
{
	public function getAll(){
		$response = User::where('email', 'bingobot@uisnotc.com')->first()->groups()->get();
		//$test = "testing api call";
		
		return response()->json($response);
	  }
  
  public function group(Group $group){
	  //$test = User::where('email', 'bingobot@uisnotc.com')->first()->id;
	  $response = "Error, bingobot does not have permission";
	  if(User::where('email', 'bingobot@uisnotc.com')->first()->id == $group->user_id):
		  $response = $group->items()->get();
	  endif;
	  
	  return response()->json($response);
  }
  
  public function addItem(Group $group, $name, $freq){
	  if(User::where('email', 'bingobot@uisnotc.com')->first()->id == $group->user_id):
		$response = $group->items()->create([
			'name' => $name,
			'info' => null,
			'chance' => $freq,
		  ]);
	  endif;
	  
	  return response()->json($response);
  }
  
  public function getCard(Group $group){
	   if(User::where('email', 'bingobot@uisnotc.com')->first()->id == $group->user_id):
		   $response = "http://bingo.uisnotc.com/group/".$group->id."/generate";
	   endif;
	   return response()->json($response);
  }
  
  public function updateItem(Item $item, $name, $chance){
	  $group = $item->group()->first();
	  $response = 'error, no update';
	  if(User::where('email', 'bingobot@uisnotc.com')->first()->id == $group->user_id):
		  $response = $item->update([
			'name' => $name,
			'chance' => $chance
		  ]);
	  endif;
	  
	  return response()->json($response);
  }
  
  
  public function createGroup($name, $type){
	 $response = User::where('email', 'bingobot@uisnotc.com')->first()->groups()->create([
      'name' => $name,
      'info' => null,
      'type' => $type,
    ]);
	//$response = $name." + ".$type;
	
	return response()->json($response);
  }

  //end class
}