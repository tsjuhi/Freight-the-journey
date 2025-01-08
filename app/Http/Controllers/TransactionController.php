<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction()
    {
        return view('content.transaction.transactions');
    }

    public function add_transaction()
    {
        return view('content.transaction.add-transaction');
    }

    public function view_transaction()
    {
        return view('content.transaction.view-transaction');
    }


    public function edit_transaction()
    {
        return view('content.transaction.edit-transaction');
    }

      
}
