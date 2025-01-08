<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A New Member Account Created</title>
</head>

<body>
    <p>A new member has registered on your website:</p>

    <p><strong>Company Name:</strong> {{ $company_details->company_name }}</p>
    <p><strong>Email:</strong> {{ $company_details->email }}</p>
    <p><strong>Phone Number:</strong> {{ $company_details->company_phone }}</p>
    <p><strong>Registration Date:</strong> {{ now() }}</p>

    <p>To approve or activate this member account, <a
            href="{{ route('admin.approve-member', ['id' => $company_details->id]) }}">click here</a>.</p>

</body>

</html>
