<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Currency;
use App\Models\User;

class AccountSettingsAccount extends Controller
{
  public function index()
  {

    $country = Country::get();
    $currency = Currency::get();
    $admin_details = User::where('id',1)->first();
    return view('content.pages.pages-account-settings-account',compact('country','currency','admin_details'));
  }
}
