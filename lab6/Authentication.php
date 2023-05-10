<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authentication</title>
</head>
<body>
<main>
    <?php
    require_once "utils/SecurityUtilsImpl.php";

    $securityUtils = new SecurityUtilsImpl();

    if (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])) {
        $lo = $_COOKIE['user_login'];
        $pass = $_COOKIE['user_password'];
        echo "<form method='post'>";
        echo "<label for='login'>Login</label>";
        echo "<input id='login' value='$lo'>";
        echo "<label for='pass'>Password</label>";
        echo "<input id='pass' value='$pass'>";
        echo "<label for='hello'>Hello $lo</label>";
        echo "<label for='signout'></label>";
        echo "<input type='submit' id='signout' name='signout' value='signout'>";
        echo "</form>";
        if (isset($_POST["signout"])) {
            setcookie("user_login", "",  0);
            setcookie("user_password", "", 0);
        }
    } else {
        echo "<form method='post' action='' name='authentication'>";
        echo "<label for='login'>Login: </label>";
        echo "<input name='login' id='login' type='text'>";
        echo "<label for='password'>Password: </label>";
        echo "<input name='password' id='password' type='text'>";
        echo "<input name='submit' id='submit' type='submit' value='submit'></form>";
        if (isset($_POST['submit'])) {
            try {
                if ($_POST['login'] < 2 || $_POST['password'] < 5) {
                    echo "<div>Invalid data</div>";
                } else {
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $hash = $securityUtils->passwordToHash($password);
                    $alive = time() * 60 * 60;
                    setcookie('user_login', $login, time() + 10);
                    setcookie('user_password', $hash, time() + 10);
                    file_put_contents("data", array($login, $hash));
                }
            } catch (Exception $e) {
                $m = $e->getMessage();
                echo "<div>$m</div>";
            }
        }
    }
    ?>
</main>
</body>
</html>