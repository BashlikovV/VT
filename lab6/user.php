<?php
namespace explorer;

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username1 = $_POST['username'];
    $password1 = $_POST['password'];

    // Check if user exists in users.txt file
    $logins = file("loginsdb.txt", FILE_IGNORE_NEW_LINES);
    $passwords = file("passwordsdb.txt", FILE_IGNORE_NEW_LINES);
    foreach ($logins as $login) {
        foreach ($passwords as $password) {
            if ($username1 === $login && $password1 === $password) {
                $_SESSION['user'] = $login;
                header("Location: lab6-1.php");
                exit();
            }
        }
    }
    $error = "Invalid username or password";
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Explorer</title>
</head>
<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<form method="post" action="">
    <p>
        <label>Username: <input type="text" name="username"></label>
    </p>
    <p>
        <label>Password: <input type="password" name="password"></label>
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
</body>
</html>