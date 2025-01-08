<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotificationMail;
use App\Mail\CompanyDetailsMail;
use App\Models\Country;


class RegisterController extends Controller
{
    
   public function register(){
 
    $pageConfigs = ['myLayout' => 'blank'];
   return view("content.authentications.demo-register", ['pageConfigs' => $pageConfigs]);     

   }


   public function post_account_details(Request $request)
     {
       Log::info('Request Data',['user_account requested data'=> $request->all()]);
     
       
       $request->validate([
         'fullname' => 'required|string|max:255',
         'job_title' => 'nullable|string|max:255',
         'email' => 'required|email|unique:members,email,'.($request->member_id),
         'password' => 'required|string|min:3',
         'confirm_password' => 'required|same:password',
     ]
    );
    try {
    $user_account = Member::where('email',$request->email)->first();

    if($user_account != null){
       
        $user_account->fullname = $request->fullname;
        $user_account->job_title = $request->job_title;
        $user_account->email = $request->email;
        $user_account->password = Hash::make($request->password);
        $user_account->save();
    }else{
        $user_account = new Member();
        $user_account->fullname = $request->fullname;
        $user_account->job_title = $request->job_title;
        $user_account->email = $request->email;
        $user_account->password = Hash::make($request->password);
        $user_account->role_id = '2';
        $user_account->status = 'deactive';
        $user_account->save();
    }
        return response()->json([
            'success' => true,
            'member_id' => $user_account->id,
        ]);
        
     Log::info('Data saved',['user_account details'=> $user_account]);
   
     } catch (\Exception $e) {
       Log::error('Error saving user data', ['error' => $e->getMessage()]);
   
     
   }
   
     }



     public function post_company_details(Request $request)
     {
         Log::info('Request Data', ['Company requested data' => $request->all()]);
         $memberId = $request->input('member_id');
         Log::info('Request Data', ['Member Id' => $memberId]);
     
         $request->validate([
          'company_name' => 'required|string|max:255',
          'street_address' => 'nullable|string|max:255',
          'city' => 'nullable|string|max:255',
          'state' => 'nullable|string|max:255',
          'pincode' => 'nullable|numeric|digits:6',
          'country' => 'nullable|string|max:255',
          'company_phone' => 'required|numeric|digits_between:10,12',
          'company_website' => 'nullable|string|max:255',
          'company_size' => 'nullable|string|max:255',
          'business_type' => 'nullable|string|max:255',
          'other_business_type' => 'required_if:business_type,Other|max:255',
          'terms_policy'=> 'required',
          'g-recaptcha-response' => 'required|captcha',
      ],[
        'g-recaptcha-response'=>'The reCAPTCHA field is required.'
      ]);


         // Declare $company_details here
         $company_details = null;
     
         try {
             $company_details = Member::where('id', $memberId)->first();
             Log::info('Company Details Retrieved:', ['company_details' => $company_details]);
     
             if (!$company_details) {
                 Log::error('Member not found', ['member_id' => $memberId]);
                 return response()->json([
                     'success' => false,
                     'message' => 'Member not found',
                 ], 404);
             }
     
             // Update the company details
             $company_details->company_name = $request->input('company_name');
             $company_details->street_address = $request->input('street_address');
             $company_details->city = $request->input('city');
             $company_details->state = $request->input('state');
             $company_details->pincode = $request->input('pincode');
             $company_details->country = $request->input('country');
             $company_details->company_phone = $request->input('company_phone');
             $company_details->company_website = $request->input('company_website');
             $company_details->company_size = $request->input('company_size');
             $company_details->business_type = $request->input('business_type');
             $company_details->other_business_type = $request->input('business_type') === 'Other'
                 ? $request->input('other_business_type')
                 : null;
             $company_details->terms_policy = $request->input('terms_policy');
             $company_details->save();
     
             // Send emails
             Mail::to('ts.juhiverma@gmail.com')->send(new AdminNotificationMail($company_details));
             Mail::to($company_details->email)->send(new CompanyDetailsMail($company_details));
     
             Log::info('Data saved', ['company details' => $company_details]);
     
             return response()->json([
                 'success' => true,
                 'message' => 'Company details updated successfully',
             ]);
         } catch (\Exception $e) {
             Log::error('Error saving company data', ['error' => $e->getMessage(), 'company_details' => $company_details]);
             return response()->json([
                 'success' => false,
                 'message' => 'Failed to update company details',
             ], 500);
         }
     }
     
     public function add_post_company_details(Request $request)
     {
         Log::info('Request Data', ['Company requested data' => $request->all()]);
         $memberId = $request->input('member_id');
         Log::info('Request Data', ['Member Id' => $memberId]);
     
         $request->validate([
          'company_name' => 'required|string|max:255',
          'street_address' => 'nullable|string|max:255',
          'city' => 'nullable|string|max:255',
          'state' => 'nullable|string|max:255',
          'pincode' => 'nullable|numeric|digits:6',
          'country' => 'nullable|string|max:255',
          'company_phone' => 'required|numeric|digits_between:10,12',
          'company_website' => 'nullable|string|max:255',
          'company_size' => 'nullable|string|max:255',
          'business_type' => 'nullable|string|max:255',
          'other_business_type' => 'required_if:business_type,Other|max:255',
         
      ]);


         // Declare $company_details here
         $company_details = null;
     
         try {
             $company_details = Member::where('id', $memberId)->first();
             Log::info('Company Details Retrieved:', ['company_details' => $company_details]);
     
             if (!$company_details) {
                 Log::error('Member not found', ['member_id' => $memberId]);
                 return response()->json([
                     'success' => false,
                     'message' => 'Member not found',
                 ], 404);
             }
     
             // Update the company details
             $company_details->company_name = $request->input('company_name');
             $company_details->street_address = $request->input('street_address');
             $company_details->city = $request->input('city');
             $company_details->state = $request->input('state');
             $company_details->pincode = $request->input('pincode');
             $company_details->country = $request->input('country');
             $company_details->company_phone = $request->input('company_phone');
             $company_details->company_website = $request->input('company_website');
             $company_details->company_size = $request->input('company_size');
             $company_details->business_type = $request->input('business_type');
             $company_details->other_business_type = $request->input('business_type') === 'Other'
                 ? $request->input('other_business_type')
                 : null;
             $company_details->save();
     
             // Send emails
             Mail::to('ts.juhiverma@gmail.com')->send(new AdminNotificationMail($company_details));
             Mail::to($company_details->email)->send(new CompanyDetailsMail($company_details));
     
             Log::info('Data saved', ['company details' => $company_details]);
     
             return response()->json([
                 'success' => true,
                 'message' => 'Company details updated successfully',
             ]);
         } catch (\Exception $e) {
             Log::error('Error saving company data', ['error' => $e->getMessage(), 'company_details' => $company_details]);
             return response()->json([
                 'success' => false,
                 'message' => 'Failed to update company details',
             ], 500);
         }
     }
     


}
