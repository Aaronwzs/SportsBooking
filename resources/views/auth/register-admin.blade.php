<div>
    <h1>Welcome Admin!</h1>
    <p>You will be redirected to the admin home page shortly...</p>
    <button onclick="window.location.href='/admin-home'">Go to Admin Home</button>
</div>

<script>
    setTimeout(function(){
        window.location.href = '/admin-home';
    }, 3000); // Redirect after 5 seconds
</script>
