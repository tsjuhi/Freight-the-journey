<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\ContentNavbar;
use App\Http\Controllers\layouts\ContentNavSidebar;
use App\Http\Controllers\layouts\NavbarFull;
use App\Http\Controllers\layouts\NavbarFullSidebar;
use App\Http\Controllers\layouts\Horizontal;
use App\Http\Controllers\layouts\Vertical;
use App\Http\Controllers\apps\Email;
use App\Http\Controllers\apps\LogisticsDashboard;
use App\Http\Controllers\apps\UserViewAccount;
use App\Http\Controllers\apps\UserViewSecurity;
use App\Http\Controllers\pages\UserProfile;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsSecurity;
use App\Http\Controllers\authentications\LoginCover;
use App\Http\Controllers\authentications\RegisterMultiSteps;
use App\Http\Controllers\authentications\VerifyEmailCover;
use App\Http\Controllers\authentications\ResetPasswordCover;
use App\Http\Controllers\authentications\ForgotPasswordCover;
use App\Http\Controllers\extended_ui\Avatar;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberDashboard;
use App\Http\Controllers\MemberAccountController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AccountSettingController;


// Main Page Route
Route::get('/', [LoginCover::class, 'index'])->name('auth-login-cover');

Route::post('post-login', [LoginController::class, 'post_login'])->name('post-login');
Route::get('/thank-you', [MasterController::class, 'thank_you'])->name('thank-you');

Route::post('/post-logout', [LoginController::class, 'post_logout'])->name('post-logout');




// authentication
Route::get('/auth/register', [RegisterMultiSteps::class, 'index'])->name('auth-register-multisteps');
Route::post('/post-account-details', [RegisterController::class, 'post_account_details'])->name('post-account-details');
Route::post('/post-company-details', [RegisterController::class, 'post_company_details'])->name('post-company-details');
Route::post('/add-post-company-details', [RegisterController::class, 'add_post_company_details'])->name('add-post-company-details');




//forgot password
Route::get('/auth/forgot-password', [ForgotPasswordCover::class, 'index'])->name('auth-forgot-password-cover');
Route::post('/forgot-password', [SessionController::class, 'sendResetLink'])->name('password.email');
Route::get('/auth/reset-password', [ResetPasswordCover::class, 'index'])->name('auth-reset-password-cover');
Route::post('/reset-password', [SessionController::class, 'resetPassword'])->name('member.password.update');


//verify email
Route::get('/verify-email/{id}', [VerificationController::class, 'verifyEmail'])->name('auth.verifyEmail');
Route::get('/auth/verify-email', [VerifyEmailCover::class, 'index'])->name('auth-verify-email-cover');
Route::get('/admin/approve-member/{id}', [VerificationController::class, 'approveMember'])->name('admin.approve-member');

//RESEND PASSWORD
Route::get('/resend-verification', [VerificationController::class, 'resendVerification'])->name('resend.verification');


//demo
Route::get('/demo-register', [RegisterController::class, 'register'])->name('demo-register');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function ()
 {
Route::get('/dashboard', function () {return view('content.apps.app-logistics-dashboard');})->name('app-logistics-dashboard');

Route::get('/dashboard', [LogisticsDashboard::class, 'index'])->name('app-logistics-dashboard');
Route::get('/app/transaction', [TransactionController::class, 'transaction'])->name('app-transaction');

//member
Route::get('/app/member', [MemberController::class, 'member'])->name('app-member');
Route::get('/app/add-new-user', [MemberController::class, 'add_new_user'])->name('add-new-user');
Route::get('/app/view-user/{id}', [MemberController::class, 'view_user'])->name('view-user');
Route::get('/app/edit-user/{id}', [MemberController::class, 'edit_user'])->name('edit-user');
Route::get('/app/delete-user/{id}', [MemberController::class, 'delete_user'])->name('delete-user');
Route::post('/app/update-account-info/{id}', [MemberController::class, 'update_account_info'])->name('update-account-info');
Route::post('/app/update-company-info/{id}', [MemberController::class, 'update_company_info'])->name('update-company-info');
Route::get('/get/members', [MemberController::class, 'getMembers'])->name('get-members');

Route::get('/app/add-transaction', [TransactionController::class, 'add_transaction'])->name('add-transaction');
Route::get('/app/view-transaction', [TransactionController::class, 'view_transaction'])->name('view-transaction');
Route::get('/app/edit-transaction', [TransactionController::class, 'edit_transaction'])->name('edit-transaction');

//account setting
Route::get('/pages/profile-user', [UserProfile::class, 'index'])->name('pages-profile-user');
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::post('/post-account-settings', [AccountSettingController::class, 'post_account_settings'])->name('post-account-settings');
Route::get('/pages/account-settings-security', [AccountSettingsSecurity::class, 'index'])->name('pages-account-settings-security');
Route::get('/pages/account-settings-billing', [AccountSettingsBilling::class, 'index'])->name('pages-account-settings-billing');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');

   




});

Route::group(['middleware' => 'member'], function () {
Route::get('/member/dashboard', [MemberDashboard::class, 'index'])->name('dashboard-member');
Route::get('/member/transaction', [TransactionController::class, 'transaction'])->name('member-transaction');

Route::get('/member/payment', [PaymentController::class, 'Payment'])->name('member-payment');


//member profile
Route::get('/member-profile', [MemberAccountController::class, 'MemberProfile'])->name('member-profile');
Route::get('/company-profile', [MemberAccountController::class, 'companyProfile'])->name('company-profile');
Route::get('/member-account-setting', [MemberAccountController::class, 'member_account_setting'])->name('member-account-setting');
Route::get('/company-setting', [MemberAccountController::class, 'company_setting'])->name('company-setting');
Route::get('/member-security', [MemberAccountController::class, 'member_account_security'])->name('member-security');
});