<!DOCTYPE html>
<html>
<head>
    <title>Feedback Message</title>
</head>
<body>
    <h3>Feedback message from {{ $email }},</h3>

    <blockquote>
        "{{$subject}}"
        "{{ $desc }}"
    </blockquote>

</body>
</html>
