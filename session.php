<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

if(isset($_SESSION['username'])) {
    // Redirect to another page if the user is already logged in
    header("Location: login.php");
    
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        $error = "Username and password are required.";
    }
    else {
        $file = fopen("idly.txt", "r");

        while(!feof($file)) {
            $line = trim(fgets($file));
            $credentials = explode("&", $line);

            if(count($credentials) == 2 && $username == $credentials[0] && $password == $credentials[1]) {
                $_SESSION["username"] = $username;
                fclose($file);
                header("Location: login.php");
                exit; // Exit after successful login
            }
        }

        fclose($file);
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <center>
        <form class="form" method="post">
            <p id="heading">Login</p>
            <div class="field">
                <input autocomplete="off" id="name-group" placeholder="Username" class="form-group" name="username" type="text" required>
            </div>
            <div class="field">
                <input placeholder="Password" id="password" class="" name="password"  type="password" required >
            </div>
            <div class="btn">
                <button class="button1" name="login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            <?php if(isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </center>
</body>
</html>
