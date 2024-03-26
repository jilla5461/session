<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST["register"])) {
    // Sanitize input
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Validate input (you may want to add more validation)
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    // Open the file in append mode
    $file = fopen("idly.txt", "a");

    if ($file === false) {
        echo "Failed to open file.";
        exit;
    }

    // Write the username and password to the file
    fwrite($file, "$username&$password\n");

    // Close the file
    fclose($file);

    // Redirect to a success page or do something else
    header("Location: session.php");
    exit(); // Make sure to exit after redirection
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button name="register">Register</button>
    </form>
</body>
</html>
