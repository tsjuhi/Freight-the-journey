Dear {{ $company_details->company_name }},<br>

Thank you for registering with us!<br>

Please verify your account by clicking the link below:<br>
<a href="{{ route('auth.verifyEmail', ['id' => $company_details->id]) }}">[Verify My Account]</a><br>

Verification is required to ensure the security and integrity of your account. <br>Once verified, you'll be able to
access
all features associated with your account.<br>

If you have any questions or need assistance, feel free to contact us at hello@thejourney.hk.

Thank you,
Freight Journey Team
