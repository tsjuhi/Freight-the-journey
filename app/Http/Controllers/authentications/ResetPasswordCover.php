<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordCover extends Controller
{
  public function index(Request $request)
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-reset-password-cover', ['pageConfigs' => $pageConfigs,'token' => $request->token, 'email' => $request->email]);
  }
}
