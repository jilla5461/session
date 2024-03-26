<?php
session_start();

// Redirect to login page if user is not logged in
if(!isset($_SESSION['username'])) {
    header("Location: session.php");
    
 }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <script>
    // Function to redirect to logout page after 10 seconds
    function logoutAfterTimeout() {
        setTimeout(function() {
            window.location.href = 'logout.php';
        }, 10000); // 10 seconds
    }
    // Call the function when the page is loaded
    window.onload = logoutAfterTimeout;
    </script>
  
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <p>You are logged in</p> 
   <input type="button" value="Logout" onclick="window.location.href='logout.php'">
   <a href="register.php"><button name="adduser">adduser</button></a>
   
    
</body>
</html>
