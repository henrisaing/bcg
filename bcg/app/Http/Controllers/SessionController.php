<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SessionController extends Controller
{
  public function theme(Request $request){
    Session::put('theme', $request->session_theme);

    $view = redirect()->back();

    return $view;
  }
}
