<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Auth;

class AccountSettingController extends Controller
{
    public function post_account_settings(Request $request){
  
    // $user_id = Auth::user()->id;
    // Log::info('user_id',$user_id);

    $edit_admin = User::where('id',1)->first();     
    
    $edit_admin->name = $request->firstName;
    $edit_admin->last_name = $request->lastName;
    $edit_admin->email = $request->email;
    $edit_admin->organization = $request->organization;
    $edit_admin->phone_number = $request->phoneNumber;
    $edit_admin->address = $request->address;
    $edit_admin->state = $request->state;
    $edit_admin->zip_code = $request->zipCode;
    $edit_admin->country = $request->country;
    $edit_admin->currency = $request->currency;
    // $edit_admin->profile_photo_path = $request->photo;
    $edit_admin->save();

    return redirect()->back()->with('status','Account Information Upadted Successfuly');

    }
}
