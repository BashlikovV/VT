
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Форма отправки сообщений</title>
</head>
<body>
<h2>Форма обратной связи</h2>
<form method="post">
    <fieldset>
        <legend>Оставьте сообщение:</legend>
        Ваше имя:<br>
        <label>
            <input type="text" name="name" required>
        </label><br>
        E-mail:<br>
        <label>
            <input type="email" name="email" required>
        </label><br>
        Номер телефона:<br>
        <label>
            <input type="text" name="phone" required>
        </label><br>
        Сообщение:<br>
        <label>
            <textarea rows="10" cols="45" name="message" required></textarea>
        </label><br>
        <input type="submit" name="submit" value="Отправить сообщение">
    </fieldset>
</form>
</body>
</html>
<?php

ini_set('SMTP','localhost');
ini_set('smtp_port',25);
session_start();

require_once "database/SQLiteDatabaseRep.php";

if(isset($_POST['submit'])){

    $database = new SQLiteDatabaseRep();
    $users = $database->getUsers();

    function sendMail(string $to) {
        echo "$to<br>";
        $server_mail = "webmaster@example.com";
        $subject = "=?UTF-8?B?".base64_encode("Форма отправки сообщений")."?=";
//        $subject = "Форма отправки сообщений";
        $message = "Имя: ".$_POST['name']."\n";
        $message .= "Номер телефона: ".$_POST['phone']."\n";
        $message .= "Сообщение: ".$_POST['message']."\n";
        $message = wordwrap($message, 70);

        $headers = "From: Me <$server_mail> \r\n";
        $headers .= "Content-type: text/plain; charset=utf-8 \r\n";
        $headers .= "Reply-To: $server_mail \r\n" ;
        $headers .= 'X-Mailer: PHP/' . phpversion();

        try {
            if(mail($to, $subject, $message, $headers, "-f $server_mail")){
                echo "Ваше письмо отправлено:)<br>";
            } else {
                echo "Возникли проблемы при отправке, повторите попытку позже<br>";
            }
        } catch (Exception $e) {
            $str = $e->getMessage();
            echo "$str<br>";
        }
    }

    for ($i = 0; $i < sizeof($users); $i++) {
//        echo "$users[$i]<br>";
        sendMail($users[$i]);
    }
}

?>