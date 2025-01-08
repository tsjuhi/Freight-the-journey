<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;

use Illuminate\Http\Request;

class MemberController extends Controller
{
 public function member (){

  return view('content.member.show-members');

 }

 public function add_new_user (){

    $country = Country::get();
    return view('content.member.add-new-user',compact('country'));
  
   }

  public function view_user($id){
    
      $view_member = Member::where('id',$id)->first();
      return view('content.member.view-member',compact('view_member'));
    
   }

   public function edit_user ($id){

      $edit_member = Member::where('id',$id)->first();
      $country = Country::get();
      return view('content.member.edit-member',compact('edit_member','country'));
    
    }


     public function update_account_info(Request $request,$id)
     {
       Log::info('Request Data',['user_account requested data'=> $request->all()]);
     
       
      $request->validate([
         'fullname' => 'required|string|max:255',
         'job_title' => 'nullable|string|max:255',
         'email' => 'required|email|unique:members,email,'.$id,
         'password' => 'required|string|min:3',
         'confirm_password' => 'required|same:password',
     ]
    );
    try {
        $update_user_account = Member::where('id',$id)->first();
      
        $update_user_account->fullname = $request->fullname;
        $update_user_account->job_title = $request->job_title;
        $update_user_account->email = $request->email;
        $update_user_account->password = Hash::make($request->password);
        $update_user_account->save();
   
        return response()->json([
            'success' => true,
            'member_id' => $update_user_account->id,
        ]);
        
     Log::info('Data saved',['updated user account details'=> $update_user_account]);
   
     } catch (\Exception $e) {
       Log::error('Error saving user data', ['error' => $e->getMessage()]);
    }
   } 

     public function update_company_info(Request $request,$id)
     {
         Log::info('Request Data', ['Updated Company requested data' => $request->all()]);
        
            
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

      $company_details = null;
     
         try {
             $update_company_details = Member::where('id', $id)->first();
             Log::info('Company Details Retrieved:', ['company_details' => $update_company_details]);
     
             if (!$update_company_details) {
                 Log::error('Member not found', ['member_id' => $id]);
                 return response()->json([
                     'success' => false,
                     'message' => 'Member not found',
                 ], 404);
             }
     
             // Update the company details
             $update_company_details->company_name = $request->input('company_name');
             $update_company_details->street_address = $request->input('street_address');
             $update_company_details->city = $request->input('city');
             $update_company_details->state = $request->input('state');
             $update_company_details->pincode = $request->input('pincode');
             $update_company_details->country = $request->input('country');
             $update_company_details->company_phone = $request->input('company_phone');
             $update_company_details->company_website = $request->input('company_website');
             $update_company_details->company_size = $request->input('company_size');
             $update_company_details->business_type = $request->input('business_type');
             $update_company_details->other_business_type = $request->input('business_type') === 'Other'
                 ? $request->input('other_business_type')
                 : null;
             $update_company_details->save();
     
            Log::info('Data saved', ['company details' => $update_company_details]);
     
            return redirect()->back()->with('status','Details updated successfully');
            
         } catch (\Exception $e) {
             Log::error('Error saving company data', ['error' => $e->getMessage(), 'company_details' => $update_company_details]);
             return response()->json([
                 'success' => false,
                 'message' => 'Failed to update company details',
             ], 500);
         }
     }

     public function delete_user($id)
     {
         // Find the member by ID
         $delete_member = Member::find($id);
         
         if ($delete_member) { 
             // Perform soft delete
             $delete_member->delete();
             return redirect()->back()->with('status', 'Member deleted successfully');
         } 
     
         return redirect()->back()->with('error', 'Member not found');
     }
     

     public function getMembers(Request $request)
     {
         // Fetch members data from the database
         $members = Member::select(['id', 'fullname', 'email', 'company_name', 'company_phone', 'status'])->get();
 
         // Return data as JSON in the format DataTables expects
         return response()->json(['data' => $members]);
     }

}
