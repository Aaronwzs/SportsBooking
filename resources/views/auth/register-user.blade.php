<div>
    <h1>Welcome User!</h1>
    <p>You will be redirected to the user home page shortly...</p>
    <button onclick="window.location.href='/home'">Go to User Home</button>
</div>

<script>
    setTimeout(function(){
        window.location.href = '/home';
    }, 3000); // Redirect after 5 seconds
</script>
