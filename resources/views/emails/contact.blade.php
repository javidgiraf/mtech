<!DOCTYPE html>
<html>
<head>
    <title>Request Quotation</title>
</head>
<body>
    <p>Name: {{ $details['name'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
    <p>Phone: {{ $details['phone'] }}</p>
    <p>Job Code: {{ $details['job_code'] }}</p>
    <p>Location: {{ $details['location'] }}</p>
    <p>Message: {{ $details['message'] }}</p>

    @if (!empty($details['upload_file']))
        <p>{{ asset('storage/resumes/'. $details['upload_file']) }}</p>
    @else
        <p>No attachment included.</p>
    @endif
</body>
</html>