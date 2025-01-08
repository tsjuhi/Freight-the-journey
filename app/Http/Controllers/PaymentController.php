<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function Payment()
    {
        return view('content.dashboard.app-logistics-dashboard');
    }

}
