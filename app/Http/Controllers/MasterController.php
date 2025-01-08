<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
  public function thank_you(){

    return view('content.authentications.auth-thankyou-page');

  }
}
