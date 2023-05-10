<html lang="">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post" action="">
    <label for="name">Name: </label>
    <input type="text" id="name" name="name" value="">
    <label for="message">Message: </label>
    <input type="text" id="message" name="message" value="">
    <button type="submit" name="submit">Add message</button>
</form>
<?php
    $pattern_mail = '/\w+@\w+\.\w+/';
    $pattern_bsuir = '/\w+@(?!(bsuir.by))\w+\.\w+/';
    $tableData = file_get_contents("data.txt");

    echo "<table><tr><td>Names</td><td>Messages</td></tr>";
    echo $tableData."</table>";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $message = $_POST['message'];

        $tempMessage = preg_replace($pattern_bsuir, "#Cтоп e-mail#", $message);

        $newData = $tableData."<tr><td>$name</td><td>$tempMessage</td></tr>";

        file_put_contents("data.txt", $newData);
    }
?>
</body>
</html>