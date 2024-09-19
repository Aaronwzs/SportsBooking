<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let timeout = "{{ session('timeout') }}";  // Get the timeout value from session
            if (timeout) {
                setTimeout(function() {
                    window.location.href = '/home';  // Redirect to /home after the timeout
                }, timeout);
            }
        });
    </script>
</head>
<body>
    <div>
        <p>{{ session('message') }}</p>  <!-- Display the message -->
    </div>
</body>
</html>
