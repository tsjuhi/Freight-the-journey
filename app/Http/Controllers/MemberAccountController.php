<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberAccountController extends Controller
{
    public function  MemberProfile (){
    
        return view('content.member.profile.member-profile');

    }

    public function  companyProfile(){

    return view('content.member.profile.company-profile');

    }

    public function member_account_setting (){
        
        return view('content.member.profile.member-account-setting');
    }


    public function member_account_security (){
     
        return view('content.member.profile.member-security');

    }

    public function company_setting (){
     
        return view('content.member.profile.company-setting');

    }
}
