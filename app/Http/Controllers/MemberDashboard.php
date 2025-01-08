<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberDashboard extends Controller
{
  public function index()
  {
    return view('content.dashboard.dashboard-member');
  }
}
